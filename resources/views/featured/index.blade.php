<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between mb-6">

        <form action="{{ route('featured.index') }}" method="GET" class="grid grid-cols-3 gap-2">

            <div class="px-4">
                <select name="category" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-primary focus:border-primary">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ $selectedCategory == $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class=" px-4">
                <input type="text" name="q" placeholder="Search" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-primary focus:border-primary" />
            </div>


            <div class=" px-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Apply</button>
            </div>

        </form>
        </div>
        <div class="flex justify-center items-center mt-8">
            <div class="w-full bg-white rounded-lg pl-10 pr-10 pt-6 pb-2">
                <div class="flex justify-center m-2 ">
                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl ">
                        Featured Ads
                    </h1>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($featured as $product)
                        @if ($product->status)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $product->image ? '/storage/' . $product->image : 'https://placehold.co/600x400' }}" alt="{{ $product->title }}" class="rounded-t-lg object-cover w-full h-full" onerror="this.src='https://placehold.co/600x400'" />
                            </div>
                            <div class="p-5">
                                <a href="{{ route('product.show', $product->id) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $product->title }}</h5></a>
                                {{-- <p class="text-base text-gray-500 leading-relaxed mb-4">{{ Str::limit($product->description, 50) }}</p> --}}
                                <div class="flex items-center mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="16" height="16" class="category-icon">
                                        <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <span><p class="text-sm text-gray-500 ml-1"> {{ $product->category->name }}</p></span>
                                </div>
                                <div class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                                        <path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                    <span class="text-sm text-gray-500">{{$product->user->city}}</span>
                                </div>

                                <div class="flex items-center mb-2">
                                    <p class='text-[17px] font-bold text-[#0FB478]'>Rs. {{ number_format($product->price, 0, ',', ',') }}</p>
                                </div>
                                <div class="flex justify-center">
                                    <a href="{{ route('product.show', $product->id) }}" class="inline-flex items-center px-6 py-2 mt-4 text-sm font-bold text-center text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        View Ad
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class=" md:flex md:items-center pt-10">
                    <div class="md:w-1/3">
                        <a href="{{ route('contact-us') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Request Featured Ad
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                    <div class="md:w-2/3"></div>
                </div>
                <div class="p-4">
                    {{ $featured->links() }}
                </div>
            </div>
        </div>
    </div>

    </div>

</x-app-layout>
