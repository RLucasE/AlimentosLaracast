<x-layout>
    <x-slot:heading>
        Clientes que quieren comprar
    </x-slot:heading>

    @foreach ($compradores as $comprador)
        @php
            // Filtrar los carritos donde el num_comprador coincida con el id del comprador
            $carritosFiltrados = $carritos->where('comp_num', $comprador->id);
        @endphp
        <x-clients-table :comprador="$comprador" :carritos="$carritosFiltrados"></x-clients-table>
    @endforeach




</x-layout>
