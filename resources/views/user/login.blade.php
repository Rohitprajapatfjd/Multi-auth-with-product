@extends('layout.layout')

@section('title')
User Login
@endsection


@section('contents')
<div class="container mx-auto">
    {{-- @if ($errors->any())
        @foreach ( $errors->all() as $item  )
        {{$item}}
        @endforeach
    @endif --}}
   <div class="flex justify-center items-center h-screen">
    <div class="flex flex-col items-center gap-1">
        <form class="max-w-md mx-auto bg-black/70 shadow-xl p-5 rounded-sm" action="{{route('user.login')}}" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
               
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                @error('email')
                <span class="text-sm text-red-500">{{$message}} </span> 
                 @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
               
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                @error('password')
                <span class="text-sm text-red-500">{{$message}} </span> 
                 @enderror
            </div>
           
            
            
           
            <div class="flex justify-start items-center gap-5">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <a class="underline text-blue-500 text-sm" href="{{route('user.show')}}">Not Register?</a>
            </div>
          </form>
          @if (session('status'))
           <span id="hiddenItem" class="mx-0 bg-sky-400 text-white py-1 px-3 rounded-sm tracking-wider">{{session('status')}}</span>  
           @endif
    </div>
     
   </div>


   
  
</div>
@endsection

@push('script')
    <script>
        let id = document.getElementById('hiddenItem');
        setTimeout(() => {
             id.style.display = 'none'
        }, 5000);
    </script>
@endpush