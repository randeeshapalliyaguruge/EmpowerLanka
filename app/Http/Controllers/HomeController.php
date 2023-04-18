<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        // create a list of hotels an array with the variable $hotels
        $hotels = [
            [
                'id' => 1,
                'name' => 'Hotel 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eu nisl.',
                'image' => 'https://source.unsplash.com/1200x400/?hotel,1',
            ],
            [
                'id' => 2,
                'name' => 'Hotel 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eu nisl.',
                'image' => 'https://source.unsplash.com/1200x400/?hotel,2',
            ],
            [
                'id' => 3,
                'name' => 'Hotel 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eu nisl.',
                'image' => 'https://source.unsplash.com/1200x400/?hotel,3',
            ]
        ];

        return view('home', [
            'title' => 'Home',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eu nisl.',
            'image' => 'https://source.unsplash.com/400x400/?company,logo',
            'cover' => 'https://source.unsplash.com/1200x400/?hotels,water',
            'hotels' =>  $hotels,
        ]);
    }
}
