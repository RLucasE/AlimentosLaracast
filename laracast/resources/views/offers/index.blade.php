<x-layout>
    <x-slot:heading>
        Ofertas de alimentos
    </x-slot:heading>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center">
        <div class="relative m-3 flex flex-wrap mx-auto justify-center">
            @foreach ($offers as $offer)
                <x-simple-card-offer :offer="$offer"></x-simple-card-offer>
            @endforeach
        </div>
    </div>
</x-layout>
