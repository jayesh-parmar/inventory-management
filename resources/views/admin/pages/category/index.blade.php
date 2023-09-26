@extends('admin.layouts.main')
@section('content')
<div class="flex justify-between items-center ">
    <div>
        <h4 class="px-5 py-2 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Category List
        </h4>
    </div>
    <a href="{{ route('categories.create') }}">
        <button class="px-5 py-2 bt-0 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Add Category
        </button>
    </a>
</div>
<ul class="category-list">
    @foreach ($categories as $category)
    @include('admin.pages.category.subcategory', ['category' => $category])
    @endforeach
</ul>
@endsection