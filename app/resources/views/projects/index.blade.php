<x-app-layout>
    <x-slot name="header">Мои проекты </x-slot>

        <div class="py-12 max-w-7x1 mx-auto">

            @if(session('success'))
                <div class="bg-green-100 p-4 mb-4">{{session('success') }}</div>
            @endif

            <a href="{{ route('projects.create') }}" class="btn"> Новый Проект </a>

            @foreach($projects as $project)
                <div class="border p-4 mt-4">
                    <h3>{{ $project->name }}</h3>
                    <p>{{ $project->description }} </p>
                    <a href="{{route('projects.edit', $project)}}"> Редактировать </a>

                <form action="{{route('projects.destroy', $project)}}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
                </div>
            @endforeach
        </div>
</x-app-layout>
