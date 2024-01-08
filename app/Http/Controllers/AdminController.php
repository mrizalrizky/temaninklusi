<?php

namespace App\Http\Controllers;

use App\Constants\EventStatusConstant;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return view('pages.admin.dashboard');
    }

    public function manageUser() {
        $users = User::where([
            ['active_flag', true],
            ['email', '<>', Auth::user()->email]]
        )->get();
        return view('pages.admin.manageUser', compact('users'));
    }

    public function manageEvent() {
        $events = Event::with(['eventDetail', 'organizer', 'eventProposalFile', 'eventLicenseFile'])->whereHas('eventDetail', function ($q) {
            $q->where('status_id', EventStatusConstant::WAITING_APPROVAL);
        })->get();
        // $events = Event::join('master_statuses', 'events.id', '=', 'master_statuses.id')->where([
        //     ['show_flag', true],
        //     ['master_statuses.label', 'Waiting Approval']]
        // )->get();


        return view('pages.admin.manageEvent', compact('events'));
    }
}
