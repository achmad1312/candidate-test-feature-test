<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Building Part for Project: ') . $project->name }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        <form action="{{ route('projects.building-parts.update', [$project, $buildingPart]) }}"
              method="POST"
              class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $buildingPart->name) }}"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none"
                          placeholder="Optional...">{{ old('description', $buildingPart->description) }}</textarea>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit"
                        class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
                    ✅ Update
                </button>
                <a href="{{ route('projects.building-parts.index', $project) }}"
                   class="text-gray-600 dark:text-gray-300 hover:underline">
                    ❌ Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
