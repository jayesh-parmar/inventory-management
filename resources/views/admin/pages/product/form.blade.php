@extends('admin.layouts.main')
@section('content')
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    @if (isset($product)) Update @else Add @endif Product
</h4>
<form action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" method="post" class="mt-5">
    @csrf
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <x-input placeholder="Enter Product Name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}" required />
            @if($errors->has('name'))
            <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('name') }}</span>
            @endif
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Select Brand</span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="brand_id" required>
                <option value="" disabled selected>Select a Brand</option>
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id', isset($product) ? $product->brand_id : null) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
            @if($errors->has('brand_id'))
            <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('brand_id') }}</span>
            @endif
        </label>
        <label class="block mt-4 text-sm">
            <label for="color" class="text-gray-700 dark:text-gray-400">
                Select Color
            </label>
            <select id="color" name="color_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" disabled selected>Select a Color</option>
                @foreach ($colors as $color)
                <option value="{{ $color->id }}" {{ old('color_id', isset($product) ? $product->color_id : null) == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Select Sizes
            </span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="size_id">
                <option value="" disabled selected>Select a Size</option>
                @foreach ($sizes as $size )
                <option value="{{$size->id }}" {{ old('size_id', isset($product) ? $product->size_id : null) == $size->id ? 'selected' : '' }}>{{$size->name}}</option>
                @endforeach
            </select>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Select Categories
            </span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="category_ids[]" multiple>
                <option value="" disabled>Select Categories</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, old('category_ids', isset($product) ? $product->categories->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </label>
        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Status
            </span>
            <div class="mt-2">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" {{ old('status', isset($product) ? $product->status : null) == '0' ? 'checked' : '' }} class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="0" />
                    <span class="ml-2">Pending</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" {{ old('status', isset($product) ? $product->status : null) == '1' ? 'checked' : '' }} class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="1" />
                    <span class="ml-2">Delivered</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <button class="px-4 py-2 bt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save
            </button>
        </div>
    </div>
</form>
@endsection