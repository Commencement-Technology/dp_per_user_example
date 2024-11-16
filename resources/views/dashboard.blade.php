<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">Todo List</h3>
                    <ul class="list-disc pl-5">
                        @foreach ($todos as $todo)
                            <li>{{ $todo->title }}</li>
                        @endforeach
                    </ul>
                    <form action="{{ route('todos.store') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="flex items-center">
                            <input type="text" name="title" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="New Task">
                            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
