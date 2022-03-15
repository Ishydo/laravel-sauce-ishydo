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
                "Menu Item #2" => [
                    "routeName" => 'home',
                    "icon" => "M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z",
                ],
                "Menu Item #3" => [
                    "routeName" => 'home',
                    "icon" => "M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z",
                ],
            ]
        );

        $this->moreLinks = collect([
            "Link #1" => [
                "routeName" => 'home'
             ],
            "Link #2" => [
                "routeName" => 'home'
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
