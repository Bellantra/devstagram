@extends('layouts.app')

@section('title')
Pagina Principal
@endsection

@section('content')
   @if($posts->count())
      <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
       @foreach ( $posts as $post )
         <div>
            <a href="{{ route('posts.show',['post'=>$post , 'user'=>$post->user]) }}">
               <img src="{{ asset('uploads') . '/' . $post->image}}" alt="post image {{$post->title}}">
            </a>
         </div>      
        @endforeach  
      </div>
       <div class="my-10 mx-20">
         {{$posts->links('pagination::tailwind')}}
       </div>

       
    @else 
       <p>No hay posts</p>
    @endif
     
    {{-- Otra forma de hacer lo de arriba --}}
    {{-- @forelse ($posts as $post )
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>No hay posts</p>
    @endforelse --}}
@endsection