<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdCard extends Component
{
    public $price;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $hotel
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // generate a random price
        $this->price = number_format(rand(100, 1000), 2);

        return view('components.ad-card');
    }
}
