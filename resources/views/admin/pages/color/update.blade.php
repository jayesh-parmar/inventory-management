@include('admin.layouts.main')
        <div class="heading text-center font-bold mt-4  text-2xl  text-gray-800 title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none ">Update Color Name</div>
        <form action="{{route('color.update',$color->id)}}" method="post">
            @csrf
            <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                <input 
                    class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" 
                    spellcheck="false"  
                    value="{{$color->color_name}}" 
                    name="color_name" 
                    type="text"
                />

                @if($errors->has('color_name'))
                <div class="font-bold text-white">{{ $errors->first('color_name') }}</div>
                @endif

                <div class="buttons flex">
                    <div class=" btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto"><a href="{{route('color.index')}}">Cancel</a></div>
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