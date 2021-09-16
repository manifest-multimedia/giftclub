<?php

namespace App\View\Components;

use Illuminate\View\Component;

class b-page-title extends Component
{
    public $pagetitle; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pagetitle)
    {
        $this->pagetitle=$pagetitle; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.b-page-title');
    }
}
