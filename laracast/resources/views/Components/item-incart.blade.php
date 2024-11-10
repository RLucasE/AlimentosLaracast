
<div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
    <div class="flex w-2/5"> <!-- product -->
        <div class="w-20">
            <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="">
        </div>
        <div class="flex flex-col justify-between ml-4 flex-grow">
            <span class="font-bold text-sm">{{{$detalle->offer->alimento->name}}}</span>
            <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Eliminar</a>
        </div> 
    </div>
    <div class="flex justify-center w-1/5">
        <input class="mx-2 border text-center w-8" type="text" value="{{$detalle->cant}}">
    </div>
    <span class="text-center w-1/5 font-semibold text-sm">${{$price}}</span>
    <span class="text-center w-1/5 font-semibold text-sm">${{$price*$cant}}</span>
</div>
