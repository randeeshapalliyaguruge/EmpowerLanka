<x-admin-layout>
    <div class="space-y-10 divide-y divide-gray-900/10" x-data="productForm">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">
                    Product
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Basic information about the product
                </p>
            </div>

            <form method="post" enctype="multipart/form-data"
                action="{{ $product->exists ? route('admin.product.update', $product) : route('admin.product.store') }}"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                @csrf
                @if ($product->exists)
                    @method('put')
                @endif
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Title
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="title" id="title"
                                        value="{{ old('title', $product->title) }}"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-2 w-full text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Product Title">
                                </div>
                                @error('title')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3"
                                    class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">{{ old('description', $product->description) }}</textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">
                                Brief description for your product.
                            </p>
                            @error('description')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-4">
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">
                                Price
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="price" id="price"
                                        value="{{ old('price', $product->price) }}"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-2 w-full text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Product price">
                                </div>
                            </div>
                            @error('price')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="photo"
                                class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <img alt="image" x-bind:src="imagePreview" class="w-10" />
                                <input type="file" name="image" x-on:change="fileAdded" />
                            </div>
                            @error('image')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">
                                Status
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="checkbox" name="status" id="status"
                                        {{ old('status', $product->status) ? 'checked' : '' }}
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-2  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a href="{{ route('admin.product.index') }}" class="text-sm font-semibold leading-6 text-gray-900">
                        Cancel
                        </button>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener('alpine:init', () => {
            Alpine.data('productForm', () => ({
                imagePreview: "{{ $product->image ? "/storage/".$product->image : 'https://via.placeholder.com/320x320.png' }}",
                init() {
                    console.log('product form')
                },
                fileAdded(e) {
                    const file = e.target.files[0]
                    if (file) {
                        this.imagePreview = URL.createObjectURL(file)
                    }
                }
            }))
        })
    </script>
</x-admin-layout>
