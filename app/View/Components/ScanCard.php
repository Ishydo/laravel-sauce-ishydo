<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ScanCard extends Component
{
    public $scan;
    public $hasDetails;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($scan, $hasDetails = false)
    {
        $this->scan = $scan;
        $this->hasDetails = $hasDetails;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.scan-card');
    }
}
