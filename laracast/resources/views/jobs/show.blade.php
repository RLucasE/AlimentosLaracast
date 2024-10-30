<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2>{{ $job['title'] }}</h2>
    <h3>This job pays {{ $job['salary'] }}</h3>
    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Editar</x-button>
    </p>
</x-layout>
