@php
    $total = 0; // Inicializa la variable para el total
@endphp
<div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">{{ $vend->name }}</h1>
                <h2 class="font-semibold text-2xl"> Items</h2>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5"> Detalles</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
                    Cantidad</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
                    Precio</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">
                    Total</h3>
            </div>

            @foreach ($carts as $cart)
                @if ($cart->vend_num === $vend->id)
                    <x-item-incart :detalle="$cart" :price="$cart->offer->price" :cant="$cart->cant"
                        :max="$cart->offer->cant"></x-item-incart>
                    @php
                        $total += $cart->offer->price * $cart->cant; // Calcula el total sumando el precio por la cantidad
                    @endphp
                @endif
            @endforeach

            <a href="#" class="flex font-semibold text-indigo-600 text-sm mt-10">

                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Continuar comprando
            </a>
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Resumen</h1>

            <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                <span>Total</span>
                <span>{{ $total }}</span>
            </div>
            <button
                class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Actualizar
                Carrito</button>

        </div>

    </div>
</div>
