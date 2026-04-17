<x-app-layout>
    <x-slot name="header">New Task</x-slot>

    <div class="py-8 max-w-xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-8">

            <form class="space-y-5" action="{{ route('projects.tasks.store', $project) }}" method="POST">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" class="block mt-1 w-full" name="name" type="text" value="{{ old('name') }}" placeholder="Task name" />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <div class="col-span-2">
                        <x-input-label for="description" value="Description" />
                        <textarea id="description" rows="3" name="description" placeholder="Describe the task..."
                                  class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm text-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="status" value="Status" />
                        <select name="status" id="status" class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm text-sm p-2">
                            <option value="todo" {{ old('status') == 'todo' ? 'selected' : '' }}>Todo</option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" />
                    </div>

                    <div>
                        <x-input-label for="priority" value="Priority" />
                        <select name="priority" id="priority" class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm text-sm p-2">
                            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                            <option value="critical" {{ old('priority') == 'critical' ? 'selected' : '' }}>Critical</option>
                        </select>
                        <x-input-error :messages="$errors->get('priority')" />
                    </div>

                    <div>
                        <x-input-label for="deadline" value="Deadline" />
                        <x-text-input id="deadline" class="block mt-1 w-full" name="deadline" type="date" value="{{ old('deadline') }}" />
                        <x-input-error :messages="$errors->get('deadline')" />
                    </div>

                    <div>
                        <x-input-label for="assigned_to" value="Assigned to" />
                        <select name="assigned_to" id="assigned_to" class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm text-sm p-2">
                            <option value="">— Not assigned —</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-2">
                    <a href="{{ route('projects.show', $project) }}" class="text-sm text-gray-500 hover:text-gray-700">Cancel</a>
                    <x-primary-button>Create Task</x-primary-button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
