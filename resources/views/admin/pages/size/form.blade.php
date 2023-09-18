@extends('admin.layouts.main')
@section('content')
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    @if (isset($size)) Update @else Add @endif size
</h4>
@if (isset($size))
<form action="{{route('size.update',$size->id)}}" method="post">
    @method('PUT')
    @else
    <form action="{{route('size.store')}}" method="post" class="mt-5">
        @endif
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <x-input placeholder="Enter Brand Name" name="name" type="text" value="{{ old('name', $size->name ?? '') }}" required />
                @if($errors->has('name'))
                <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('name') }}</span>
                @endif
            </label>
        </div>
        <div class="mt-4">
            <button class="px-4 py-2 bt-3 text-sm font-medium leading-5 text-white transition-color duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save
            </button>
        </div>
        </div>
    </form>
@endsection