<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Building Part for Project: ') . $project->name }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        <form action="{{ route('projects.building-parts.update', [$project, $buildingPart]) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow-sm space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="name" class="w-full rounded p-2" value="{{ old('name', $buildingPart->name) }}" required>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-200">Description</label>
                <textarea name="description" class="w-full rounded p-2">{{ old('description', $buildingPart->description) }}</textarea>
            </div>

            <div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
                <a href="{{ route('projects.building-parts.index', $project) }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
