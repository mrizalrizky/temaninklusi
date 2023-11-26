<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Support\Str;
use App\Constants\EventStatusConstant;
use App\Models\DisabilityCategory;
use App\Models\UserComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request) {

        $events = Event::whereHas('eventDetails', function ($query) use ($request) {
            $query->where('title', 'ILIKE', '%' . $request->title . '%');
                //   ->where('start_date', 'ILIKE', '%' . $request->start_date . '%')
                //   ->where('slug', 'ILIKE', '%' . $request->disability_category . '%')
                //   ->where('location', 'ILIKE', '%' . $request->event_category . '%');
        })->paginate(6);

        $disabilityCategories = DisabilityCategory::all();

        return view('pages.event', compact('events', 'disabilityCategories'));
    }

    public function show($slug) {
        $event = Event::with(['eventDetails', 'organizer', 'comments', 'status', 'eventFiles'])->whereHas('eventDetails', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        return view('pages.event-detail', compact('event'));
    }

    public function eventAction(Request $request, $actionType, $slug) {
        if($actionType == 'approve') {
            $a = ['EVENT APPROVED'];
            dd($a);
            // $event = Event::whereHas('eventDetails', function ($q) use ($slug) {
                //     $q->where('slug', $slug);
                // })->first();

            // $test = $event->update([
            //     'status_id' => EventStatusConstant::APPROVED
            // ]);
        } else if ($actionType == 'reject') {
            $a = ['EVENT APPROVED'];
            dd($a);
            // $event = Event::whereHas('eventDetails', function ($q) use ($slug) {
            //     $q->where('slug', $slug);
            // })->first();
            // $test = $event->update([
            //     'status_id' => EventStatusConstant::REJECTED
            // ]);
        } else if ($actionType == 'register-event') {
            $a = ['REGISTERED TO EVENT'];
            dd($a);
            // $event = RegisteredEvent::create([
                //     'user_id'  => $request->user_id,
                //     'event_id' => $request->event_id
                // ]);
        } else if ($actionType == 'cancel-register') {
            $a = ['CANCEL REGISTER TO EVENT'];
            dd($a);
            // $event = RegisteredEvent::destroy([
            //     'user_id'  => $request->user_id,
            //     'event_id' => $request->event_id
            // ]);

        }

        return redirect()->back();
    }


    public function store(StoreEventRequest $request) {
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

        return redirect()->route('index');
    }
}
