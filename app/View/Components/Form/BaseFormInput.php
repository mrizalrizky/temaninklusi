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
    public $title;
    public $name;
    public $id;
    public $placeholder;
    public $type;
    public $label;
    public $value;
    public $mandatory;
    public function __construct($title = '', $name = '', $id = '', $placeholder = '', $type = 'text', $value = '', $label = false, $mandatory = 'mandatory')
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->label = $label;
        $this->value = $value;
        $this->mandatory = $mandatory;
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
