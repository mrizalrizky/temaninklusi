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
use App\Models\EventCategory;
use App\Models\File;
use App\Models\RegisteredEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        $eventCategories = EventCategory::all();
        $disabilityCategories = DisabilityCategory::all();

        return view('pages.events.edit-event', compact('event', 'eventCategories', 'disabilityCategories'));
    }

    public function update(Request $request, $slug) {
        $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        $this->validateData($request);

        $event->update([
            'updated_by' => Auth::user()->username,
        ]);

        return redirect()->back()->with('success', 'Berhasil edit event');
    }

    // private $data;

    protected function validateData(Request $request) {
        // dd($request);
        $validation = [
            'title'             => 'required',
            'event_category'    => 'required',
            'quota'             => 'required',
            'contact_email'     => 'required',
            'contact_phone'     => 'required',
            'event_banner'      => 'required',
            'description'       => 'required',
            'eligibility'       => 'required',
            'start_date'        => 'required',
            'end_date'          => 'required',
            'event_banner'      => 'required',
            'location'          => 'required',
            'event_facilities'  => 'required|array|max:3',
            'event_benefits'    => 'required|array|max:3',
            'social_media_link' => 'required',
        ];

        if($request->license_flag == 1) {
            $validation['license_file'] = 'required';
        }

        if($request->slug) { // Edit
            $event = Event::whereHas('eventDetail', function ($q) use ($request) {
                $q->where('slug', $request->slug);
            })->first();

            if($event->title !== $request->title) {
                $validation['title'] = 'required|unique:event_details';
            } else {
                $validation['title'] = 'required';
            }
        } else { // Upload Event
            $validation['title'] = 'required|unique:event_details';
        }

        $request->validate($validation);
        $data = $request->all();
        unset($data['event_banner']);


        $eventBannerFile = $request->file('event_banner');
        if($request->license_flag == 1) {
            $licenseFile = $request->file('license_file');
        }

        if($eventBannerFile) {
            $eventBannerFileName = time() . '.' . $eventBannerFile->getClientOriginalExtension();
            Storage::putFileAs('public/images/events/', Str::slug($request->title), $eventBannerFile, $eventBannerFileName);
            $data['event_banner'] = 'images/events/' . $eventBannerFileName;
        }

        if($licenseFile) {
            unset($data['license_file']);
            $licenseFileName = time() . '.' . $licenseFile->getClientOriginalExtension();
            Storage::putFileAs('public/images/events/' . Str::slug($request->title), $licenseFile, $licenseFileName);
            $data['license_file'] = 'images/events/'. $licenseFileName;
        }

        return redirect()->back()->with('uploadEventModal', $data);
    }

    public function create(Request $request) {
        // dd($request);
        // $imageFile = $request->file('article_banner');
        // $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
        // $fileType = 'article_banner';
        // Storage::putFileAs('public/images', $imageFile, $imageName);
        // $data['image'] = $imageName;
        $temp = explode('/', $request->event_banner);
        File::create([
            'file_name' => $temp[count($temp) - 1],
            'file_path' => '/images/events/' . Str::slug($request->title) . $temp[count($temp) - 1],
            'file_type' => 'event_banner',
        ]);

        if($request->license_flag == 1) {
            $temp = explode('/', $request->license_file);
            File::create([
                'file_name' => $temp[count($temp) - 1],
                'file_path' => '/images/events/' . Str::slug($request->title) . $temp[count($temp) - 1],
                'file_type' => 'license_file',
            ]);
        }

        $eventDetail = EventDetail::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'location'      => $request->location,
            'slug'          => Str::slug($request->title, '-'),
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'quota'         => $request->quota,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
        ]);

        $eventDetail->events()->create([
            'organizer_id'      => Auth::user()->organizer->id,
            'event_detail_id'   => $eventDetail->id,
            'status_id'         => EventStatusConstant::WAITING_APPROVAL,
            'event_category_id' => $request->event_category,
            'license_flag'      => $request->license_flag,
            'show_flag'         => 1,
            'created_by'        => Auth::user()->username,
            'updated_by'        => Auth::user()->username,
        ]);

        return redirect()->route('event.index');
    }

    public function delete($slug) {
        $event = Event::whereHas('eventDetail', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        $event->update([
            'show_flag' => 0
        ]);

        return redirect()->route('event.index')->with('success', 'Berhasil hapus event!');
    }
}
