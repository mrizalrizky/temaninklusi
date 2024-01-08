<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function downloadEventProposalFile($slug) {
        $event = Event::with('eventProposalFile')->whereHas('slug', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->firstOrFail();

    }

    public function downloadEventLicenseFile($slug) {
        $event = Event::with('eventLicenseFile')->whereHas('slug', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->firstOrFail();
    }

}
