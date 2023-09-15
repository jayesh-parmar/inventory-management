<h1>Create Category</h1>
<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <label for="name">Category Name</label>
    <input type="text" name="name" id="name" required><br><br>
    <label for="parent_id">Parent Category (if applicable)</label>
    <select name="parent_id" id="parent_id">
        <option value="" selected>None</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br><br>
    <label for="name">Add description</label>
    <input type="text" name="description" id="name" required>
    <br><br>
    <button type="submit">Create Category</button>
</form>