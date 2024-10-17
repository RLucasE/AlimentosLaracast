<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2>{{ $job['title'] }}</h2>
    <h3>This job pays {{ $job['salary'] }}</h3>
</x-layout>
