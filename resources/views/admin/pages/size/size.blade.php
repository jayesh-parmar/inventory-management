@include('admin.layouts.main')
        <br><br>
        <div class="heading text-center  font-bold text-2xl m-5 text-white-800 m-4 title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none">New Sizes Add</div>
        <style>
            body {
                background: white !important;
            }
        </style>

        @if (session('success'))
        <div class="font-bold text-white">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{route('store-size')}}" method="post" class="mt-5">
            @csrf
            <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                <input 
                class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" 
                spellcheck="false" 
                placeholder="Title" 
                name="size_name" 
                type="text"
                >

                @if($errors->has('size_name'))
                    <div class="font-bold text-white">{{ $errors->first('size_name') }}</div>
                @endif

                <div class="buttons flex">
                    <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-10  ">Cancel</div>
                    <button>
                        <div class="btn border border-gray-300 p-2 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Add</div>
                    </button>
                </div>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-2">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            size Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            size Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $size)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $size->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $size->size_name }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a class="btn btn-primary" href="{{route('size-edit',$size->id)}}">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                                    Edit
                                </button>
                            </a>
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