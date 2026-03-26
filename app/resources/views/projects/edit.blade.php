<x-app-layout>
    <x-slot name="header">Edit Project</x-slot>

    <form class="max-w-sm mx-auto space-y-10" action="{{route ('projects.store') }}" method="POST">
        @csrf

        <div>
            <x-input-label for="name" value="Название" />
            <x-text-input id="name" class="block mt-1 w-full" name="name" type="text" value="{{ old('name', $project->name) }}"/>
            <x-input-error :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="description" value="Описание" />
            <textarea id="message" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" name="description"> {{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            <x-input-label for="deadline" value="Дедлайн" />
            <x-text-input id="deadline" name="deadline" type="date" value="{{ old('deadline', $project->deadline) }}" />
            <x-input-error :messages="$errors->get('deadline')" />
        </div>




        <x-primary-button>
            {{ __('Save Project') }}
        </x-primary-button>
    </form>


</x-app-layout>
