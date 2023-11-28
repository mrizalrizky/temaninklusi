<div>
    <div class="d-flex">
        <div class="pe-3">
            <img src="{{ asset('assets/img/ctabanner1.png') }}" style="width: 3rem; height: 3rem" alt="Avatar" class="align-middle rounded-circle">
        </div>
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <p><span class="fw-bold">{{ $commentData->users ? $commentData->users->name : '' }}</span> - {{ $commentData->created_at ? $commentData->created_at->diffForHumans() : '' }}</p>
                @if (Auth::check() && (Auth::user()->isMember() || Auth::user()->isEO()))
                    <button class="p-0 bg-transparent border-0 d-flex"
                            onclick="{{ $onClick }}">
                        <iconify-icon icon="mdi:reply" height="1.5rem" class="text-primary"/>
                    </button>
                @endif
            </div>
            <p>{{ $commentData->content }}</p>
        </div>
    </div>
    <div class="d-grid gap-2 ms-5" id="user_comment">
        @foreach ($commentData->replies as $reply)
        <div class="d-flex">
            <div class="pe-3">
                <img src="{{ asset('assets/img/ctabanner1.png') }}" style="width: 3rem; height: 3rem" alt="Avatar" class="align-middle rounded-circle">
            </div>
            <div>
                <div>
                    <p><span class="fw-bold">{{ $reply->users->name }}</span> - {{ $reply->created_at->diffForHumans() }}</p>
                </div>
                <p>{{ $reply->content }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
