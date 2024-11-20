<tr class="bg-gray-100 border-b">
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        {{ $adress->user->name }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        {{ $adress->ciudad }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        {{ $adress->cod_post }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        {{ $adress->calle }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        {{ $adress->numero }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        {{ $adress->piso }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        <span
            class="{{ $adress->estado === 'Rev' ? 'text-red-500' : ($adress->estado === 'Apr' ? 'text-green-500' : '') }}">
            {{ $adress->estado }}
        </span>
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        <div class="flex space-x-4">
            <div>
                <x-button href='/foods/create'>Editar</x-button>
            </div>
            <div>
                <form action="/changeStatusAdress" method="POST">
                    @csrf
                    @method('patch')

                    <input type="hidden" name="adress_id" value="{{ $adress->id }}">
                    <x-button :submit="true">
                        @if ($adress->estado === 'Rev')
                            Apr
                        @else
                            Rev
                        @endif
                    </x-button>
                </form>
            </div>
        </div>
    </td>
</tr>
