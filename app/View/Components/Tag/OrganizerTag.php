<?php

namespace App\View\Components\Tag;

use Illuminate\View\Component;

class OrganizerTag extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $organizer;
    public function __construct($organizer)
    {
        $this->organizer = $organizer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tag.organizer-tag');
    }
}
