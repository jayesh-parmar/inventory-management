<li class="category-item">
    {{ $category->name }}

    @if ($category->children->count() > 0)
    <ul class="category-list">
        @foreach ($category->children as $childCategory)
        @include('admin.pages.category.subcategory', ['category' => $childCategory])
        @endforeach
    </ul>
    @endif
</li>