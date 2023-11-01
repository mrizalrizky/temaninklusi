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
use Illuminate\Support\Request;

class EventController extends Controller
{
    public function index(Request $request) {
        $events = Event::whereHas('eventDetails', function ($query) use ($request) {
            foreach ($request->query() as $key => $value)
            $query->where($key, 'ILIKE', '%' . $value . '%');
        })->paginate(6);
        $disabilityCategories = DisabilityCategory::all();

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
