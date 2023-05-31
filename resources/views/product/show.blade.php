<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
         <p>ID: {{ $product->id }}</p>
        <p>Title: {{ $product->title }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
        <p>Image: {{ $product->image }}</p>
        <p>Status: {{ $product->status }}</p>
        <p>User ID: {{ $product->user_id }}</p>


        <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-white rounded-lg overflow-hidden mb-10">
                <img src="{{ $product->image }}" alt="image" class="w-full" />
                <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                    <h3>
                        <a href="javascript:void(0)"
                            class=" font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] mb-4 block hover:text-primary">
                            {{ $product->title }}
                        </a>
                    </h3>
                    <p class="text-base text-body-color leading-relaxed mb-7">
                        {{ $product->description }}
                    </p>
                    <a href="javascript:void(0)"
                        class=" inline-block py-2 px-7 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-primary hover:bg-primary hover:text-white transition">
                        Rs. {{ $product->price }}/=
                    </a>

                    <div class="block mt-4">
                        <form action="/book-now" method="post" class="flex space-x-2">
                            @csrf
                            <input type="text" name="rooms" placeholder="rooms" required>
                            <input type="hidden" name="hotel_id" value="{{ $product->id }}" />
                            <button type="submit"
                                class="inline-block py-2 px-7 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-primary hover:bg-primary hover:text-black transition">
                                Book Now
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


</body>
</html>
