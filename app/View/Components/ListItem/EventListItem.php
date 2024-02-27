<?php

namespace App\View\Components\ListItem;

use Illuminate\View\Component;

class EventListItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $icon;
    public $label;
    public function __construct($icon = '', $label = '')
    {
        $this->icon = $icon;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listitem.event-list-item');
    }
}
