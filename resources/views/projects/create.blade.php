<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        <form action="{{ route('projects.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full mt-1 p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Description</label>
                <textarea name="description" rows="4"
                          class="w-full mt-1 p-2 border rounded">{{ old('description') }}</textarea>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
        </form>
    </div>
</x-app-layout>
