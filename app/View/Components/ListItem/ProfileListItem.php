<?php

namespace App\View\Components\ListItem;

use Illuminate\View\Component;

class ProfileListItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $icon;
    public $href;
    public function __construct($label, $icon, $href = '')
    {
        $this->label = $label;
        $this->icon = $icon;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-item.profile-list-item');
    }
}
