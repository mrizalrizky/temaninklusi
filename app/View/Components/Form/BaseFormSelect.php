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
    public $options;
    public $placeholder;
    public function __construct($placeholder = '', $options)
    {
        $this->placeholder = $placeholder;
        $this->options = $options;
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
