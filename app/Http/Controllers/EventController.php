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
use App\Models\EventDisabilityCategory;
use App\Models\File;
use App\Models\RegisteredEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request) {

        $events = Event::whereHas('eventDetail', function ($query) use ($request) {
            $query->where('title', 'ILIKE', '%' . $request->title . '%')
            ->where('show_flag', true);
                //   ->where('start_date', 'ILIKE', '%' . $request->start_date . '%')
                //   ->where('slug', 'ILIKE', '%' . $request->disability_category . '%')
                //   ->where('location', 'ILIKE', '%' . $request->event_category . '%');
        })->paginate(6);

        $disabilityCategories = DisabilityCategory::all();

        return view('pages.events.event', compact('events', 'disabilityCategories'));
    }

    public function showPopularEvents () {
        $popularEvents = Event::with(['eventDetail','organizer','status', 'eventBanner'])->get();

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
        $event = Event::with(['eventCategory', 'eventDetail', 'organizer', 'comments.replies.users', 'status', 'eventBanner', 'eventLicense'])->whereHas('eventDetail', function($q) use ($slug) {
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
                    'show_flag' => true,
                    'status_id' => EventStatusConstant::APPROVED
                ]);
                $message = "Event berhasil diapprove!";

                break;

            case 'REJECT_EVENT':
                $event->update([
                    'show_flag' => false,
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

    private function storeFile($requestData, $requestFile, $fileType, $folderType) {
        $titleSlug = Str::slug($requestData['title'], '-');
        unset($requestData[$fileType]);
        $fileName = $fileType . '-' . time() . '.' . $requestFile->getClientOriginalExtension();
        Storage::putFileAs('public/images/' . $folderType . '/' . $titleSlug, $requestFile, $fileName);
        $data[$fileType] = 'images/'. $folderType . '/'. $titleSlug . '/'. $fileName;
    }

    protected function validateData(Request $request) {
        $rules = [
            'title'                 => 'required',
            'event_category'        => 'required',
            'quota'                 => 'required',
            'contact_email'         => 'required',
            'contact_phone'         => 'required',
            'event_banner'          => 'required',
            'description'           => 'required',
            'license_flag'          => 'required',
            'license_file'          => 'required_if:license_flag,==,1',
            'disability_categories' => 'required|array|min:1',
            'start_date'            => 'required',
            'end_date'              => 'required',
            'event_banner'          => 'required',
            'location'              => 'required',
            'event_facilities'      => ['required','array','min:1','max:3', function ($attribute, $value, $fail) {
                    if (empty(array_filter($value, fn ($item) => $item !== null))) {
                        $fail("Field fasilitas event tidak boleh kosong");
                    }
                }
            ],
            'event_benefits'        => ['required','array','min:1','max:3', function ($attribute, $value, $fail) {
                    // if (count(array_filter($value, function ($item) {
                    //     return $item !== null;
                    // })) === 0) {
                    if(empty(array_filter($value, fn ($item) => $item !== null))) {
                        $fail("Field benefit event tidak boleh kosong");
                    }
                },
            ],
            'social_media_link' => 'required',
        ];

        $errorMessages = [
            'required'    => 'Field :attribute tidak boleh kosong.',
            'required_if' => 'Field :attribute tidak boleh kosong.',
            'min'         => 'Field :attribute harus diisi minimal :min item.',
            'max'         => 'Field :attribute tidak bisa lebih dari :max item.',
        ];

        if($request->slug) { // Edit
            $event = Event::whereHas('eventDetail', function ($q) use ($request) {
                $q->where('slug', $request->slug);
            })->first();

            if($event->title !== $request->title) {
                $rules['title'] = 'required|unique:event_details';
            } else {
                $rules['title'] = 'required';
            }
        } else { // Upload Event
            $rules['title'] = 'required|unique:event_details';
        }

        $request->validate($rules, $errorMessages);

        // If validation passes
        $data = $request->all();
        // $titleSlug = Str::slug($request->title, '-');

        $eventBannerFile = $request->file('event_banner');
        if($eventBannerFile) {
            // $fileType = 'event_banner';
            // unset($data[$fileType]);
            // $eventBannerFileName = $fileType . '-' . time() . '.' . $eventBannerFile->getClientOriginalExtension();
            // Storage::putFileAs('public/images/events/' . $titleSlug, $eventBannerFile, $eventBannerFileName);
            // $data[$fileType] = 'images/events/' . $titleSlug . '/'. $eventBannerFileName;

            $data = $this->storeFile($data, $eventBannerFile, 'event_banner' , 'events');
        }

        if($request->license_flag == 1 && $request->file('license_file')) {
            $licenseFile = $request->file('license_file');
            $data = $this->storeFile($data, $licenseFile, 'article_banner', 'blogs');
            // $fileType = 'license_file';
            // $licenseFile = $request->file($fileType);
            // unset($data[$fileType]);
            // if($licenseFile) {
            //     $licenseFileName = $fileType . '-' . time() . '.' . $licenseFile->getClientOriginalExtension();
            //     Storage::putFileAs('public/images/events/' . $titleSlug . '/', $licenseFile, $licenseFileName);
            //     $data[$fileType] = 'images/events/'. $titleSlug . '/' . $licenseFileName;
            // }
        }

        dd($data);

        return redirect()->back()->with('eventModal', $data);
    }

    public function create(Request $request) {
        DB::beginTransaction();

        try {
            $temp = explode('/', $request->event_banner);
            $bannerFileData = File::create([
                'file_name' => $temp[count($temp) - 1],
                'file_path' => '/images/events/' . Str::slug($request->title) . $temp[count($temp) - 1],
                'file_type' => 'event_banner',
            ]);

            $licenseFileData = null;
            if($request->license_flag == 1) {
                $temp = explode('/', $request->license_file);
                $licenseFileData = File::create([
                    'file_name' => $temp[count($temp) - 1],
                    'file_path' => '/images/events/' . Str::slug($request->title) . $temp[count($temp) - 1],
                    'file_type' => 'license_file',
                ]);
            }

            $eventDetail = EventDetail::create([
                'title'             => $request->title,
                'slug'              => Str::slug($request->title, '-'),
                'description'       => $request->description,
                'quota'             => $request->quota,
                'contact_email'     => $request->contact_email,
                'contact_phone'     => $request->contact_phone,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'location'          => $request->location,
                'event_facilities'  => $request->event_facilities,
                'event_benefits'    => $request->event_benefits,
                'social_media_link' => $request->social_media_link,
            ]);

            $createdEvent = $eventDetail->events()->create([
                'organizer_id'      => Auth::user()->organizer->id,
                'event_detail_id'   => $eventDetail->id,
                'status_id'         => EventStatusConstant::WAITING_APPROVAL,
                'event_category_id' => $request->event_category,
                'license_flag'      => $request->license_flag,
                'banner_file_id'    => $bannerFileData->id ?? null,
                'license_file_id'   => $licenseFileData->id ?? null,
                'show_flag'         => false,
                'created_by'        => Auth::user()->username,
                'updated_by'        => Auth::user()->username,
            ]);

            $test = array();
            if($request->disability_categories) {
                foreach($request->disability_categories as $disabilityCategory) {
                    $test[$disabilityCategory] = EventDisabilityCategory::create([
                        'event_id' => $createdEvent->id,
                        'disability_category_id' => $disabilityCategory
                    ]);
                }
            }

            dd($request);
            throw $request;
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        return redirect()->route('event.index')->with('success', 'Event berhasil dibuat. Silahkan menunggu approval admin');
    }

    public function delete($slug) {
        $event = Event::whereHas('eventDetail', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->first();

        $event->update([
            'show_flag' => false
        ]);

        return redirect()->route('event.index')->with('success', 'Berhasil hapus event!');
    }
}
