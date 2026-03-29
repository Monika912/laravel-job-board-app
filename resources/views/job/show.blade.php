<x-layout>
    <nav class="mb-4">
        <ul class="flex space-x-4 text-slate-500">
            <li>
                <a href="/">Home</a>
            </li>
            <li>-></li>
            <li>
                <a href="{{ route('jobs.index') }}">Jobs</a>
            </li>
            <li>-></li>
            <li>{{ $job->title }}</li>
        </ul>
    </nav>
    <x-job-card :$job />
</x-layoutx>
