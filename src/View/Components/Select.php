<?php

namespace Hearth\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * The select options.
     *
     * @var array
     */
    public $options;

    /**
     * The selected option.
     *
     * @var string
     */
    public $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $selected = "")
    {
        $this->options = $options;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return View::make('hearth::components.select');
    }
}
