@include('admin.layouts.main')


<!-- component -->
<div class="heading text-center font-bold text-2xl m-5 text-gray-800 title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none ">Update Brand Name</div>
<style>
    body {
        background: white !important;
    }
</style>
<form action="{{route('update_brand',$data->id)}}" method="post">
    @csrf
    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" value="{{$data->brand_name}}" name="brand_name" type="text">
        @if($errors->has('brand_name'))
        <div class="font-bold text-white">{{ $errors->first('brand_name') }}</div>
        @endif

        <div class="buttons flex">
            <div class=" btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto"><a href="{{route('brands')}}">Cancel</a></div>
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