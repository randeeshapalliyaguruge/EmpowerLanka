<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between mb-6">

        <form action="{{ route('product.index') }}" method="GET" class="grid grid-cols-3 gap-2">

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

        <div class="grid grid-cols-3 gap-2">
            @foreach ($products as $product)
                @if ($product->status)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $product->image ? '/storage/' . $product->image : 'https://placehold.co/600x400' }}" alt="{{ $product->title }}" class="rounded-t-lg object-cover w-full h-full" onerror="this.src='https://placehold.co/600x400'" />
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $product->title }}</h5>
                        <p class="text-base text-gray-500 leading-relaxed mb-4">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-base text-gray-500 leading-relaxed mb-4">{{ $product->category->name }}</p>
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1 flex-shrink-0">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                <line x1="16" y1="2" x2="16" y2="6" />
                                <line x1="8" y1="2" x2="8" y2="6" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                            </svg>
                            <span class="text-sm text-gray-500">Price: <span class="font-medium">Rs. {{ number_format($product->price, 0, '.', ',') }}/</span></span>
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
        <div class="p-4">
            {{ $products->links() }}
        </div>

    </div>

    </div>
</x-app-layout>
