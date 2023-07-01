@extends('layouts.app')

@section('title')
  {{$post->title}}
@endsection

@section('content')
   <div class="container mx-auto md:flex p-5">
      <div class="md:w-1/2">
        <img class="" src="{{ asset('uploads') . '/' . $post->image }}" alt="Post Image {{$post->title}}">

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

      <div class="md:w-1/2 p-5">
        @auth
             <div class="shadow bg-white p-5 mb-5">
            <p class="text-xl font-bold text-center mb-4">
                Add New Comment
            </p>
            @if (session('msg'))
                <div class="bg-green-500 p-1 rounded-lg mb-6 text-white uppercase font-bold text-xs text-center">{{session('msg')}}</div>
            @endif

            <form action="{{route('comments.store',['post'=>$post, 'user'=>$user])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">Add a New Comment</label>
                    <textarea                
                     id="comment"
                     name="comment"
                     placeholder="Add you comment"
                     class="border p-2 w-full rounded-lg @error('name') border-red-500   
                     @enderror"
                     
                    ></textarea>
                    @error('comment')
                        <p class=" bg-red-500 text-white my-1 rounded-lg text-xs p-1 text-center">{{$message}}</p>
                    @enderror
                </div>
    
                <input
                type="submit"
                value="Add Comment"
                class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase rounded-lg w-full p-3 font-bold text-white"
                />
             </form>
         </div>
        @endauth
        
        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
            @if ($post->comments->count())
                @foreach ($post->comments as $comment )
                    <div class="p-5 border-gray-300 border-b">
                        <a href="{{ route('post.index',$comment->user) }}" class="font-bold">
                            {{$comment->user->username}}
                        </a>
                        <p>{{$comment->comment}}</p>
                        <p class="text-sm text-gray-500">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                @endforeach
            @else
            <p class="p-10 text-center">There is not comments yet</p>
            @endif
        </div>

       
      </div>
   </div>
@endsection