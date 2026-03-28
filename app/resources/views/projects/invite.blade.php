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
        <div x-data="{ users: [], search: ''}">
            <input
                type="text"
                x-model="search"
                @input.debounce.300ms="
                  fetch('{{route('users.search') }}' + '?search=' + search)
                  .then(response => response.json())
                  .then(response => users = response.results)
                "
                placeholder="Поиск пользователей..."
                class="border rounded px-3 py-2 w-full"
                />

        <ul>
            <template x-for="user in users" :key="user.id">
                <li x-text="user.name + ' - ' + user.email"></li>
            </template>
        </ul>
        </div>
    </div>






</x-app-layout>
