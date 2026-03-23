<x-app-layout>
    @include('layouts.sidebar')

    <x-slot name="header">Мои проекты </x-slot>

        <div class="py-12 max-w-7x1 mx-auto">

            @if(session('success'))
                <div class="bg-green-100 p-4 mb-4">{{session('success') }}</div>
            @endif



                    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default max-w-4xl mx-auto">
                        <table class="text-sm text-left rtl:text-right text-body">
                            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Name of Project
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Description of Project
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Edit Project
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Delete Project
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Show Project
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Deadline
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                            <tr class="bg-neutral-primary border-b border-default">
                                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    {{ $project->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $project->description }}
                                </td>
                                <td class="px-6 py-4">
                                <a href="{{route('projects.edit', $project)}}"> Edit </a>
                                </td>
                                <td class="px-6 py-4">
                                <form action="{{route('projects.destroy', $project)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Удалить</button>
                                </form>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('projects.show', $project)}}">Show</a>

                                </td>
                                <td class="px-6 py-4">
                                    {{ $project->deadline }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                   </div>
        </div>

</x-app-layout>
