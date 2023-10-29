<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class EventCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $event;
    // public $title;
    // public $date;
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
        return view('components.card.event-card');
    }
}
