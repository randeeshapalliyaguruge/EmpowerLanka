<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LivewireAdCard extends Component
{

    public $hotel;

    public $price;

    public $rooms;

    public function mount($hotel)
    {
        $this->hotel = $hotel;

        // generate a random price
        $this->price = number_format(rand(100, 1000), 2);
    }

    public function bookNow()
    {
        // save the booking to the database
    }

    public function render()
    {
        return view('livewire.livewire-ad-card');
    }
}
