<x-layout>
    @php
        $links = [
            'Jobs' => route('jobs.index'),
            $job->title => '#',
        ];
    @endphp

    <x-breadcrumbs :links="$links" class="mb-4" />

    <x-job-card :$job />
</x-layout>
