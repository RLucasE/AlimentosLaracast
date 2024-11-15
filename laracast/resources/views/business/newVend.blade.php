<x-layout>
    <x-slot:heading>
        Registrar tu negocio
    </x-slot:heading>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/newVend" method="POST">
            @csrf
            <div>
                <label for="Ciudad" class="block text-sm/6 font-medium text-gray-900">Ciudad</label>
                <div class="mt-2">
                    <input id="Ciudad" name="Ciudad" type="text" autocomplete="Ciudad" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <label for="cod_post" class="block text-sm/6 font-medium text-gray-900">Codigo Postal</label>
                <div class="mt-2">
                    <input id="cod_post" name="cod_post" type="number" autocomplete="cod_post" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <label for="calle" class="block text-sm/6 font-medium text-gray-900">Calle</label>
                <div class="mt-2">
                    <input id="calle" name="calle" type="text" autocomplete="calle" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <label for="numero" class="block text-sm/6 font-medium text-gray-900">Numero</label>
                <div class="mt-2">
                    <input id="numero" name="numero" type="number" autocomplete="numero" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <label for="piso" class="block text-sm/6 font-medium text-gray-900">Piso</label>
                <div class="mt-2">
                    <input id="piso" name="piso" type="number" autocomplete="piso" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enviar
                    Peticion</button>
            </div>

            <x-errors-form :errors="$errors"></x-errors-form>
        </form>


    </div>
</x-layout>
