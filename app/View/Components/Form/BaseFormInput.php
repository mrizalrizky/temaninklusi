<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class BaseFormInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $placeholder;
    public $type;
    public $label;
    public function __construct($name, $placeholder, $type, $label)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.base-form-input');
    }
}
