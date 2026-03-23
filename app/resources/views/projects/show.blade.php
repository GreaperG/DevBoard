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


</x-app-layout>
