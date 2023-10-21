<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request) {
        $events = Event::with('eventDetails')->paginate(6);

        return view('pages.event', compact('events'));
    }

    public function eventDetails($slug) {
        $event = Event::with(['eventDetails', 'status', 'eventFiles'])->whereHas('eventDetails', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        return view('pages.event-detail', compact('event'));
    }
}
