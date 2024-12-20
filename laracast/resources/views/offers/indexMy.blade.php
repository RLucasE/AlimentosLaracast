<x-layout>
    <x-slot:heading>
        <div class="flex space-x-4">
            <div>
                <x-button href='/createOffer'>Nueva oferta</x-button>
            </div>
        </div>
    </x-slot:heading>

    <div class="min-h-screen bg-gray-100 flex flex-col ">
        <div class="relative m-3 flex flex-wrap mx-auto justify-center">
            @foreach ($offersMy as $offer)
                <x-simple-card-offer :offer="$offer"></x-simple-card-offer>
            @endforeach
        </div>
    </div>

</x-layout>
