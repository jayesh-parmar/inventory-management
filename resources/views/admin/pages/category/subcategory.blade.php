<li>
    Name : {{ $category->name }} <br>
    @if ($category->description)
    Description :- {{ $category->description }}
    @endif
    <a href="{{ route('categories.edit', $subcategory->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('categories.destroy', $subcategory->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
    </form>
    @if ($category->children->count() > 0)
    <ul>
        @foreach ($category->children as $subcategory)
        @include('admin.pages.category.subcategory', ['category' => $subcategory])
        @endforeach
    </ul>
    @endif

</li>