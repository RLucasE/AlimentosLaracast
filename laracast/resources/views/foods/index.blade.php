<x-layout>
    <x-slot:heading>
        Alimentos
    </x-slot:heading>
    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
    <div>
        <x-button href='/foods/create'>Registrar Alimento</x-button>
    </div>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($foods as $food)
                    <x-tarjeta-alimento :food="$food" href="/foods/{{ $food->id }}"></x-tarjeta-alimento>
                @endforeach
                <!-- More products... -->
            </div>
        </div>
    </div>



</x-layout>
