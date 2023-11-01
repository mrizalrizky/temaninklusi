<?php

namespace App\View\Components\Chip;

use Illuminate\View\Component;

class ChipContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $ariaLabelledBy;
    public function __construct($id, $ariaLabelledBy)
    {
        $this->id = $id;
        $this->ariaLabelledBy = $ariaLabelledBy;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chip.chip-content');
    }
}
