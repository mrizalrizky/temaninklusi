<nav class="navbar navbar-expand-md py-4 top-0 position-md-relative z-3 {{ request()->route()->named('index') ? 'bg-primary-2' : null }}">
    <div class="container-lg px-4 px-md-3">
        <a class="navbar-brand fw-bolder" href="{{ route('index') }}">{{ config('app.name') }}</a>
        <button class="ms-auto d-md-none bg-transparent" type="button" data-bs-toggle="collapse"
            style="border-color: transparent !important" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i data-feather="menu" class="text-primary"></i>
        </button>

        <div class="collapse navbar-collapse flex-grow-0 ms-2" id="navbarSupportedContent">
            <ul class="navbar-nav gap-md-3 mt-2 px-2">
                <x-listitem.navbar-item href="{{ route('index') }}">
                    Home
                </x-listitem.navbar-item>
                <x-listitem.navbar-item href="{{ route('event.index') }}">
                    Event
                </x-listitem.navbar-item>
                <x-listitem.navbar-item href="{{ route('blog.index') }}">
                    Blog
                </x-listitem.navbar-item>
                <x-listitem.navbar-item href="{{ route('about') }}">
                    About
                </x-listitem.navbar-item>

                {{-- Login desktop --}}
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary d-flex justify-content-center d-md-none mt-3 rounded-custom">
                        Login
                    </a>
                @else
                    <x-listitem.navbar-item href="{{ route('profile.index') }}" class="d-md-none">
                        Profile
                    </x-listitem.navbar-item>
                @endif
            </ul>
        </div>

        {{-- Login mobile --}}
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <div class="ms-auto d-flex d-none d-md-flex">
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary rounded-custom px-5 py-2"
                        style="padding: 0 2.2rem">
                        Login
                    </a>
                @else
                    <a href="{{ route('profile.index') }}" style="padding: 0 1.2rem">
                        <x-icon.profile-icon height="2rem"/>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
