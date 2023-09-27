@extends('admin.layouts.main')
@section('content')
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    @if (isset($category))Update Category @else Create Category @endif
</h4>
<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post" class="mt-5">
    @csrf
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <x-input placeholder="Enter Category Name" name="name" type="text" value="{{ old('name', $category->name ?? '') }}" required />
            @if($errors->has('name'))
            <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('name') }}</span>
            @endif
        </label>
        @if(isset($parentId))
        <input type="hidden" name="parent_id" value="{{ $parentId }}">
        @endif
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Description</span>
            <textarea class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" id="description" name="description" value="{{ old('name', $category->description ?? '') }}" class="form-control">@if (isset($category)){{$category->description }}@endif</textarea>
        </label>
        <div class="mt-4">
            <button class="px-4 py-2 bt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save
            </button>
        </div>
    </div>
    </div>
</form>
@endsection