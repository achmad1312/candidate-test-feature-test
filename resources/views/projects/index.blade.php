<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto space-y-6">
        <div class="flex justify-between items-center">
            <a href="{{ route('projects.create') }}"
               class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                New Project
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($projects as $project)
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-1">
                            {{ $project->name }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            {{ $project->description ?? 'No description provided.' }}
                        </p>
                    </div>

                    <div class="mt-auto flex gap-2 flex-wrap">
                        <a href="{{ route('projects.edit', $project) }}"
                           class="inline-flex items-center text-sm text-blue-600 hover:underline">
                            ✏️ Edit
                        </a>

                        <a href="{{ route('projects.building-parts.index', $project) }}"
                           class="inline-flex items-center text-sm text-green-600 hover:underline ml-2">
                            🧱 Building Parts
                        </a>

                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus?')"
                              class="ml-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-sm text-red-600 hover:underline">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-300 col-span-full text-center">Tidak Ada Data</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
