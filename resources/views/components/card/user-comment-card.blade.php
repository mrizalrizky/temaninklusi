<div>
    <div class="d-flex">
        <div class="pe-3">
            <x-icon.profile-icon height="2.5rem"/>
        </div>
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <p>
                    <span class="fw-bold">{{ $commentData->users ? $commentData->users->name : '-' }}</span> -
                    {{ $commentData->created_at ? $commentData->created_at->diffForHumans() : '-' }}
                </p>
                @if (Auth::check())
                <div class="d-flex gap-1">
                    <button class="p-0 bg-transparent border-0 d-flex" onclick="{{ $onClick }}">
                        <iconify-icon icon="mdi:reply" height="1.5rem" class="text-primary" />
                    </button>
                    @can('is-admin')
                    <button type="button" class="p-0 bg-transparent border-0 d-flex" data-bs-toggle="modal"
                                data-bs-target="#deleteComment-{{$commentData->id}}">
                        <iconify-icon icon="mdi:trash" height="1.5rem" class="text-danger" />
                    </button>
                    @endcan
                </div>
                @endif
            </div>
            <p>{{ $commentData->content }}</p>
        </div>
    </div>

    <x-dialog.base-dialog id="deleteComment-{{$commentData->id}}" action="{{ route('comment.delete', $commentData->id) }}"
        title="Yakin akan hapus komentar?">
        {{ method_field('DELETE') }}
    </x-dialog.base-dialog>
    <div class="d-grid gap-2 ps-5 pe-3" id="user_comment">
        @foreach ($commentData->replies as $reply)
            <div class="d-flex">
                <div class="pe-3">
                    <x-icon.profile-icon height="2.5rem"/>
                </div>
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <p><span class="fw-bold">{{ $reply->users ? $reply->users->name : '-' }}</span> -
                            {{ $reply->created_at ? $reply->created_at->diffForHumans() : '-' }}</p>
                        <div class="d-flex gap-1">
                        @can('is-admin')
                            <form action="{{ route('comment.reply.delete', $reply->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="p-0 bg-transparent border-0 d-flex" data-bs-toggle="modal"
                                    data-bs-target="#deleteCommentReply-{{$reply->id}}">
                                    <iconify-icon icon="mdi:trash" height="1.5rem" class="text-danger" />
                                </button>
                            </form>
                        @endcan
                        </div>
                    </div>
                    <p>{{ $reply->content }}</p>
                </div>
            </div>

            <x-dialog.base-dialog id="deleteCommentReply-{{$reply->id}}" action="{{ route('comment.reply.delete', $reply->id) }}"
                title="Yakin akan hapus komentar?">
                {{ method_field('DELETE') }}
            </x-dialog.base-dialog>
        @endforeach
    </div>
</div>
