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
    <div x-data="{ users: [], search: '', selectedUserId: null}">
    <div class="max-w-3xl ml-80 mb-4">
        <a
            x-bind:disabled="!selectedUserId"
            x-bind:class="selectedUserId ? '' : 'opacity-50 pointer-events-none'"
            @click="
                fetch('/projects/{{ $project->id }}/invite/' + selectedUserId, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) alert('User Added')
            })
            "
            class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>Add </a>

            <input
                type="text"
                x-model="search"
                @input.debounce.300ms="
                  fetch('{{route('users.search') }}' + '?search=' + search + '&project_id={{ $project->id }}')
                  .then(response => response.json())
                  .then(response => users = response.results)
                "
                placeholder="Поиск пользователей..."
                class="border rounded px-3 py-2 w-full"
                />
        <ul>
            <template x-for="user in users" :key="user.id">
                <li
                    x-text="user.name + ' - ' + user.email"
                    @click="selectedUserId = user.id"
                    :class="selectedUserId == user.id ? 'bg-blue-500 text-white cursor-pointer' : 'cursor-pointer'"
                ></li>
            </template>
        </ul>
        </div>
    </div>

</x-app-layout>
