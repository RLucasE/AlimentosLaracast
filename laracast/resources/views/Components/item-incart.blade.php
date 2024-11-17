<div class="flex items-center  -mx-8 px-6 py-5 {{ $detalle->estado == 'noSuf' ? 'bg-red-100' : 'hover:bg-gray-100' }}">
    <div class="flex w-2/5"> <!-- product -->
        <div class="w-20">
            <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="">
        </div>
        <div class="flex flex-col justify-between ml-4 flex-grow">
            <span class="font-bold text-sm">{{ $detalle->offer->alimento->name }}</span>
            <form action="/deleteDetail" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="cart_id" value="{{ $detalle->id }}">
                @if ($detalle->estado === 'noSuf')
                    <span class="font-semibold hover:text-red-500 text-gray-500 text-xs">No disponible</span>
                @endif
                <button class="font-semibold hover:text-red-500 text-gray-500 text-xs">Eliminar</button>


            </form>

        </div>
    </div>
    <div class="flex justify-center w-1/5">
        <select id="cant_offer" name="cant_offer" @disabled($detalle->estado === 'noSuf')
            class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
            @for ($i = 1; $i <= $max; $i++)
                <option value="{{ $i }}" @if ($i == $cant) selected @endif>
                    {{ $i }}</option>
            @endfor
        </select>
    </div>


    {{-- <div class="flex justify-center w-1/5">
        <input class="mx-2 border text-center w-8" type="text" value="{{ $detalle->cant }}">
    </div> --}}
    <span class="text-center w-1/5 font-semibold text-sm">${{ $price }}</span>
    <span class="text-center w-1/5 font-semibold text-sm">${{ $price * $cant }}</span>
</div>
