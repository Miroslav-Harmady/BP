<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{ asset('/public/build/assets/app-5005f49e.css') }}">
    <title>Document</title>
</head>
    <nav class="bg-[#ff7900]">
        <div class="">
            <div class="flex justify-between">
                <div class="flex">
                    <div class="m-auto">
                        <a href="/" class="block">
                            <img src="{{ asset('images/logo.png') }}" alt="logo fakulty" class="w-auto h-16">
                        </a>
                    </div>
                    <div class="hidden lg:flex items-center">
                        <a href="/" class="py-4 px-2 text-white {{Route::current()->uri == "/" ? " border-b-4 border-white" : ""}} font-semibold">Domov</a>
                        <a href="/bisekcia" class="py-4 px-2 text-white {{Route::current()->uri == "bisekcia" ? " border-b-4 border-white" : ""}} font-semibold">Bisekcia</a>
                        <a href="/cholesky" class="py-4 px-2 text-white {{Route::current()->uri == "cholesky" ? " border-b-4 border-white" : ""}} font-semibold">Choleskyho rozklad</a>
                        <a href="/integral" class="py-4 px-2 text-white  {{Route::current()->uri == "integral" ? " border-b-4 border-white" : ""}} font-semibold">Numerické riešenie integrálov</a>
                        <a href="/jacobi" class="py-4 px-2 text-white {{Route::current()->uri == "jacobi" ? " border-b-4 border-white" : ""}}  font-semibold">Jacobiho metóda</a>
                        <a href="/LURozklad" class="py-4 px-2 text-white {{Route::current()->uri == "LURozklad" ? " border-b-4 border-white" : ""}}  font-semibold">LU rozklad</a>
                        <a href="/newton" class="py-4 px-2 text-white {{Route::current()->uri == "newton" ? " border-b-4 border-white" : ""}} font-semibold">Newtnova metóda</a>
                        {{-- <a href="/admin/index" class="py-4 px-2 text-white {{Route::current()->uri == "admin/index" ? " border-b-4 border-white" : ""}} font-semibold">Admin</a> --}}
                    </div>
                </div>
                <div class="hidden md:hidden lg:flex items-center space-x-3 pr-2">
                    @if (Auth::user())
                        <span class="py-4 px-2 text-white">{{Auth::user()->name}}</span>
                        
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="py-4 px-2 text-white hover:border-b-4 hover:border-white" >Odhlásiť sa</button>
                        </form>
                    {{-- @else
                        <a href="/login" class="py-4 px-2 text-white hover:border-b-4 hover:border-white">Prihlásiť sa</a> --}}
                    @endif
                </div>
                <div class="lg:hidden flex items-center">
                    <button class="mr-2" id="mobile-menu-button">
                        <svg class=" w-6 h-6 text-white"
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="hidden lg:hidden mt-1" id="mobile-menu">
            <ul>
                <li class="">
                    <a href="/" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white ">
                        Domov
                    </a>
                </li>
                <li class="">
                    <a href="/bisekcia" class="block text-sm px-2 py-4 font-semibold {{Route::current()->uri == "bisekcia" ? "text-[#ff7900] bg-white" : "text-white bg-[#ff7900]"}} hover:text-[#ff7900] hover:bg-white" >
                        Bisekcia
                    </a>
                </li>
                <li class="">
                    <a href="/cholesky" class="block text-sm px-2 py-4 font-semibold {{Route::current()->uri == "cholesky" ? "text-[#ff7900] bg-white" : "text-white bg-[#ff7900]"}} hover:text-[#ff7900] hover:bg-white">
                        Choleskyho rozklad
                    </a>
                </li>
                <li class="">
                    <a href="/integral" class="block text-sm px-2 py-4 font-semibold {{Route::current()->uri == "integral" ? "text-[#ff7900] bg-white" : "text-white bg-[#ff7900]"}} hover:text-[#ff7900] hover:bg-white">
                        Numerické riešenie integrálov
                    </a>
                </li>
                <li class="">
                    <a href="/jacobi" class="block text-sm px-2 py-4 font-semibold {{Route::current()->uri == "jacobi" ? "text-[#ff7900] bg-white" : "text-white bg-[#ff7900]"}} hover:text-[#ff7900] hover:bg-white">
                        Jacobiho metóda
                    </a>
                </li>
                <li class="">
                    <a href="/LURozklad" class="block text-sm px-2 py-4 font-semibold {{Route::current()->uri == "LURozklad" ? "text-[#ff7900] bg-white" : "text-white bg-[#ff7900]"}} hover:text-[#ff7900] hover:bg-white">
                        LU rozklad
                    </a>
                </li>
                <li class="">
                    <a href="/newton" class="block text-sm px-2 py-4 font-semibold {{Route::current()->uri == "newton" ? "text-[#ff7900] bg-white" : "text-white bg-[#ff7900]"}} hover:text-[#ff7900] hover:bg-white">
                        Newtnova metóda
                    </a>
                </li>
                {{-- <li class="">
                    <a href="/admin/index" class="block text-sm px-2 py-4 font-semibold {{Route::current()->uri == "admin/index" ? "text-[#ff7900] bg-white" : "text-white bg-[#ff7900]"}} hover:text-[#ff7900] hover:bg-white">
                        Admin
                    </a>
                </li> --}}
                @if (Auth::user())
                    <li>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="block w-full text-left text-white text-sm px-2 py-4 font-semibold hover:text-[#ff7900] hover:bg-white" >Odhlásiť sa</button>
                        </form>
                    </li>
                @endif
                {{-- @else
                    <li>
                        <a href="/login" class="block text-sm px-2 py-4 font-semibold text-white bg-[#ff7900]  hover:text-[#ff7900] hover:bg-white">Prihlásiť sa</a>
                    </li>        
                @endif
                 --}}
            </ul>
        </div>
        <script>
            const btn = document.getElementById("mobile-menu-button");
            const menu = document.getElementById("mobile-menu");

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        </script>
    </nav>
</html>