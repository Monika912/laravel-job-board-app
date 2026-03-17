<x-layout>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>

            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>

            </div>

        </x-card>

    @endforeach
</x-layoutx-layout>
