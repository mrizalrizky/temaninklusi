<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserComment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $commentData;
    public function __construct($commentData)
    {
        $this->commentData = $commentData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-comment');
    }
}
