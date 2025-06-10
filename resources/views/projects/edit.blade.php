<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        <form action="{{ route('projects.update', $project) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="name" value="{{ old('name', $project->name) }}"
                       class="w-full mt-1 p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Description</label>
                <textarea name="description" rows="4"
                          class="w-full mt-1 p-2 border rounded">{{ old('description', $project->description) }}</textarea>
            </div>

            <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        </form>
    </div>
</x-app-layout>
