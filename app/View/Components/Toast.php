<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $bgColor;
    public $sessionName;
    public function __construct($id, $bgColor, $sessionName)
    {
        $this->id = $id;
        $this->bgColor = $bgColor;
        $this->sessionName = $sessionName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toast');
    }
}
