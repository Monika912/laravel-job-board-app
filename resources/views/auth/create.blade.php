<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Sign in to your account</h1>
    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <label for="">Email</label>
            </div>
        </form>
    </x-card>
</x-layout>
