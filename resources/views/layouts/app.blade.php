<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
       
    </head>
    <body class="bg-gray-100">
     <header class="p-5 border-b bg-white shadow">
        <div class=" container mx-auto flex justify-between items-center">
           <h1 class=" text-3xl font-black">
            Devstagram
        </h1>  

        {{-- @if (auth()->user())
            <p>Autenticado</p>
        @else 
            <p>No Autenticado</p>

        @endif     --}}

        @auth
          <nav class="flex gap-2 items-center">  
            <a class="font-bold  text-gray-600 text-sm" href="#">
                Hello: 
                <span class="font-normal lo">
                    {{auth()->user()->username}}
                </span>
            </a>  
            
            <form method="POST" action="{{ route('logout') }}">
             @csrf             
              <button type="submit" class="font-bold uppercase text-gray-600 text-sm" >Logout</button>
            </form>
           
          </nav>
        @endauth

        @guest
          <nav class="flex gap-2 items-center">
             <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
             <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Sign up</a>
          </nav>
        @endguest
        
        </div>
       
     </header>

     <main class="container mx-auto mt-10">
      <h2 class=" font-black text-center text-3xl mb-10">@yield('title')</h2>
      @yield('content')
     </main>

     <footer class="text-center uppercase p-5 font-bold text-gray-500">
        Devstagram - All rights reserved {{now()-> year}}
     </footer>

    </body>
</html>