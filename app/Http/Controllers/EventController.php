<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Support\Str;
use App\Constants\EventStatusConstant;
use App\Constants\RoleConstant;
use App\Models\DisabilityCategory;
use App\Models\RegisteredEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(Request $request) {

        $events = Event::whereHas('eventDetail', function ($query) use ($request) {
            $query->where('title', 'ILIKE', '%' . $request->title . '%')
            ->where('show_flag', 1);
                //   ->where('start_date', 'ILIKE', '%' . $request->start_date . '%')
                //   ->where('slug', 'ILIKE', '%' . $request->disability_category . '%')
                //   ->where('location', 'ILIKE', '%' . $request->event_category . '%');
        })->paginate(6);

        $disabilityCategories = DisabilityCategory::all();

        return view('pages.events.event', compact('events', 'disabilityCategories'));
    }

    public function showPopularEvents () {
        $popularEvents = Event::with(['eventDetail','organizer','status', 'eventFiles'])->get();

        return view('pages.index', compact('popularEvents'));
    }

    public function showEventsByRole()
    {
        $user = Auth::user();
        if ($user->role_id == RoleConstant::MEMBER) {
            $events = $user->registeredEvents()->with('eventDetail')->paginate(3);

            return view('pages.profile.registeredEvent', compact('events'));
        } else if ($user->role_id == RoleConstant::EVENT_ORGANIZER) {
            $events = Event::where([
                ['show_flag', true],
                ['organizer_id', $user->organizer->id],
            ])->paginate(3);

            return view('pages.profile.uploadedEvent', compact('events'));
        }
    }

    public function showUploadEventPage () {
        $eventCategories = EventCategory::all();
        $disabilityCategories = DisabilityCategory::all();

        return view('pages.events.upload-event', compact('eventCategories', 'disabilityCategories'));
    }

    public function show($slug) {
        $event = Event::with(['eventDetail', 'organizer', 'comments.replies.users', 'status', 'eventFiles'])->whereHas('eventDetail', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        return view('pages.events.event-detail', compact('event'));
    }

    public function eventAction($slug, $actionType) {
        $message = '';
        $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        switch($actionType) {
            case "APPROVE_EVENT":
                $event->update([
                    'status_id' => EventStatusConstant::APPROVED
                ]);
                $message = "Event berhasil diapprove!";

                break;

            case 'REJECT_EVENT':
                $event->update([
                    'status_id' => EventStatusConstant::REJECTED
                ]);
                $message = "Event berhasil direject!";

                break;

            case 'REGISTER_EVENT':
                $event = RegisteredEvent::create([
                    'user_id'  => Auth::user()->id,
                    'event_id' => $event->id,
                ]);
                $message = "Berhasil daftar event!";

                break;

            case 'CANCEL_REGISTER_EVENT':
                $event = RegisteredEvent::destroy([
                    'user_id'  => Auth::user()->id,
                    'event_id' => $event->id,
                ]);

                $message = "Berhasil cancel registrasi event";

                break;

            default:
                break;
        }

        return redirect()->back()->with('success', $message);
    }

    public function edit($slug) {
        // $event = Event::with('eventDetail')->whereHas('eventDetail', function ($q) use ($slug) {
        //     $q->where('slug', $slug);
        // })->first();

        return view('pages.events.event-edit', compact('event'));
    }

    public function update(EventRequest $request) {
        return redirect()->back()->with('success', 'Berhasil edit event');
    }

    public function create(EventRequest $request) {
        // dd($request);
        $eventDetail = EventDetail::create([
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'slug'        => Str::slug($request->title, '-'), // butuh bikin helper function untuk handle kalo ada nama event yang sama tambahin -[n]]
            'start_date'  => $request->start_date,
            'end_date'  => $request->end_date,
        ]);

        $eventDetail->events()->create([
            'organizer_id'    => 1,
            'status_id'       => EventStatusConstant::WAITING_APPROVAL,
            'event_detail_id' => $eventDetail->id
        ]);

        return redirect()->route('event.index');
    }

    public function delete($slug) {
        $event = Event::with('eventDetail')->whereHas('eventDetail', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        $event->update([
            'show_flag' => 0
        ]);

        return redirect()->back()->with('success', 'Berhasil hapus event!');
    }
}
