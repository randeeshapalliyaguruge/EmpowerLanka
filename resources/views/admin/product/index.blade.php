<x-admin-layout>

    <div class="px-4 sm:px-6 lg:px-8">

        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Advertisement</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the products and services in the system.</p>
            </div>

            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.product.create') : route('user.product.create') }}"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Post Your Ad
                 </a>
            </div>

        </div>

        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <x-table class="mx-auto sm:px-6 lg:px-8 flex justify-center">
                            <x-slot name="head">
                                <x-th>Ad ID</x-th>
                                <x-th>Title</x-th>
                                @can('accessAdministration')
                                <x-th>Publisher - ID</x-th>
                                @endcan
                                <x-th>Image</x-th>
                                <x-th>Status</x-th>
                                <x-th>Views</x-th>
                                <x-th>Created Date</x-th>
                                <x-th>Actions</x-th>
                            </x-slot>
                            <x-slot name="body">
                                @foreach ($products as $product)
                                    <x-tr>

                                        <x-td>{{ ($product->id) }}</x-td>
                                        <x-td>
                                            <a href="{{ route('product.show', $product->id) }}" class="text-indigo-500 hover:underline">
                                                {{ $product->title }}
                                            </a>
                                        </x-td>
                                        @can('accessAdministration')
                                        <x-td>{{ $product->user->name }} - {{ $product->user_id }} </x-td>
                                        @endcan
                                        <x-td><img src="/storage/{{ $product->image }}" alt="{{ "No Image" }}" width="100"></x-td>
                                        {{-- <x-td>{{ $product->status ? 'Active' : 'Inactive' }}</x-td> --}}
                                        <x-td>
                                            @if ($product->status)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Inactive
                                                </span>
                                            @endif
                                        </x-td>

                                        <x-td>{{ $product->view_count }}</x-td>
                                        <x-td>{{ $product->created_at->format('d M Y') }}</x-td>
                                        <x-td>
                                            @if (auth()->user()->id === $product->user_id)
                                                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.product.edit', $product->id) : route('user.product.edit', $product->id) }}">
                                                    <x-table-action-button>Edit</x-table-action-button>
                                                </a>
                                            @endif

                                            <form action="{{ auth()->user()->hasRole('admin') ? route('admin.product.destroy', $product) : route('user.product.destroy', $product) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-table-action-red-button>Delete</x-table-action-red-button>
                                            </form>
                                        </x-td>
                                    </x-tr>
                                @endforeach
                            </x-slot>
                        </x-table>
                    </div>
                </div>
                <div class="p-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
