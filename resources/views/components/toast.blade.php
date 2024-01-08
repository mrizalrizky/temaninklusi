@if (session()->has($sessionName))
    <div {{ $attributes->merge(['class' => "container-sm border-none active alert mw-md-75 mw-xl-50 d-flex align-items-center gap-3"]) }}
        style="width: 80%; background-color: {{ $bgColor }};" role="alert" id="{{ $id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div class="fw-bold">
            {{ session()->get($sessionName) }}
        </div>
    </div>
    {{ session()->forget($sessionName) }}
@endif
