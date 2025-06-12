<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Building Parts for Project: ') . $project->name }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto space-y-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('projects.index') }}"
               class="inline-flex items-center text-sm bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-white px-3 py-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600">
                ← Back to Projects
            </a>

            <a href="{{ route('projects.building-parts.create', $project) }}"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + New Building Part
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            @forelse ($buildingParts as $part)
                <div class="mb-6 border-b pb-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $part->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-1">{{ $part->description }}</p>

                    <div class="mt-4 flex space-x-3">
                        <a href="{{ route('projects.building-parts.edit', [$project, $part]) }}"
                           class="inline-flex items-center text-sm bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('projects.building-parts.destroy', [$project, $part]) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this building part?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-300">No building parts found for this project.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
