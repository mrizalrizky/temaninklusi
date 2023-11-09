<?php

namespace App\View\Components\Container;

use Illuminate\View\Component;

class EventDescription extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $description;
    public function __construct($description = '')
    {
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container.event-description');
    }
}
