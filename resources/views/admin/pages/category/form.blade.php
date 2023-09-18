<h1> @if (isset($category)) Update @else Add @endif Product</h1>

@if (isset($category))
<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    @else
    <form method="POST" action="{{ route('categories.store') }}">
        @endif
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Category (if applicable)</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="" selected>None</option>
                @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @if (isset($category)) {{ $category->parent_id == $cat->id ? 'selected' : '' }} @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <label for="name">Add description</label>
        <input type="text" name="description" value="{{ old('name', $category->description ?? '') }}" required>
        <br><br>
        <button type=" submit" class="btn btn-primary">Update Category</button>
    </form>