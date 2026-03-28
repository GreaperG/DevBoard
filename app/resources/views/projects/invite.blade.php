<x-app-layout>

    <x-slot name="header">Мои проекты </x-slot>

        <div class="py-12 max-w-7xl mx-auto">

            @if(session('success'))
                <div class="bg-green-100 p-4 mb-4">{{session('success') }}</div>
            @endif
                                   <h1> Name: {{ $project->name }}</h1>

                                   <h2> Description: {{ $project->description }}</h2>

                                   <h2>Deadline: {{ $project->deadline }}</h2>

        </div>


    <div class="max-w-3xl ml-80 mb-4">
        <label class="input validator">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2.5"
                    fill="none"
                    stroke="currentColor"
                >
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </g>
            </svg>
            <input
                type="text"
                required
                placeholder="Username"
                pattern="[A-Za-z][A-Za-z0-9\-]*"
                minlength="3"
                maxlength="30"
                title="Only letters, numbers or dash"
            />
        </label>
        <p class="validator-hint">
            Must be 3 to 30 characters
            <br />containing only letters, numbers or dash
        </p>
    </div>






</x-app-layout>
