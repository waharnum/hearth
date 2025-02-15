<?php

namespace Hearth\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert title.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = false, $type = "notice")
    {
        $this->type = $type;

        $this->title = $title ? $title : __("hearth::alert." . $type);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return View::make('hearth::components.alert');
    }
}
