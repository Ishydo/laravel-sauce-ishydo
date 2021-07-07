<?php

namespace App\View\Components\Layouts;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Dashboard extends Component
{

    public Collection $menuItems;
    public Collection $moreLinks;
    public string $pageName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentRoute = '', $pageName = 'Dashboard')
    {
        $this->pageName = $pageName;

        $items = collect(
            [
                "Dashboard" => [
                    "routeName" => 'dashboard',
                    "icon" => "M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6",
                ],
                /* "Gifts" => [
                    "routeName" => 'dashboard',
                    "icon" => "M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7",
                ], */
                "QRCodes" => [
                    "routeName" => 'codes.index',
                    "icon" => "M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z",
                ],
                "Scans" => [
                    "routeName" => 'scans.index',
                    "icon" => "M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z",
                ],
                /*"Statistics" => [
                    "routeName" => 'dashboard',
                    "icon" => "M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z",
                ],*/
                /*"Company" => [
                    "routeName" => 'companies.index',
                    "icon" => "M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z",
                ]*/
            ]
        );

        $this->moreLinks = collect([
            "Documentation" => [
                "routeName" => 'dashboard'
             ],
            "News" => [
                "routeName" => 'companies.index'
            ]
        ]);

        $this->menuItems = $items->map(function ($m) use ($currentRoute) {
                $m["href"] = route($m["routeName"]);
                $m["isCurrent"] = $m["routeName"] === $currentRoute;
                return $m;
            }
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.dashboard');
    }
}
