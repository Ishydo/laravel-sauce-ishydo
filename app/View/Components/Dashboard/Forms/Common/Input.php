<?php

namespace App\View\Components\Dashboard\Forms\Common;

use Illuminate\View\Component;

class Input extends Component
{

    public string $name;
    public $label;
    public string $type;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = null,
        string $type = "text",
        $value = null
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.forms.common.input');
    }
}
