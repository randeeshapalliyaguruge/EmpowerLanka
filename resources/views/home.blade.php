<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- <div class="bg-white rounded-lg shadow-xl pb-8">
                <div class="w-full h-[250px]">
                    <img src="{{ $cover }}" class="w-full h-full rounded-tl-lg rounded-tr-lg">
                </div>
                <div class="flex flex-col items-center -mt-20">
                    <img src="{{ $image }}" class="w-40 border-4 border-white rounded-full">
                    <div class="flex items-center space-x-2 mt-2">
                        <p class="text-2xl">{{ $title }}</p>
                        <span class="bg-blue-500 rounded-full p-1" title="Verified">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-gray-700">{{ $description }}</p>
                </div>
            </div>

            <h1 class="text-2xl mt-9">
                Laravel Blade Component
            </h1>
            <div class="flex flex-wrap -mx-4 mt-9">
                @foreach ($hotels as $hotel)
                    <x-hotel-card :hotel="$hotel" />
                @endforeach
            </div>

            <h1 class="text-2xl mt-9">
                Livewire Blade Component
            </h1>
            <div class="flex flex-wrap -mx-4 mt-9">
                @foreach ($hotels as $hotel)
                    @livewire('livewire-hotel-card', ['hotel' => $hotel])
                @endforeach
            </div> --}}





        </div>
    </div>
</x-app-layout>
