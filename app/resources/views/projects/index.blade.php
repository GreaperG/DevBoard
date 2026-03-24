<x-app-layout>
    <x-slot name="header">My Projects</x-slot>

        <div class="py-12 max-w-7x1 mx-auto">

            @if(session('success'))
                <div class="bg-green-100 p-4 mb-4">{{session('success') }}</div>
            @endif
            <div x-data="{ selectedId: null }">
                <form
                    id="delete-form"
                    x-bind:action="'/projects/' + selectedId"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')
                </form>

              <div class="max-w-3xl ml-80 mb-4">
                  <a
                     x-bind:href="selectedId ? '/projects/' + selectedId + '/edit' : '#'"
                     x-bind:class="selectedId ? '' : 'opacity-50 pointer-events-none'"
                      class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>Edit </a>

                  <a
                      x-bind:href="selectedId ? '/projects/' + selectedId  : '#'"
                      x-bind:class="selectedId ? '' : 'opacity-50 pointer-events-none'"
                      class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>Show </a>

                  <button
                      x-bind:disabled="!selectedId"
                      x-bind:class="selectedId ? '' : 'opacity-50 pointer-events-none'"
                      @click="document.getElementById('delete-form').submit()"
                      class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md text-xs font-semibold uppercase"
                  >Delete</button>

              </div>

                    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default max-w-3xl ml-80">
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
                                    <input id="default-checkbox" type="checkbox" value="{{$project->id}}" @change="selectedId = $event.target.checked ? $event.target.value : null" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                    <label for="default-checkbox" class="select-none ms-2 text-sm font-medium text-heading"></label>
                                </th>
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
                                    <button type="submit">Delete</button>
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
        </div>
</x-app-layout>

