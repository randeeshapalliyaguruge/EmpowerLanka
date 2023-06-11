<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;

class AdReviews extends Component
{
    public $product;

    //refresh the component when a new review is created
    protected $listeners = [
        'reviewCreated' => '$refresh',
        'reviewDeleted' => '$refresh',
    ];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function deleteReview($reviewId)
    {
        $review = Review::find($reviewId);

        if ($review && $review->user_id === auth()->user()->id) {
            $review->delete();
            $this->emit('reviewDeleted');
        }
    }

    public function render()
    {
        return view('livewire.ad-reviews', [
            'reviews' => $this->product->reviews()->latest()->paginate(2),
        ]);
    }
}
