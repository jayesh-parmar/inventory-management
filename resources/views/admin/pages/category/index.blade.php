<h3>Category List</h3>

@if(session('success'))
<div>
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div style="color: red;">
    {{ session('error') }}
</div>
@endif

<ul class="category-list">
    @foreach ($categories as $category)
    @include('admin.pages.category.subcategory', ['category' => $category])
    @endforeach
</ul>