<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class BaseFormSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $id;
    public $options;
    public $placeholder;
    public $onChange;
    public function __construct($name, $id, $placeholder = '', $options = null, $onChange = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->onChange = $onChange;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.base-form-select');
    }
}
