<h1>Categories</h1>
<ul>
    @foreach ($categories as $category)
    <li>
        {{ $category->name }} <br>
        @if ($category->description)
        Description :- {{ $category->description }}
        @endif
        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category $subcategory?')">Delete</button>
        </form>
        @if ($category->children->count() > 0)
        <ul>
            @foreach ($category->children as $subcategory)
            @include('admin.pages.category.subcategory', ['category' => $subcategory])
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>
<a href="{{route('categories.create')}}">add</a>