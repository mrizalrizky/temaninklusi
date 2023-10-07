<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $label;
    public $name;
    public $type;
    public function __construct($label, $name, $type)
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth-input');
    }
}
