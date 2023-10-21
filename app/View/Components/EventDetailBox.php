<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventDetailBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $event;
    public function __construct($event)
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
        return view('components.event-detail-box');
    }
}
