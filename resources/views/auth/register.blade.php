@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
         <form action="{{ route('register') }}" method="post">
                @csrf 
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" id="name" name="name" placeholder="your neym" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}"> 
                     @error('name')
                     <div class="text-red-500 text-sm mt-2">  
                       {{ $message }}
                     </div> 
                     @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" placeholder="userneym" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}"> 
                    @error('username')
                    <div class="text-red-500 text-sm mt-2">  
                      {{ $message }}
                    </div> 
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" name="email" placeholder="your imeyıl" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}"> 
                    @error('email')
                    <div class="text-red-500 text-sm mt-2">  
                      {{ $message }}
                    </div> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" placeholder="your pasvırd" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value=""> 
                    @error('password')
                    <div class="text-red-500 text-sm mt-2">  
                      {{ $message }}
                    </div> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password Again</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="repeat your pasvırd" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value=""> 
                    @error('password_confirmation')
                    <div class="text-red-500 text-sm mt-2">  
                      {{ $message }}
                    </div> 
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-red-500 text-white px-4 py-3 rounded font-medium w-full">Recizdır</button> 
                </div>


         </form>
        </div>
    </div>
@endsection