<x-layout>
    <x-slot:heading>
        Jobs page
    </x-slot:heading>
    <ul>
        <div class="space-y-4">
            @foreach ($jobs as $job)
                <a href="/jobs/{{ $job['id'] }}"
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            {{ $job['title'] }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pays {{ $job['salary'] }} per year
                            by {{ $job->employer->name }}
                        </p>
                    </div>
                </a>
            @endforeach
            <div>
                {{ $jobs->links() }}
            </div>
        </div>
    </ul>

</x-layout>
