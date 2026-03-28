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

    <div x-data="{ open: false, selectedTaskId: null, projectId: {{ $project->id }} }">
        <button @click="open = !open" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 text-white rounded-md text-xs font-semibold uppercase ml-80 mb-4">
            Actions
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="open" class="z-50 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg max-w-3xl ml-80 mb-4">
            <ul class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                <li>
                    <a href="{{route('projects.tasks.create', $project)}}" >Create Task</a>
                </li>
                <li>
                    <a x-bind:href="selectedTaskId ? '/projects/' + projectId + '/tasks/' + selectedTaskId +'/edit' : '#'"
                       x-bind:class="selectedTaskId ? '' : 'opacity-50 pointer-events-none'" >Edit Task</a>
                </li>
                <li>
                    <a href="{{route('projects.invite', $project)}}">Add User</a>
                </li>
            </ul>
        </div>



        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default max-w-2xl ml-80">
            <table class="text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Name of Task
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Description of Task
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Deadline
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Priority
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            <input id="default-checkbox" type="checkbox" value="{{$task->id}}" @change="selectedTaskId = $event.target.checked ? $event.target.value : null" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="default-checkbox" class="select-none ms-2 text-sm font-medium text-heading"></label>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ $task->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $task->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->deadline }}
                        </td>
                        <td class="px-6 py-4">
                            {{$task->priority }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>



</x-app-layout>
