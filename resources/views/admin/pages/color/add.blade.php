@include('admin.layouts.main')
        <div class="heading text-center  font-bold text-2xl m-5 mt-4  text-white-800 m-4 title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none">New Colors Add</div>
        <form action="{{route('color.store')}}" method="post" class="mt-5">
            @csrf
            <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                <input 
                    class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" 
                    spellcheck="false" 
                    placeholder="Enter Color Name" 
                    name="color_name" 
                    type="text" 
                />

                @if($errors->has('color_name'))
                <div class="font-bold text-white">{{ $errors->first('color_name') }}</div>
                @endif

                <div class="buttons flex">
                    <a class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-10" href="{{route('color.index')}} ">Cancel</a>
                    <button>
                        <div class="btn border border-gray-300 p-2 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">
                            Add
                        </div>
                    </button>
                </div>
            </div>
        </form>
     </div>
   </div>
 </body>
</html>