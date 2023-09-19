<h1>Create Category</h1>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div><br>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div><br>

    <div class="form-group">
        <label for="parent_id">Parent Category</label>
        <select id="parent_id" name="parent_id" class="form-control">
            <option value="">Select Parent Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div><br>

    <button type="submit" class="btn btn-primary">Create</button>
</form>