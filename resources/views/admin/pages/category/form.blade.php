
@if (isset($category)) <h1>Update Category</h1> @else <h1>Create Category</h1> @endif
<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post" class="mt-5">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
    </div>
    @if($errors->has('name'))
    <div style="color: red;">{{ $errors->first('name') }}</div>
    @endif
    <br>

    <div class="form-group">
        <label for="parent_id">Parent Category</label>
        <select id="parent_id" name="parent_id" class="form-control">
            <option value="">Select Parent Category</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" @if(isset($category)) {{ $category->parent_id == $cat->id ? 'selected' : '' }} @endif>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div><br>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" value="{{ old('name', $category->description ?? '') }}" class="form-control">@if (isset($category)){{$category->description }}@endif</textarea>
    </div><br>
    <button type="submit" class="btn btn-primary">Create</button>
</form>