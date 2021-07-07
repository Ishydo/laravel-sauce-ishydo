<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ScanDebugList extends Component
{

    public $gift;
    public $code;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($code, $gift)
    {
        $this->gift = $gift;
        $this->code = $code;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.scan-debug-list');
    }
}
