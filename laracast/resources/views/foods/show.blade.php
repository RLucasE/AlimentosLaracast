<x-layout>
    <x-slot:heading>
        Editar o eliminar
    </x-slot:heading>
    <h2>{{ $food['name'] }}</h2>
    <h3>Categoria: {{ $food->AlimentoType->name }}</h3>
    <h3>Estado: {{ $food->AlimentoState->description }}</h3>
    <x-button href="/foods/{{ $food['id'] }}/edit">Editar</x-button>
    {{-- <p class="mt-6">
        <x-button href="/foods/{{ $job->id }}/edit">Editar</x-button>
    </p> --}}
</x-layout>
