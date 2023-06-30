@extends('layouts.app')

@section('title')
  {{$post->title}}
@endsection

@section('content')
   <div class="container mx-auto flex p-5">
      <div class="md:w-1/2 max-w-[300px]">
        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post Image {{$post->title}}">

        <div class="p-3">
            <p>0 Likes</p>
        </div>

        <div>
            <p class="font-bold"> {{$post->user->username}}</p>
            <p class="text-sm text-gray-500">
                {{$post->created_at-> diffForHumans()}}
            </p>
            <p class="mt-5">
                {{$post->description}}
            </p>
        </div>
      </div>

      <div class="md:w-1/2">
         
      </div>
   </div>
@endsection