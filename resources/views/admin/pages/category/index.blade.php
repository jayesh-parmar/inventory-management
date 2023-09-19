<h1>Categories</h1>
<button><a href="{{route('categories.create')}}">Add New Category</a></button>
<ul class="category-list">
    @foreach ($categories as $category)
    @include('admin.pages.category.subcategory', ['category' => $category])
    @endforeach
</ul>