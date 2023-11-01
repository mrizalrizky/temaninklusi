<?php

namespace App\View\Components\Chip;

use Illuminate\View\Component;

class ChipButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $id;
    public $href;
    public $ariaControls;
    public function __construct($label, $id, $href, $ariaControls)
    {
        $this->label = $label;
        $this->id = $id;
        $this->href = $href;
        $this->ariaControls = $ariaControls;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chip.chip-button');
    }
}
