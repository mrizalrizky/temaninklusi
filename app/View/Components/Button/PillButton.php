<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class PillButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $dataBsTarget;
    public $ariaControls;
    public function __construct($id, $dataBsTarget, $ariaControls)
    {
        $this->id = $id;
        $this->dataBsTarget = $dataBsTarget;
        $this->ariaControls = $ariaControls;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.pill-button');
    }
}
