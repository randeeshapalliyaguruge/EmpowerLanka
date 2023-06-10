<div>
    <h3 class="text-lg font-medium leading-7 text-gray-900">Reviews</h3>
    <div class="mt-6 space-y-10 divide-y divide-gray-200 border-b border-t border-gray-200 pb-10">
        @if ($reviews->count())
            @foreach ($reviews as $review)
                <div class="pt-10 lg:grid lg:grid-cols-12 lg:gap-x-8">
                    <div
                        class="lg:col-span-8 lg:col-start-5 xl:col-span-9 xl:col-start-4 xl:grid xl:grid-cols-3 xl:items-start xl:gap-x-8">
                        <div class="flex items-center xl:col-span-1">
                            <div class="flex items-center">

                                @foreach (range(1, 5) as $rating)
                                    <svg class="{{ $review->rating >= $rating ? 'text-yellow-400' : 'text-gray-200' }} h-5 w-5 flex-shrink-0"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endforeach
                            </div>
                            <p class="ml-3 text-sm text-gray-700">{{ $review->rating }}<span class="sr-only"> out of 5
                                    stars</span>
                            </p>
                        </div>

                        <div class="mt-4 lg:mt-6 xl:col-span-2 xl:mt-0">
                            <h3 class="text-sm font-medium text-gray-900">
                                {{ $review->title }}
                            </h3>

                            <div class="mt-3 space-y-6 text-sm text-gray-500">
                                {{ $review->comment }}
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-6 flex items-center text-sm lg:col-span-4 lg:col-start-1 lg:row-start-1 lg:mt-0 lg:flex-col lg:items-start xl:col-span-3">
                        <p class="font-medium text-gray-900">{{ $review->user->name }}</p>
                        <time datetime="{{ $review->created_at->format('Y-m-d') }}"
                            class="ml-4 border-l border-gray-200 pl-4 text-gray-500 lg:ml-0 lg:mt-2 lg:border-0 lg:pl-0">
                            {{ $review->created_at->format('M d, Y') }}
                        </time>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="mt-10 mr-20">
    {{ $reviews->links() }}
    </div>
</div>
