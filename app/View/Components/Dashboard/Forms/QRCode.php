<?php

namespace App\View\Components\Dashboard\Forms;

use Illuminate\View\Component;
use App\Models\Code;

class QRCode extends Component
{

    public string $target;
    public string $uuid;
    public $code;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $target, string $uuid, $code = null)
    {
        $this->target = $target;
        $this->uuid = $uuid;
        $this->code = $code;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.forms.q-r-code');
    }
}
