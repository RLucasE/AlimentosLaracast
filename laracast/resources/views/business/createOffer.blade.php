<x-layout>
    <x-slot:heading>
        <div class="flex space-x-4">

        </div>
    </x-slot:heading>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/createOffer" method="POST">
            @csrf
            <div>
                <label for="alimento-offer" class="block text-sm/6 font-medium text-gray-900">Alimento</label>
                <div class="mt-2">
                    <select id="alimento-offer" name="alimento-offer"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
                        @foreach ($alimentos as $alimento)
                            <option value="{{ $alimento->id }}">{{ $alimento->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="price-offer" class="block text-sm/6 font-medium text-gray-900">Precio</label>
                <div class="mt-2">
                    <input id="price-offer" name="price-offer" type="number" autocomplete="price-offer" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <label for="cant-offer" class="block text-sm/6 font-medium text-gray-900">Cantidad</label>
                <div class="mt-2">
                    <input id="cant-offer" name="cant-offer" type="number" autocomplete="cant-offer" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>


            <div>
                <label for="OfferDescription" class="block text-sm/6 font-medium text-gray-900">Descripcion</label>
                <div class="mt-2">
                    <input id="OfferDescription" name="OfferDescription" type="text" autocomplete="OfferDescription"
                        required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>




            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Crear
                    Oferta</button>
            </div>

            <x-errors-form :errors="$errors"></x-errors-form>
        </form>
    </div>


</x-layout>
