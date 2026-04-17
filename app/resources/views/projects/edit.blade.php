<x-app-layout>
    <x-slot name="header">Edit Project</x-slot>

    <div class="py-8 max-w-xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-8">

            <form class="space-y-6" action="{{ route('projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="name" value="Название" />
                    <x-text-input id="name" class="block mt-1 w-full" name="name" type="text" value="{{ old('name', $project->name) }}" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="description" value="Описание" />
                    <textarea id="description" rows="4" name="description"
                              class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm text-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $project->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div>
                    <x-input-label for="deadline" value="Дедлайн" />
                    <x-text-input id="deadline" class="block mt-1 w-full" name="deadline" type="date" value="{{ old('deadline', $project->deadline) }}" />
                    <x-input-error :messages="$errors->get('deadline')" />
                </div>

                <div class="flex items-center justify-end gap-4 pt-2">
                    <a href="{{ route('projects.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Отмена</a>
                    <x-primary-button>Сохранить</x-primary-button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
