<div class="d-flex">
    <div class="pe-2" style="width: fit-content; height: fit-content">
        <img src="{{ asset('assets/img/ctabanner1.png') }}" style="width: 3rem; height: 3rem" alt="Avatar" class="align-middle rounded-circle">
    </div>
    <div>
        <div class="d-flex justify-content-between">
            <p><span class="fw-bold">{{ $commentData->users->name }}</span> - {{ $commentData->created_at->diffForHumans() }}</p>
            <button class="p-0 bg-transparent border-0 d-flex">
                <iconify-icon icon="mdi:reply" height="1.5rem" class="text-primary"/>
                <p class="text-primary">Reply</p>
            </button>
        </div>
        <p>
            {{-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi in odit consequuntur sunt nam laudantium delectus adipisci asperiores amet, beatae quod earum odio est commodi sit! Asperiores est totam saepe. --}}
            {{ $commentData->content }}
        </p>
    </div>
</div>
