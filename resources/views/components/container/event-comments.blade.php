<div class="d-grid gap-3 mb-2">
    @if (Auth::check() && (Auth::user()->isMember() || Auth::user()->isEO()))
        <x-form.text-area-input action="{{ route('comment.create') }}" name="content" rows="3" placeholder="Leave a comment...">
            <input type="hidden" name="event_id" value="{{ $eventId }}"/>
        </x-form.text-area-input>
    @endif
    @if (count($comments) > 0)
        @foreach ($comments as $index=>$comment)
            <x-card.user-comment-card :commentData="$comment" onClick="replyComment({{$index}}, {{$comment->id}})"/>
        @endforeach
    @else
        <p>Tidak ada komentar...</p>
    @endif
</div>

@push('after-script')
    <script>
        let isReply = false
        const replyComment = (index, commentId) => {
            if(isReply) return;
            isReply = true

            const element = document.querySelectorAll('#user_comment')
            const replyEl = document.querySelector('#comment_replies')

            if(replyEl) replyEl.remove()

            const fragment = document.createDocumentFragment()
            const newEl = document.createElement('div')
            newEl.setAttribute("id", "comment_replies");
            newEl.innerHTML = `
                <x-form.text-area-input action="{{ route('comment.reply') }}" name="content" rows="3" placeholder="Leave a comment...">
                    <input type="hidden" name="user_comment_id" value="${commentId}"/>
                </x-form.text-area-input>
            `

            fragment.appendChild(newEl)
            element[index].appendChild(fragment)

            setTimeout(() => {
                isReply = false
            }, 1000);
        }
    </script>
@endpush
