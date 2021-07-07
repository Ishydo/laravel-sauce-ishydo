<?php

namespace App\View\Components;

use Illuminate\View\Component;
use app\Models\Code;
use app\Models\Company;
use app\Models\Gift;
use app\Models\Scan;

class ProfileWinScanCard extends Component
{
    public $scan;
    public $code;
    public $gift;
    public $company;
    public $hasCouponCode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($scan)
    {
        $this->scan = $scan;
        $this->code = $scan->code;
        $this->gift = $scan->gift;
        $this->company = $this->code->company;
        $this->hasCouponCode = $this->gift->generate_coupon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile.win-scan-card');
    }
}
