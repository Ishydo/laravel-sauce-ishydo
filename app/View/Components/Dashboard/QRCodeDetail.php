<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

use App\Models\Code;

class QRCodeDetail extends Component
{

    public Code $code;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    public function getScansNumber() : int {
        return $this->code->scans()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.qrcode-detail');
    }
}
