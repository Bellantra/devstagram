@extends('layouts.app')

@section('title')
  Edit profile: {{auth()->user()->username}}
@endsection

@section('content')
   
   <div class="md:flex md:justify-center">
      <div class="md:w-1/2 bg-white shadow p-6">
        <form 
        class="mt-10 md:mt-0"
        enctype="multipart/form-data"
        method="POST"
        action="{{ route('profile.store') }}">
        @csrf
        
        <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
            <input
             type="text"
             id="username"
             name="username"
             placeholder="Jhon"
             class="border p-2 w-full rounded-lg @error('username') border-red-500   
             @enderror"
             value="{{auth()->user()->username}}"
            />
            @error('username')
                <p class=" bg-red-500 text-white my-1 rounded-lg text-xs p-1 text-center">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">Profile Image</label>
            <input
             type="file"
             id="image"
             name="image"           
             class="border p-2 w-full rounded-lg"           
             value=""
             accept=".jpg,.jpeg,.png,.gif"
            />      
           
        </div>

        <input
        type="submit"
        value="Edit"
        class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase rounded-lg w-full p-3 font-bold text-white"
        />

        </form>
      </div>
   </div>
       
@endsection