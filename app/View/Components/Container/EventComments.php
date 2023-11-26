<?php

namespace App\View\Components\Container;

use Illuminate\View\Component;

class EventComments extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comments;
    public function __construct($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container.event-comments');
    }
}
