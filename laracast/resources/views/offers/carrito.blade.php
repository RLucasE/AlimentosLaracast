<x-layout>
    <x-slot:heading>
        @foreach ($carritoDetailsGrouped as $carrito)
            <x-vend-carrito :detalles="$detalleCarts"></x-vend-carrito>
        @endforeach
    </x-slot:heading>
    <!-- component -->

</x-layout>
