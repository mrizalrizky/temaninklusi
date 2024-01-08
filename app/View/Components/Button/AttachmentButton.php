<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class UploadButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $accept;
    public function __construct($name = '', $accept = '')
    {
        $this->name = $name;
        $this->accept = $accept;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.upload-button');
    }
}
