<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class BaseFormMultiSelect extends Component
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
    public $selectedValues;
    public $existingValues;
    public function __construct($name, $id, $placeholder = '', $options = null, $selectedValues = null, $existingValues = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->selectedValues = $selectedValues;
        if($existingValues) {
            foreach($existingValues->toArray() as $val) {
                $this->selectedValues[] = $val['id'];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.base-form-multi-select');
    }
}
