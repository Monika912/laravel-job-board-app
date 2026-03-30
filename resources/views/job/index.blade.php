<x-layout>
    @php
        $links = [
            'Jobs' => route('jobs.index'),
        ];
    @endphp

    <x-breadcrumbs :links="$links" class="mb-4" />
    <x-card class="mb-4 text-sm">
        <div class="mb-4 grid grid-cols-2 gap-4">

        </div>
    </x-card>
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
