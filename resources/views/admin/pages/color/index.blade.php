@extends('admin.layouts.main')
@section('content')
    <div class="flex justify-between items-center ">
        <div>
            <h4 class="px-5 py-2 mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Colors
            </h4>
        </div>
        <a href="{{route('color.create')}}">
            <button class="px-5 py-2 bt-0 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add New Color
            </button>
        </a>
    </div>
    @if(session('success'))
    <div class=" text-white ">
        {{ session('success') }}
    </div>
    @endif
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto  ">
            <table class="w-full border-collapse ">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($colors as $color)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            {{ $color->name }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <a href="{{route('color.edit',$color->id)}}">
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
            {{ $colors->links('vendor.pagination.pagination') }}
        </div>
    </div>
@endsection