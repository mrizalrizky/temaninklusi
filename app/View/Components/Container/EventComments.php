<?php

namespace App\View\Components\Container;

use App\Models\Event;
use Illuminate\View\Component;

class EventComments extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $event;
    public function __construct(Event $event)
    {
        $this->event = $event;
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
