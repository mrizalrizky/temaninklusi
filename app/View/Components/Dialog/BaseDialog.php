<?php

namespace App\View\Components\Dialog;

use Illuminate\View\Component;

class BaseDialog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $id;
    public $action;
    public $title;
    public $submitTitle;
    public $rejectTitle;
    public $method;
    public function __construct($id, $action, $title = '', $submitTitle = 'Ya', $rejectTitle = 'Tidak', $method = 'POST')
    {
        $this->id = $id;
        $this->action = $action;
        $this->title = $title;
        $this->submitTitle = $submitTitle;
        $this->rejectTitle = $rejectTitle;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dialog.base-dialog');
    }
}
