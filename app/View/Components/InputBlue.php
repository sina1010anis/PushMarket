<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputBlue extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string|int $title, public string|int $plc, public string|int|null $name = null, public string $type = 'text')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-blue');
    }
}
