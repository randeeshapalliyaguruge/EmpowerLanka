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


                        <!-- component -->
                            <!-- This is an component for Seller Details -->

                            <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                                <div class='max-w-md mx-auto'>
                                  <div class='p-4 sm:p-6'>
                                    <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>Seller Details: {{ $product->user->name }}</p>
                                    <div class='flex flex-row'>
                                      <p class='text-[17px] font-bold text-[#0FB478]'>Rs. {{ number_format($product->price, 0, ',', ',') }}</p>
                                    </div>
                                    <p class='text-[#7C7C80] font-[15px] mt-6'>Last Edited: {{ $product->updated_at }}</p>
                                    <p class='text-[#7C7C80] font-[15px] mt-1'>Category: {{ $product->category->name }}</p>
                                    <p class='text-[#7C7C80] font-[15px] mt-1'>Views: {{ $product->view_count }}</p>
                                    <p class='text-[#7C7C80] font-[15px] mt-1'>Status: {{ $product->status ? 'Active' : 'Inactive' }}</p>

                                    <p class='text-[#7C7C80] font-[15px] mt-6' id='phone-number' style='display: none; color: #0FB478; font-weight: bold'>Phone Number: {{ $product->number }}</p>
                                    <p class='text-[#7C7C80] font-[15px] mt-1' id='email' style='display: none; color: #0FB478; font-weight: bold'>Email: {{ $product->user->email }}</p>

                                    <a href='#' id='contact-details-toggle' class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                      View Contact Details
                                    </a>
                                    @auth
                                    <a href="#" id='download-app-toggle' class='block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#F2ECE7] hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                      Actions
                                    </a>
                                    <div id='edit-delete-buttons' style='display: none' class="mt-4 ml-2">
                                      @if (auth()->user()->id === $product->user_id)
                                      <a href="{{ auth()->user()->hasRole('admin') ? route('admin.product.edit', $product->id) : route('user.product.edit', $product->id) }}">
                                        <x-table-action-button>Edit</x-table-action-button>
                                      </a>
                                      <form action="{{ auth()->user()->hasRole('admin') ? route('admin.product.destroy', $product) : route('user.product.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-table-action-red-button>Delete</x-table-action-red-button>
                                      </form>
                                      @endif
                                    </div>
                                    @endauth
                                  </div>
                                </div>
                              </div>

                              <script>
                                var contactDetailsToggle = document.getElementById('contact-details-toggle');
                                var downloadAppToggle = document.getElementById('download-app-toggle');
                                var editDeleteButtons = document.getElementById('edit-delete-buttons');

                                contactDetailsToggle.addEventListener('click', function(event) {
                                  event.preventDefault();
                                  document.getElementById('phone-number').style.display = 'block';
                                  document.getElementById('email').style.display = 'block';
                                  contactDetailsToggle.style.display = 'none';

                                  setTimeout(function() {
                                    document.getElementById('phone-number').style.display = 'none';
                                    document.getElementById('email').style.display = 'none';
                                    contactDetailsToggle.style.display = 'block';
                                  }, 6000); // Change the delay time for phone and email (in milliseconds) as desired
                                });

                                downloadAppToggle.addEventListener('click', function(event) {
                                  event.preventDefault();
                                  editDeleteButtons.style.display = 'block';
                                  downloadAppToggle.style.display = 'none';

                                  setTimeout(function() {
                                    editDeleteButtons.style.display = 'none';
                                    downloadAppToggle.style.display = 'block';
                                  }, 3000); // Change the delay time for edit delete button (in milliseconds) as desired
                                });
                              </script>






                    </div>
                    <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 pl-8 pb-10">
                        <p class="text-gray-800 font-bold">Description:</p>
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
