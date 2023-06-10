<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateAdReview extends Component
{
    public $product;

    public $rating = 3;
    public $title;
    public $comment;

    protected $rules = [
        'rating' => 'required|integer|between:1,5',
        'title' => 'required|min:5',
        'comment' => 'required|min:5',
    ];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function save()
    {
        $this->validate();

        $this->product->reviews()->create([
            'user_id' => auth()->user()->id,
            'rating' => $this->rating,
            'title' => $this->title,
            'comment' => $this->comment,
        ]);

        $this->reset(['rating', 'title', 'comment']);

        $this->emit('reviewCreated');
    }

    public function render()
    {
        return view('livewire.create-ad-review');
    }
}
