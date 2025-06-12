@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold">{{ $project->name }}</h1>
        <p class="mt-2 text-gray-700">{{ $project->description }}</p>
        <a href="{{ route('projects.index') }}" class="text-blue-600 underline mt-4 inline-block">Back to Projects</a>
    </div>
@endsection
