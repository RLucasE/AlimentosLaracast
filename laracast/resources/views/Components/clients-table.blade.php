@php
    // Filtrar los carritos donde el num_comprador coincida con el id del comprador
    $total = 0;
@endphp
<div class="flex flex-col">
    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full">
                    <caption class="text-lg font-semibold text-gray-900 p-4 bg-gray-50 text-center">
                        {{ $comprador->name }}
                    </caption>
                    <thead class="bg-white border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Oferta
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Cant
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Precio
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carritos as $detalleCar)
                            <tr class="bg-gray-100 border-b @if ($detalleCar->estado === 'noSuf') bg-red-100 @endif">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <div></div>
                                    {{ $detalleCar->offer->alimento->name }}
                                    <div>
                                        <form action="/deleteDetail" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="cart_id" value="{{ $detalleCar->id }}">
                                            @if ($detalleCar->estado === 'noSuf')
                                                <span class="font-semibold text-gray-500 text-xs">No
                                                    disponible</span>
                                            @endif
                                            <button
                                                class="font-semibold hover:text-red-500 text-gray-500 text-xs">Eliminar</button>


                                        </form>
                                    </div>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $detalleCar->cant }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    ${{ $detalleCar->offer->price }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    ${{ $detalleCar->cant * $detalleCar->offer->price }}
                                </td>
                            </tr>
                            @php
                                $total = $total + $detalleCar->cant * $detalleCar->offer->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>Total de la factura</td>
                            <td>${{ $total }}</td>
                        </tr>
                    </tbody>




                </table>
                <div class="mt-4 ml-4">
                    <form action="/confirm" method="POST">
                        @csrf
                        @foreach ($carritos as $carrito)
                            <input type="hidden" name="carrito_ids[]" value="{{ $carrito->id }}">
                        @endforeach
                        <x-button :submit="true">Confirmar Pago</x-button>
                    </form>

                    <x-error-client :comp="$comprador->id"></x-error-client>



                </div>
            </div>
        </div>
    </div>
</div>
