<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextAreaInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $rows;
    public $placeholder;
    public $action;
    public function __construct($name, $rows, $placeholder = '', $action)
    {
        $this->name = $name;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area-input');
    }
}
