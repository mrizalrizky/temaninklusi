<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class UploadImageButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $src;
    public function __construct($name, $src = '')
    {
        $this->name = $name;
        $this->src = $src;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.upload-image-button');
    }
}
