<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Building Parts for Project: ') . $project->name }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto">
        <a href="{{ route('projects.building-parts.create', $project) }}"
           class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + New Building Part
        </a>

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            @forelse ($buildingParts as $part)
                <div class="mb-4 border-b pb-2">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $part->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $part->description }}</p>
                    <div class="mt-2">
                        <a href="{{ route('projects.building-parts.edit', [$project, $part]) }}"
                           class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('projects.building-parts.destroy', [$project, $part]) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:underline ml-2"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-300">No building parts found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
