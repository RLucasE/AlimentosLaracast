<x-layout>
    <x-slot:heading>
        Reservar el producto
    </x-slot:heading>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div x-data="{ image: 1 }" x-cloak>
                    <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                        <div x-show="image === 1"
                            class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <img class=" rounded-2xl w-full object-cover"
                                src="https://images.pexels.com/photos/264636/pexels-photo-264636.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                        </div>
                    </div>

                    <div class="flex -mx-2 mb-4">
                        <template x-for="i in 4">
                            <div class="flex-1 px-2">
                                <button x-on:click="image = i"
                                    :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }"
                                    class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                    <span x-text="i" class="text-2xl"></span>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                    {{ $offer->alimento->name }}
                </h2>
                <p class="text-gray-500 text-sm">By <a href="#"
                        class="text-indigo-600 hover:underline">{{ $offer->user->name }}</a></p>

                <div class="flex items-center space-x-4 my-4">
                    <div>
                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                            <span class="text-indigo-400 mr-1 mt-1">$</span>
                            <span class="font-bold text-indigo-600 text-3xl">{{ $offer->price }}</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-green-500 text-xl font-semibold">Ahorra un 12%</p>
                    </div>
                </div>

                <p class="text-gray-500">
                    {{ $offer->description }}
                </p>
                @can('isVend', Auth::user())
                    <form action="#">
                        @csrf <!-- Agregar token CSRF -->
                        <div class="flex py-4 space-x-4">
                            {{-- Falta validar que no hayan cambiado el id --}}
                            <input type="hidden" name="vend_num" value="{{ $offer->user_num }}">
                            <button type="submit"
                                class="h-14 px-6 py-2 font-semibold rounded-xl bg-red-400 hover:bg-red-500 text-white">
                                Quitar Oferta
                            </button>
                        </div>
                    </form>
                @endcan

                @can('isCom', Auth::user())
                    <form action="/offers/{{ $offer->id }}/addoffercart" method="POST">
                        @csrf <!-- Agregar token CSRF -->
                        <div class="flex py-4 space-x-4">
                            <div class="relative">
                                <label for="cant_offer"
                                    class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Cant</label>
                                <select id="cant_offer" name="cant_offer"
                                    class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                                    @for ($i = 1; $i <= $offer->cant; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                                <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>

                            {{-- Falta validar que no hayan cambiado el id --}}
                            <input type="hidden" name="vend_num" value="{{ $offer->user_num }}">


                            <button type="submit"
                                class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                                Agregar al carro
                            </button>
                        </div>
                    </form>
                @endcan


            </div>
        </div>
    </div>

</x-layout>
