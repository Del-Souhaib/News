<?php

namespace App\View\Components\layouts;

use Illuminate\View\Component;

class relatednews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $related;
    public function __construct($related)
    {
        $this->related=$related;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.layouts.relatednews');
    }
}
