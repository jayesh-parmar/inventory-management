    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <x-input placeholder="Enter Product Name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}" required />
        @if($errors->has('name'))
        <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('name') }}</span>
        @endif
    </label>
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Select Brand</span>
        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="brand" required>
            <option value="" disabled selected>Select a Brand</option>
            @foreach ($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
        @if($errors->has('brand'))
        <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('brand') }}</span>
        @endif
    </label>
    <label class="block mt-4 text-sm">
        <label for="color" class="text-gray-700 dark:text-gray-400">
            Select Color
        </label>
        <select id="color" name="color" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="" disabled selected>Select a Color</option>
            @foreach ($colors as $color)
            <option value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </label>
    @if($errors->has('color'))
    <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('color') }}</span>
    @endif
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Select Sizes
        </span>
        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="size">
            <option value="" disabled selected>Select a Size</option>
            @foreach ($sizes as $size )
            <option value="{{$size->id }}">{{$size->name}}</option>
            @endforeach
        </select>
    </label>
    @if($errors->has('size'))
    <span class="text-xs text-red-600 dark:text-red-400">{{ $errors->first('size') }}</span>
    @endif
    <div class="mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Status
        </span>
        <div class="mt-2">
            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                <input type="radio" checked class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="0" />
                <span class="ml-2">Pending</span>
            </label>
            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="1" />
                <span class="ml-2">delivered</span>
            </label>
        </div>
    </div>