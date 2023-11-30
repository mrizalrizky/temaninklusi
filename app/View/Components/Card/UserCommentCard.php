<?php

namespace App\View\Components\Card;

use App\Models\Event;
use Illuminate\View\Component;

class UserCommentCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $event;
    public $commentData;
    public $onClick;
    public function __construct(Event $event, $commentData, $onClick)
    {
        $this->event = $event;
        $this->commentData = $commentData;
        $this->onClick = $onClick;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.user-comment-card');
    }
}
