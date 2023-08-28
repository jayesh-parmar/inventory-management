@include('admin.layouts.main')
<br><br>
<!-- component -->
<div class="heading text-center font-bold text-2xl m-5 text-gray-800 m-4 ">New Brand Add</div>
<style>
    body {
        background: white !important;
    }
</style>

@if (session('success'))
<div class="font-bold">
    {{ session('success') }}
</div>
@endif


    <form action="{{route('store_brand')}}" method="post" class="mt-5">
        @csrf
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" name="brand_name" type="text">
            @if($errors->has('brand_name'))
            <div class="font-bold">{{ $errors->first('brand_name') }}</div>
            @endif

            <div class="buttons flex">
                <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</div>
                <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500"><button>Add</button></div>
            </div>
        </div>
    </form>




<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-2">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Brand Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Brand Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $brand)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $brand->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $brand->brand_name }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a class="btn btn-primary" href="{{route('edit',$brand->id)}}">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                            Edit
                        </button></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>



</div>
</div>
</body>

</html>