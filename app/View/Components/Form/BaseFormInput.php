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
    public $value;
    public function __construct($name = '', $placeholder = '', $type = 'text', $value = '', $label = false)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->label = $label;
        $this->value = $value;
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
