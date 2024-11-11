<div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
    <div class="overflow-x-hidden rounded-2xl relative">
        <a href="/offers/{{ $offer->id }}">
            <img class="h-40 rounded-2xl w-full object-cover"
                src="https://images.pexels.com/photos/264636/pexels-photo-264636.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
        </a>
    </div>
    <div class="mt-4 pl-2 mb-2 flex justify-between ">
        <div>
            <p class="text-lg font-semibold text-gray-900 mb-0">{{ $offer->alimento->name }}</p>
            <p class="text-md text-gray-800 mt-0">${{ $offer->price }}</p>
            <p class="text-md text-gray-800 mt-0">Cantidad: {{ $offer->cant }}</p>
        </div>
    </div>
</div>
