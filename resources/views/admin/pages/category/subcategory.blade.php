<li class="category-item">
    <div style="display: flex; align-items: center; background-color: #f0f0f0;">
        <p style="margin-right: 10px;">({{ $category->children->count() }}) </p>
        <h5 style="margin-right: 10px;">{{ $category->name }}</h5>
        <div style="margin-right: 10px;">{{ $category->description }}</div>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning" style="margin-right: 10px;text-decoration: none;">Edit</a>
        <a href="{{route('categories.create')}}" style="margin-right: 10px; text-decoration: none;">Add Category</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            <button type="submit" style="border: none; color: red; background: none; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
        </form>
    </div>
    <hr>
    @if ($category->children->count() > 0)
    <ul class="category-list">
        @foreach ($category->children as $childCategory)
        @include('admin.pages.category.subcategory', ['category' => $childCategory])
        @endforeach
    </ul>
    @endif
</li>