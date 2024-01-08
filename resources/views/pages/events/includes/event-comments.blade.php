<div class="d-grid gap-3 mb-2">
    @if (Auth::check())
    <x-form.text-area-input action="{{ route('comment.create') }}" name="content" rows="3" placeholder="Leave a comment..." :disabled="true">
        <input type="hidden" name="event_id" value="{{ $event->id }}"/>
    </x-form.text-area-input>
    @endif
    @if (count($event->comments) > 0)
        @foreach ($event->comments as $index=>$comment)
            <x-card.user-comment-card :commentData="$comment" :event="$event" onClick="replyComment({{$index}}, {{$comment->id}})"/>
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
