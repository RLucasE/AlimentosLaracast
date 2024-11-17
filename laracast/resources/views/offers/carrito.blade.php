<x-layout>
    <x-slot:heading>
        @foreach ($vendedores as $vendedor)
            <x-vend-carrito :vend="$vendedor" :carts="$detalleCarts"></x-vend-carrito>
        @endforeach
    </x-slot:heading>
    <!-- component -->

</x-layout>
