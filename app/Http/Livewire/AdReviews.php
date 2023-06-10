<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class AdReviews extends Component
{
    public $product;

    //refresh the component when a new review is created
    protected $listeners = [
        'reviewCreated' => '$refresh',
    ];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.ad-reviews', [
            'reviews' => $this->product->reviews()->latest()->paginate(2),
        ]);
    }
}
