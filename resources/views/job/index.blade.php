<x-layout>
    @php
        $links = [
            'Jobs' => route('jobs.index'),
        ];
    @endphp

    <x-breadcrumbs :links="$links" class="mb-4" />
    <x-card class="mb-4 text-sm">
        <form id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" form-id="filtering-form"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" form-id="filtering-form" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" form-id="filtering-form" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>

                    <x-radio-group name="experience" :options="array_combine(array_map('ucfirst',\App\Models\Job::$experience) , \App\Models\Job::$experience)" />

                    {{-- <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value=""
                        @checked(!request('experience'))/>
                        <span class="ml-2">All</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="entry"
                        @checked('entry' === request('experience'))/>
                        <span class="ml-2">Entry</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="intermediate"
                        @checked('intermediate' === request('experience'))/>
                        <span class="ml-2">Intermediate</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="senior"
                        @checked('senior' === request('experience'))/>
                        <span class="ml-2">Senior</span>
                    </label> --}}
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>

                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>

            </div>
            <button class="w-full">Filter</button>
        </form>
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
