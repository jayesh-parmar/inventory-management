<li class="category-item">
    <h3> {{ $category->name }}</h3>
    {{ $category->description }}
    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
    </form>
    @if ($category->children->count() > 0)
    <ul class="category-list">
        @foreach ($category->children as $childCategory)
        @include('admin.pages.category.subcategory', ['category' => $childCategory])
        @endforeach
    </ul>
    @endif
</li>