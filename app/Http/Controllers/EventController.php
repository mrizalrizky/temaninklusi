<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Support\Str;
use App\Constants\EventStatusConstant;
use App\Constants\FileTypeConstant;
use App\Constants\RoleConstant;
use App\Models\DisabilityCategory;
use App\Models\EventCategory;
use App\Models\EventDisabilityCategory;
use App\Models\File;
use App\Models\RegisteredEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

use Session;

class EventController extends Controller
{
    public function index(Request $request) {
        $query = Event::whereHas('eventDetail', function ($query) use ($request) {
            $query->where('status_id', EventStatusConstant::APPROVED);
            if ($request->filled('title')) {
                $query->where('title', 'ILIKE', '%' . $request->title . '%');
            }

            if ($request->filled('start_date')) {
                $query->where('start_date', 'ILIKE', '%' . $request->start_date . '%');
            }

            if ($request->filled('event_category')) {
                $query->where('event_category_id', $request->event_category);
            }

            $query->where([
                ['show_flag', true],
                ['status_id', EventStatusConstant::APPROVED]
            ]);
        });

        if ($request->filled('disability_categories')) {
            $query->whereHas('disabilityCategories', function ($query) use ($request) {
                $query->whereIn('disability_categories.id', $request->disability_categories);
            });
        }

        $events = $query->paginate(6);
        $eventCategories = EventCategory::all();
        $disabilityCategories = DisabilityCategory::all();

        $request->session()->put('searchKeyword', $request->title);

        return view('pages.events.event')->with([
            'events' => $events,
            'eventCategories' => $eventCategories,
            'disabilityCategories' => $disabilityCategories,
            'searchKeyword' => $request->title,
        ]);
    }

    public function showNewestEvents() {
        $newestEvents = Event::where([
            ['status_id', EventStatusConstant::APPROVED],
            ['show_flag', true],
        ])->with(['eventDetail', 'organizer', 'status', 'eventBanner'])->latest()->limit(3)->get();

        return view('pages.index', compact('newestEvents'));
    }

    public function showEventsByRole() {
        $user = Auth::user();
        if ($user->role_id == RoleConstant::MEMBER) {
            $events = $user->registeredEvents()->paginate(3);

            return view('pages.profile.registeredEvent', compact('events'));
        } else if ($user->role_id == RoleConstant::EVENT_ORGANIZER) {
            $events = Event::where([
                ['status_id', EventStatusConstant::APPROVED],
                ['show_flag', true],
                ['organizer_id', $user->organizer->id],
            ])->paginate(3);

            return view('pages.profile.uploadedEvent', compact('events'));
        }
    }

    public function showUploadEventPage() {
        $eventCategories = EventCategory::all();
        $disabilityCategories = DisabilityCategory::all();

        return view('pages.events.upload-event', compact('eventCategories', 'disabilityCategories'));
    }

    // public function showWaitingApprovalEvents() {
    //     $events = Event::with(['eventDetail', 'organizer', 'eventProposalFile', 'eventLicenseFile'])->whereHas('eventDetail', function ($q) {
    //         $q->where('status_id', EventStatusConstant::WAITING_APPROVAL);
    //     })->get();

    //     return view('pages.admin.manageEvent', compact('events'));
    // }

    public function show($slug) {
        $event = Event::with(['eventCategory', 'eventDetail', 'organizer', 'comments.replies.users', 'status', 'eventBanner', 'eventProposalFile'])->whereHas('eventDetail', function ($q) use ($slug) {
            $q->where('slug', $slug);
            //   ->where('show_flag', false);
        })->firstOrFail();

        // $event->description = preg_replace('~[\r\n]+~', '<br><br>', $event->description);

        return view('pages.events.event-detail', compact('event'));
    }

    public function eventAction($slug, $actionType) {
        DB::beginTransaction();
        try {
            $message = '';
            $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
                $q->where('slug', $slug);
            })->firstOrFail();

            switch ($actionType) {
                case "APPROVE_EVENT":
                    if ($event->isWaitingApproval()) {
                        $event->update([
                            'show_flag' => true,
                            'status_id' => EventStatusConstant::APPROVED
                        ]);
                        $message = "Event berhasil diapprove!";
                        // } else {
                        //     $message = "Event tidak dapat diapprove. Silahkan coba lagi!";
                    }
                    break;

                case 'REJECT_EVENT':
                    if ($event->isWaitingApproval()) {
                        $event->update([
                            'show_flag' => false,
                            'status_id' => EventStatusConstant::REJECTED
                        ]);
                        $message = "Event berhasil direject!";
                        // } else {
                        //     $message = "Event tidak dapat direject. Silahkan coba lagi!";
                    }
                    break;

                case 'USER_REGISTER_EVENT':
                    if (!Auth::user()->registeredEvents->contains($event)) {
                        $event->eventDetail->update([
                            'quota' => $event->eventDetail->quota - 1
                        ]);
                        RegisteredEvent::create([
                            'user_id'  => Auth::user()->id,
                            'event_id' => $event->id,
                        ]);
                        $message = "Anda berhasil terdaftar ke dalam event ini! Silahkan menunggu informasi selanjutnya";
                    } else {
                        $message = 'Anda sudah terdaftar ke dalam event ini!';
                    }

                    break;

                case 'USER_CANCEL_REGISTER_EVENT':
                    if (Auth::user()->registeredEvents->contains($event)) {
                        $event->eventDetail->update([
                            'quota' => $event->eventDetail->quota + 1
                        ]);

                        $registeredEvent = RegisteredEvent::where([
                            'user_id'  => Auth::user()->id,
                            'event_id' => $event->id,
                        ])->firstOrFail();
                        $registeredEvent->delete();

                        $message = "Anda berhasil membatalkan registrasi event ini!";
                        // } else {
                        //     $message = "Anda belum terdaftar kedalam event ini!";
                    }

                    break;

                default:
                    $message = "Action yang anda lakukan tidak valid!";
                    break;
            }
            DB::commit();
            return redirect()->back()->with('action-success', $message);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('action-failed', 'Terdapat gangguan pada sistem! Silahkan coba lagi');
        }

    }

    public function edit($slug) {
        $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->firstOrFail();

        $eventCategories = EventCategory::all();
        $disabilityCategories = DisabilityCategory::all();

        return view('pages.events.edit-event', compact('event', 'eventCategories', 'disabilityCategories'));
    }

    public function update(Request $request, $slug) {
        DB::beginTransaction();
        try {
            $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
                $q->where('slug', $slug);
            })->firstOrFail();

            $this->validateData($request);

            if ($request->event_banner) {
                $currentFile = File::find($event->file_id);
                $currentFile->update([
                    'file_name' => $request->event_banner,
                    'file_path' => '/events/'. $slug ,
                ]);
            }

            $data = [
                'title'             => $request->title,
                'description'       => $request->description,
                'quota'             => $request->quota,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'max_register_date' => $request->max_register_date,
                'location'          => $request->location,
                'event_facilities'  => $request->event_facilities,
                'event_benefits'    => $request->event_benefits,
                'social_media_link' => $request->social_media_link,
                'event_category_id' => $request->event_category,
                'updated_by'        => Auth::user()->username,
                'updated_at'        => now()
            ];

            $event->update($data);
            $event->eventDetail->update($data);

            DB::commit();
            return redirect()->route('event.details', $slug)->with('action-success', 'Event berhasil diedit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('action-failed', 'Event gagal diedit! Silahkan coba lagi');
        }
    }

    private function storeFile($requestData, $requestFile, $fileType) {
        $titleSlug = Str::slug($requestData['title'], '-');
        unset($requestData[$fileType]);
        $fileName = $fileType . '.' . $requestFile->getClientOriginalExtension();
        Storage::putFileAs('public/events/' . $titleSlug . '/', $requestFile, $fileName);
        $requestData[$fileType] = $fileName;
        return $requestData;
    }

    protected function validateData(Request $request) {
        $rules = [
            'organizer_name'        => 'sometimes|required',
            'quota'                 => 'sometimes|required',
            'contact_email'         => 'sometimes|required',
            'contact_phone'         => 'sometimes|required',
            'event_category'        => 'required',
            'description'           => 'required',
            // 'disability_categories' => 'required|array|min:1',
            'max_register_date'     => 'required|date|after:today|before:start_date',
            'start_date'            => 'required|date|after:max_register_date',
            'end_date'              => 'required|date|after:start_date',
            'location'              => 'required',
            'event_facilities'      => [
                'required', 'array', 'min:1', 'max:3', function ($attribute, $value, $fail) {
                    if (empty(array_filter($value, fn ($item) => $item !== null))) {
                        $fail("Field fasilitas event tidak boleh kosong");
                    }
                }
            ],
            'event_benefits'        => [
                'required', 'array', 'min:1', 'max:3', function ($attribute, $value, $fail) {
                    if (empty(array_filter($value, fn ($item) => $item !== null))) {
                        $fail("Field benefit event tidak boleh kosong");
                    }
                },
            ],
            'social_media_link' => 'required',
        ];

        if ($request->slug) { // Edit
            $event = Event::whereHas('eventDetail', function ($q) use ($request) {
                $q->where('slug', $request->slug);
            })->firstOrFail();

            if ($event->eventDetail->title !== $request->title) {
                $rules['title'] = 'required|unique:event_details';
            } else {
                $rules['title'] = 'required';
            }
        } else { // Upload Event
            $rules['title'] = 'required|unique:event_details';
            $rules['event_license_flag'] = 'required';
            $rules['event_banner'] = 'required|mimes:jpg,jpeg,png,pneg,svg';
            $rules['event_proposal_file'] = 'required|mimes:pdf';
            $rules['event_license_file'] = 'required_if:event_license_flag,==,1|mimes:pdf';
        }

        $errorMessages = [
            'required'    => 'Field :attribute tidak boleh kosong.',
            'required_if' => 'Field :attribute tidak boleh kosong.',
            'min'         => 'Field :attribute harus diisi minimal :min item.',
            'max'         => 'Field :attribute tidak bisa lebih dari :max item.',
            'mimes'       => 'Tipe file harus dalam format :values'
        ];

        $request->validate($rules, $errorMessages);

        // If validation passes
        $data = $request->all();

        $eventBannerFile = $request->file(FileTypeConstant::EVENT_BANNER);
        if ($eventBannerFile) {
            $data = $this->storeFile($data, $eventBannerFile, FileTypeConstant::EVENT_BANNER);
        }

        $eventProposalFile = $request->file(FileTypeConstant::EVENT_PROPOSAL_FILE);
        if ($eventProposalFile) {
            $data = $this->storeFile($data, $eventProposalFile, FileTypeConstant::EVENT_PROPOSAL_FILE);
        }

        if ($request->event_license_flag == 1 && $request->file(FileTypeConstant::EVENT_LICENSE_FILE)) {
            $licenseFile = $request->file(FileTypeConstant::EVENT_LICENSE_FILE);
            $data = $this->storeFile($data, $licenseFile, FileTypeConstant::EVENT_LICENSE_FILE);
        }

        return redirect()->back()->with('eventModal', $data);
    }

    public function create(Request $request) {
        DB::beginTransaction();
        try {
            $titleSlug = Str::slug($request->title, '-');
            $filePath  = '/events/';
            $bannerFileData = File::create([
                'file_name' => $request->event_banner,
                'file_path' => $filePath . $titleSlug . '/',
                'file_type' => FileTypeConstant::EVENT_BANNER,
            ]);

            $eventProposalFileData = File::create([
                'file_name' => $request->event_proposal_file,
                'file_path' => $filePath . $titleSlug . '/',
                'file_type' => FileTypeConstant::EVENT_PROPOSAL_FILE,
            ]);

            $eventLicenseFileData = null;
            if ($request->event_license_flag == 1) {
                $eventLicenseFileData = File::create([
                    'file_name' => $request->event_license_file,
                    'file_path' => $filePath . $titleSlug . '/',
                    'file_type' => FileTypeConstant::EVENT_LICENSE_FILE,
                ]);
            }

            $eventDetail = EventDetail::create([
                'title'             => $request->title,
                'slug'              => $titleSlug,
                'description'       => $request->description,
                'quota'             => $request->quota,
                'contact_email'     => $request->input('contact_email', Auth::user()->organizer->contact_email),
                'contact_phone'     => $request->input('contact_phone', Auth::user()->organizer->contact_phone),
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'max_register_date' => $request->max_register_date,
                'location'          => $request->location,
                'event_facilities'  => $request->event_facilities,
                'event_benefits'    => $request->event_benefits,
                'social_media_link' => $request->social_media_link,
            ]);

            $createdEvent = $eventDetail->events()->create([
                'organizer_id'           => Auth::user()->organizer->id,
                'event_detail_id'        => $eventDetail->id,
                'status_id'              => EventStatusConstant::WAITING_APPROVAL,
                'event_category_id'      => $request->event_category,
                'event_license_flag'     => $request->event_license_flag,
                'event_banner_file_id'   => $bannerFileData->id ?? null,
                'event_license_file_id'  => $eventLicenseFileData->id ?? null,
                'event_proposal_file_id' => $eventProposalFileData->id ?? null,
                'disability_event_flag'  => count($request->disability_categories) > 0 ? true : false,
                'show_flag'              => false,
                'created_by'             => Auth::user()->username,
            ]);

            if ($request->disability_categories) {
                foreach ($request->disability_categories as $disabilityCategory) {
                    EventDisabilityCategory::create([
                        'event_id' => $createdEvent->id,
                        'disability_category_id' => $disabilityCategory
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('event.index')->with('action-success', 'Event berhasil dibuat! Silahkan menunggu approval admin');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('action-failed', 'Event gagal dibuat! Silahkan coba lagi');
        }
    }

    public function delete($slug) {
        DB::beginTransaction();
        try {
            $event = Event::whereHas('eventDetail', function ($q) use ($slug) {
                $q->where('slug', $slug);
            })->firstOrFail();

            $event->update([
                'show_flag' => false
            ]);

            DB::commit();
            return redirect()->route('event.index')->with('action-success', 'Event berhasil dihapus!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('action-failed', 'Event gagal dihapus! Silahkan coba lagi');
        }
    }
}
