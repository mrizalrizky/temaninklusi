<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Support\Str;
use App\Constants\StatusConstant;
use App\Models\DisabilityCategory;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index() {

        // nitip di sini ya wkwkwk
        $eventDetail = EventDetail::create([
            'title'       => 'test1',
            'description' => 'test desc',
            'location'    => 'test location',
            'slug'        => Str::slug('test-satu', '-'), // butuh bikin helper function untuk handle kalo ada nama event yang sama tambahin -[n]]
            'start_date'  => now(),
            'end_date'  => now(),
        ]);

        $eventDetail->events()->create([
            'user_id'   => 2,
            'status_id' => StatusConstant::ON_VERIFICATION,
            'event_detail_id' => $eventDetail->id
        ]);

        $disabilityCategories = DisabilityCategory::all();
        $events = Event::with('eventDetails')->paginate(6);

        return view('pages.event', compact('events', 'disabilityCategories'));
    }

    public function show($slug) {
        $event = Event::with(['eventDetails', 'status', 'eventFiles'])->whereHas('eventDetails', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        return view('pages.event-detail', compact('event'));
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
            'user_id'   => Auth::id(),
            'status_id' => StatusConstant::ON_VERIFICATION,
            'event_detail_id' => $eventDetail->id
        ]);

        return redirect()->route('index');
    }
}
