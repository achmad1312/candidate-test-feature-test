@csrf
<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $project->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $project->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Save</button>
<a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
