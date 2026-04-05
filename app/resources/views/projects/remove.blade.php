<x-app-layout>

    <x-slot name="header">Мои проекты </x-slot>

        <div class="py-6 max-w-7xl mx-auto">

            @if(session('success'))
                <div class="bg-green-100 p-4 mb-4">{{session('success') }}</div>
            @endif

        </div>

    <div class="max-w-md ml-80 mb-6 p-4 bg-gray-800 rounded-lg border border-gray-700">
        <h1 class="text-2xl font-bold text-white mb-2">{{ $project->name }}</h1>
        <p class="text-gray-400 mb-4">{{ $project->description }}</p>
        <span class="text-sm text-gray-500">📅 Deadline: {{ $project->deadline }}</span>
    </div>

    <div x-data="{  users: [], selectedUserId: null}">
        <div class="max-w-3xl ml-80 mb-4">

        <a
            x-bind:disabled="!selectedUserId"
            x-bind:class="selectedUserId ? '' : 'opacity-50 pointer-events-none'"
            @click="
                fetch('/projects/{{ $project->id }}/remove/' + selectedUserId, {
                method: 'DELETE',
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
            class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>Delete </a>
        </div>
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs max-w-xl ml-80">
            <table class="text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Name of Project
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Description of Project
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($project->members as $member)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            @if($member->pivot->role === 'owner')
                                <span>You can't remove owner</span>
                            @else
                            <input id="default-checkbox" type="checkbox" value="{{$member->id}}" @change="selectedUserId = $event.target.checked ? $event.target.value : null" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="default-checkbox" class="select-none ms-2 text-sm font-medium text-heading"></label>
                            @endif
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ $member->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $member->pivot->role }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>


