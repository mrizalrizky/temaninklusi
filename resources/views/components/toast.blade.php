@if (session()->has($sessionName))
    <div {{ $attributes->merge(['class' => "container-sm border border-secondary bg-white rounded-3 active alert mw-md-75 mw-xl-50 d-flex align-items-center gap-3"]) }}
        style="width: 80%;" role="alert" id="{{ $id }}">
        <iconify-icon icon="{{ $sessionName == 'action-success' ? 'lets-icons:check-fill' : 'ph:x-circle-fill' }}" height="1.5em" class="{{ $sessionName == 'action-success' ? 'text-primary' : 'text-danger'}}"></iconify-icon>
        <div class=" text-primary">
            {{ session()->get($sessionName) }}
        </div>
    </div>
    {{ session()->forget($sessionName) }}
@endif
