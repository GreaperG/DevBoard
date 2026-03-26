<x-app-layout>
    @include('layouts.sidebar')

    <x-slot name="header">Мои проекты </x-slot>

        <div class="py-12 max-w-7xl mx-auto">

            @if(session('success'))
                <div class="bg-green-100 p-4 mb-4">{{session('success') }}</div>
            @endif
                                   <h1> {{ $project->name }}</h1>

                                   <h2> {{ $project->description }}</h2>

                                   <h2>{{ $project->deadline }}</h2>

        </div>
    <div class="max-w-3xl ml-80 mb-4">
    <a
        href="{{route('projects.tasks.create', $project)}}"
        class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md text-xs font-semibold uppercase"
    >Add Task</a>
    </div>


        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default max-w-3xl ml-80">
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
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            <input id="default-checkbox" type="checkbox" value="{{$task->id}}" @change="selectedId = $event.target.checked ? $event.target.value : null" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>





</x-app-layout>
