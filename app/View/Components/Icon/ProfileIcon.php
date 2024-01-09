<?php

namespace App\View\Components\Icon;

use Illuminate\View\Component;

class ProfileIcon extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $height;
    public function __construct($height = '2.5rem')
    {
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon.profile-icon');
    }
}
