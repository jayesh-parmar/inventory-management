@extends('admin.layouts.main')
@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Update Product
    </h4>
    <form action="{{ route('product.update', $product->id) }}" method="post" class="mt-5">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @include('admin.pages.product.product_add_update')
            <div class="mt-4">
                <button class="px-4 py-2 bt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection