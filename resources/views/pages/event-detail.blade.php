@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div id="carouselFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach ($event->eventFiles as $eventBanner)
            <div style="height: 27.5rem;" class="carousel-item active w-100 overflow-hidden border-0 rounded-4 my-5">
                <img src="{{ $eventBanner->files['file_path']}}" class="w-100 h-100 object-fit-cover border-0 rounded" alt="...">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <div class="d-md-flex justify-content-between">
        <div>
            <div class="text-center text-md-start">
                {{-- <p style="font-size: 0.85rem">{{ $event->eventDetails['start_date']->format('d M Y') }}</p> --}}
                <h2>{{ $event->eventDetails['title'] }}</h2>
            </div>

            <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
                <x-chip.chip-button  class="active" label="Description" id="description-tab" href="#description-href" ariaControls="description-href"/>
                <x-chip.chip-button label="Details" id="details-tab" href="#details-href" ariaControls="details-href"/>
                <x-chip.chip-button label="Comments" id="comments-tab" href="#comments-href" ariaControls="comments-href"/>
            </ul>
            <div class="tab-content" id="ex1-content">
                <x-chip.chip-content class="active" id="description-href" ariaLabelledBy="description-tab">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit exercitationem accusamus ipsa, tempora eveniet assumenda quo! Ullam repudiandae tenetur enim molestias modi in magni cumque doloremque, incidunt inventore voluptas corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit consequuntur sapiente, aperiam nulla sint quaerat. Omnis laborum ipsam provident expedita ea nulla porro amet! Harum facere velit quidem laudantium. Atque?
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur eveniet quaerat velit at ad, similique sit expedita. Quod nobis fugiat numquam dicta sit mollitia. Maiores dolorum officiis doloribus harum accusamus.
                    </p>
                </x-chip.chip-content>
                <x-chip.chip-content id="details-href" ariaLabelledBy="details-tab">
                    <div class="d-grid gap-5 d-flex">
                        <div>
                            <h4>Event Details</h4>
                            <ul class="d-grid gap-4 p-0 justify-content-center justify-content-md-start">
                                <x-listitem.event-list-item icon="bytesize:location">
                                    {{ $event->eventDetails['location'] }}
                                </x-listitem.event-list-item>
                                <x-listitem.event-list-item icon="fontisto:date">
                                    {{ $event->eventDetails['start_date']->format('d M Y') }} - {{ $event->eventDetails['end_date']->format('d M Y') }}
                                </x-listitem.event-list-item>
                                <x-listitem.event-list-item icon="ph:clock-fill">
                                    {{ $event->eventDetails['start_date']->format('H.i') }} - {{ $event->eventDetails['end_date']->format('H.i') }} WIB
                                </x-listitem.event-list-item>
                            </ul>
                        </div>

                        <div>
                            <h4>Fasilitas</h4>
                            <ul>
                                <li>Memberdayakan Komunikasi</li>
                                <li>Menginspirasi Pemikiran Kritis</li>
                                <li>Meningkatkan Kesadaran Emosional</li>
                            </ul>
                        </div>
                    </div>

                    {{-- <div class="d-grid gap-5 d-flex">
                        <div>
                            <h5>Benefit</h5>
                            <ul>
                                <li>Memberdayakan Komunikasi</li>
                                <li>Menginspirasi Pemikiran Kritis</li>
                                <li>Meningkatkan Kesadaran Emosional</li>
                            </ul>
                        </div>
                        <div>
                            <h5>Goals</h5>
                            <ul>
                                <li>Memberdayakan Komunikasi</li>
                                <li>Menginspirasi Pemikiran Kritis</li>
                                <li>Meningkatkan Kesadaran Emosional</li>
                            </ul>
                        </div>
                    </div> --}}

                </x-chip.chip-content>
                <x-chip.chip-content id="comments-href" ariaLabelledBy="comments-tab">
                    <h1> TEST 3</h1>
                </x-chip.chip-content>
            </div>
        </div>
        <x-event-detail-container :event="$event"/>
    </div>

</div>
@endsection
