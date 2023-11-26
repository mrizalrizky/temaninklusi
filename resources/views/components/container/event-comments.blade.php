<div>
    @if (Auth::check() && (Auth::user()->isMember() || Auth::user()->isEO()))
        <div class="input-group mb-3">
            <form action="{{ route('comment.create') }}" method="POST">
                @csrf
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" placeholder="Leave a comment..."></textarea>
                <input type="hidden" name="event_id" value="{{ $eventId }}"/>
                <span class="input-group-append">
                    <button class="bg-transparent border-0" type="submit">
                        <iconify-icon icon="iconamoon:send-fill" height="1.5em" class="text-primary"/>
                    </button>
                </span>
            </form>
        </div>
    @endif
    <div class="d-grid gap-4">
        @if (count($comments) > 0)
            @foreach ($comments as $index=>$comment)
                <div id="user_comment">
                    <x-card.user-comment-card :commentData="$comment" onClick="replyComment({{$index}}, {{$comment->id}})"/>
                </div>
            @endforeach
            @else
                <p>Tidak ada komentar...</p>
        @endif
    </div>
</div>

@push('after-script')
    <script>
        const replyComment = (index, commentId) => {
            let element = document.querySelectorAll('#user_comment')
            let newEl = document.createElement('div')
            let replyEl = document.querySelectorAll('#comment_replies')

            console.log('REPLYEL[index]', index, replyEl[index]);


            newEl.className='input-group mb-3'
            newEl.innerHTML = `
                <form id="comment_replies" enctype="multipart/form-data" action="{{ route('comment.reply') }}" method="POST">
                    @csrf
                    <textarea class="form-control" id="textarea" name="content" rows="3" placeholder="Leave a comment..."></textarea>
                    <input type="hidden" name="user_comment_id" value="${commentId}"
                    <span class="input-group-append">
                        <button class="bg-transparent border-0" type="submit">
                            <iconify-icon icon="iconamoon:send-fill" height="1.5em" class="text-primary"/>
                        </button>
                    </span>
                </form>
            `

            element[index].appendChild(newEl)
        }
    </script>
@endpush
