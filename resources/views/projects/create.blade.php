<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-md">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Project Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name') }}"
                           class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Description
                    </label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('projects.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700">
                        ← Batal
                    </a>

                    <button type="submit"
                            class="inline-flex items-center bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        💾 Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
