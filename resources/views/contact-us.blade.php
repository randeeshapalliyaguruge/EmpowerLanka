<!-- component -->
<x-app-layout>

    <div class="flex justify-center items-center mt-8">
        <div class="w-1/2 bg-white rounded-lg mb-10">
            <div class="flex justify-center mt-4">
                @if (Session::has('message_sent'))
                <script>
                    Swal.fire(
                        'Thank You!',
                        '{{ Session::get("message_sent") }}',
                        'success'
                    );
                </script>
                    @endif
            </div>
            <div class="container">
                <div class="flex justify-center m-2 ">
                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl ">
                        Contact Us
                    </h1>
                </div>

                <div class="flex justify-center mt-6 mb-10">
                    <div class="w-full max-w-lg">
                        <form method="POST" action="{{ route('send-email') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        First Name
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" placeholder="Jane" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Last Name
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe" name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                        E-mail
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                        Message
                                    </label>
                                    <textarea class="no-resize appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message" name="message">{{ old('message') }}</textarea>
                                    @error('message')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                    <p class="text-gray-600 text-xs italic">Some tips - as long as needed</p>
                                </div>
                            </div>
                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <button class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900" type="submit">
                                        Send
                                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>

                                </div>
                                <div class="md:w-2/3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div pb-10>
        <x-footer></x-footer>
    </div>
</x-app-layout>
