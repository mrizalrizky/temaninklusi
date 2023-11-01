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
        <div class="text-center text-md-start">
            <p style="font-size: 0.85rem">{{ $event->eventDetails['start_date']->format('d M Y') }}</p>
            <h3>{{ $event->eventDetails['title'] }}</h3>
        </div>
        <x-event-detail-container :event="$event"/>
    </div>

<!-- Pills navs -->
<ul class="nav nav-pills mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="ex1-tab-1"
      data-mdb-toggle="pill"
      href="#ex1-pills-1"
      role="tab"
      aria-controls="ex1-pills-1"
      aria-selected="true"
      >Tab 1</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex1-tab-2"
      data-mdb-toggle="pill"
      href="#ex1-pills-2"
      role="tab"
      aria-controls="ex1-pills-2"
      aria-selected="false"
      >Tab 2</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex1-tab-3"
      data-mdb-toggle="pill"
      href="#ex1-pills-3"
      role="tab"
      aria-controls="ex1-pills-3"
      aria-selected="false"
      >Tab 3</a
    >
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content" id="ex1-content">
  <div
    class="tab-pane fade show active"
    id="ex1-pills-1"
    role="tabpanel"
    aria-labelledby="ex1-tab-1"
  >
    Tab 1 content
  </div>
  <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
    Tab 2 content
  </div>
  <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
    Tab 3 content
  </div>
</div>
<!-- Pills content -->

</div>
@endsection
