@include('admin.layouts.main')
        <div class="heading text-center font-bold text-2xl m-5 mt-4 text-gray-800 title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none ">Update Size Name</div>
        <style>
            body {
                background: white !important;
            }
        </style>
        <form action="{{route('update-size',$data->id)}}" method="post">
           @csrf
            <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                <input 
                
                    class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" 
                    spellcheck="false"  
                    value="{{$data->size_name}}" 
                    name="size_name" 
                    type="text"
                />

                @if($errors->has('size_name'))
                    <div class="font-bold text-white">{{ $errors->first('size_name') }}</div>
                @endif

                <div class="buttons flex">
                    <div class=" btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto"><a href="{{route('size')}}">Cancel</a></div>
                    <button>
                        <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Update</div>
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </body>
</html>