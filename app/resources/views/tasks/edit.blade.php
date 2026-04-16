<x-app-layout>
    <x-slot name="header">Edit Task</x-slot>

    <form class="max-w-sm mx-auto space-y-10" action="{{route ('projects.tasks.store', 'project', 'task') }}" method="POST">
        @csrf

        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input id="name" class="block mt-1 w-full" name="name" type="text" value="{{ old('name', $task->name) }}"/>
            <x-input-error :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="description" value="Description" />
            <textarea id="message" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" name="description"> {{ old('description') }}</textarea>
        </div>

        <div>
            <x-input-label for="deadline" value="Deadline" />
            <x-text-input id="deadline" name="deadline" type="date" value="{{ old('deadline', $task->deadline) }}" />
            <x-input-error :messages="$errors->get('deadline')" />
        </div>

        <div>
            <x-input-label for="status" value="Status" />
            <select name="status" id="status" class="border-gray-300 rounded-md shadow-sm w-full">
                <option value="todo" {{ old('status', $task->status) == 'todo' ? 'selected' : '' }}>Todo</option>
                <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Done</option>
            </select>
            <x-input-error :messages="$errors->get('status')"/>
        </div>

        <div>
            <x-input-label for="assigned_to" value="Assigned_to" />
            <select name="assigned_to" id="assigned_to" class="border-gray-300 rounded-md shadow-sm w-full">
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ old('assigned_to', $task->assigned_to) == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>

        </div>

        <div>
            <x-input-label for="priority" value="Priority" />
            <select name="priority" id="priority" class="border-gray-300 rounded-md shadow-sm w-full">
                <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                <option value="critical" {{ old('priority', $task->priority) == 'critical' ? 'selected' : '' }}>Critical</option>
            </select>
            <x-input-error :messages="$errors->get('priority')"/>
        </div>




        <x-primary-button>
            {{ __('Save Task') }}
        </x-primary-button>
    </form>


</x-app-layout>
