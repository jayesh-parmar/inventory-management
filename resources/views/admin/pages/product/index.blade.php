@extends('admin.layouts.main')
@section('content')
<div class="flex justify-between items-center ">
    <div>
        <h4 class="px-5 py-2 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Products
        </h4>
    </div>
    <a href="{{route('product.create')}}">
        <button class="px-5 py-2 bt-0 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Add New Product
        </button>
    </a>
</div>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto  ">
        <table class="w-full border-collapse ">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Brand</th>
                    <th class="px-4 py-3">Color</th>
                    <th class="px-4 py-3">Size</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($products as $product)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        {{ $product->name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $product->brand->name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $product->color ? $product->color->name : '' }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $product->size ? $product->size->name : '' }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @foreach($product->categories as $category)
                        {{ $category->name }}
                        @if (!$loop->last) , @endif
                        @endforeach
                    </td>
                    <td class="px-4 py-3 text-xs">
                        @if ($product->status == 1)
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">delivered</span>
                        @else
                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                            Pending
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <a href="{{route('product.edit',$product->id)}}">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('vendor.pagination.pagination') }}
    </div>
</div>
@endsection