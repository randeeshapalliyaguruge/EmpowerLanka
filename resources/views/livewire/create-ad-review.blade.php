<div>
    <div class="pt-5">
        <h3 class="text-lg font-medium leading-7 text-gray-900">
            Post A Review
        </h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
            Write about your idea
        </p>
        <form wire:submit.prevent="save" class="relative bg-white pt-4">

            <select name="rating" id="rating" wire:model="rating" class="mb-3 border rounded border-gray-300">
                <option value="" selected disabled>Rating</option>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>
            @error('rating')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div
                class="overflow-hidden rounded-lg border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">

                <label for="title" class="sr-only">Title</label>
                <input type="text" name="title" id="title" wire:model="title"
                    class="block w-full border-0 pt-2.5 text-lg font-medium placeholder:text-gray-400 focus:ring-0"
                    placeholder="Review title..">

                @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label for="comment" class="sr-only">Comment</label>
                <textarea rows="2" name="comment" id="comment" wire:model="comment"
                    class="block w-full resize-none border-0 py-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="Write about your idea about this product..."></textarea>

                @error('comment')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <div aria-hidden="true">
                    <div class="py-2">
                        <div class="h-9"></div>
                    </div>
                    <div class="h-px"></div>
                    <div class="py-2">
                        <div class="py-px">
                            <div class="h-9"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex  space-x-3 border-t border-gray-200 py-2">
                <div class="flex-shrink-0">
                    <button type="submit"
                        class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Post Review</button>
                </div>
            </div>

        </form>

    </div>

</div>
