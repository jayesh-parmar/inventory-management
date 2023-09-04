@include('admin.layouts.main')
        <a class="btn btn-primary" href="{{route('color.add')}}">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                Add New Colors
            </button>
        </a>
        @if (session('success'))
        <div class="font-bold text-white">
            {{ session('success') }}
        </div>
        @endif
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-2">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Color Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colors as $color)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $color->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $color->color_name }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a class="btn btn-primary" href="{{route('color.edit',$color->id)}}">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                                    Edit
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $colors->links()}}
       </div>
     </div>
   </div>
  </body>
</html>