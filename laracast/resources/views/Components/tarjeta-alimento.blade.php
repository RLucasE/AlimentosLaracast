<div class="group relative">
    <div
        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
        <img src="https://images.pexels.com/photos/264636/pexels-photo-264636.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="Front of men&#039;s Basic Tee in black."
            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
    </div>
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-sm text-gray-700">
                <a href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $food->name }}
                </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">{{ $food->AlimentoState->description }}</p>
            <p class="mt-1 text-sm text-gray-500">{{ $food->alimentoType->name }}</p>

            <x-button class="mt-2" href='/jobs/create'>Aprobar</x-button>
            <x-button class="mt-2" href='/jobs/create'>Editar</x-button>
            <x-button class="mt-2" href='/jobs/create'>Aliminar</x-button>
        </div>
    </div>
</div>
