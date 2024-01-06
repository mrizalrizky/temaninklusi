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
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary d-flex justify-content-center d-md-none mt-3 rounded-pill">
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
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary rounded-5 px-5 py-2"
                        style="padding: 0 2.2rem">
                        Login
                    </a>
                @else
                    <a href="{{ route('profile.index') }}" style="padding: 0 1.2rem">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.85rem" style="fill: #01676c"
                            viewBox="0 0 512 512">
                            <path
                                d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
