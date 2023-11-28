<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class UserCommentCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $commentData;
    public $onClick;
    public function __construct($commentData, $onClick)
    {
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
