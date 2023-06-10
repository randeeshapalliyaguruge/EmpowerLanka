<x-app-layout>

        {{-- <p>ID: {{ $product->id }}</p>
        <p>Title: {{ $product->title }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
        <p>Image: {{ $product->image }}</p>
        <p>Status: {{ $product->status }}</p>
        <p>User ID: {{ $product->user_id }}</p> --}}

            <div class="container mx-auto">
                <div class="bg-white rounded-lg shadow-lg pl-20 my-3">
                    <h3 class="text-3xl font-semibold text-gray-800 pl-8 pt-9">{{ $product->title }}</h3>
                    <p class="text-gray-600 text-lg mb-2 p-8">Posted: {{ $product->created_at }} , {{$product->user->city}}, {{$product->user->province}}</p>
                    <div class="flex flex-wrap pl-10">
                        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 pl-8 pb-8">
                            <img src="/storage/{{ $product->image }}" alt="Advertisement Image" class="w-full h-auto rounded-lg">
                        </div>
                        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-8">
                            <p class="text-gray-700">Seller Details: {{ $product->user->name }}</p>
                            <p class="text-gray-700">Phone Number: {{ $product->number }}</p>
                            <p class="text-gray-700">Email: {{ $product->user->email }}</p>
                            <p class="text-gray-700">Last Edited: {{ $product->updated_at }}</p>
                            <p class="text-gray-700">Status: {{ $product->status }}</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 pl-8 pb-10">

                        <p class="text-indigo-500 font-bold price-tag">Rs. {{ number_format($product->price, 0, ',', ',') }}</p><br>
                        <p class="text-gray-600 text-lg mb-4">{{ $product->description }}</p>
                    </div>
                </div>

                                {{-- Reviews Section --}}
                    <div class="bg-white rounded-lg shadow-lg pl-20">
                        <div class="px-4 pt-6">

                                {{-- Display reviews --}}
                            @livewire('ad-reviews', [
                                'product' => $product
                                ])

                                {{-- Post a comment --}}
                                @auth
                            @livewire('create-ad-review', [
                                'product' => $product
                                ])
                                @endauth

                                @guest
                                <div class="my-6">
                                       <a href="{{ route('login') }}"
                                        class="inline-flex items-center justify-center px-4 py-2 mb-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">
                                        Login to leave a review
                                    </a>
                                </div>
                                @endguest
                        </div>
                    </div>
            </div>

            <script src="https://cdn.tailwindcss.com/2.2.15/tailwind.min.js"></script>

</x-app-layout>
