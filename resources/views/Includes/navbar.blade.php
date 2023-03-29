<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
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
                        <a href="/bisekcia" class="py-4 px-2 text-white {{Route::current()->uri == "bisekcia" ? " border-b-4 border-white" : ""}} font-semibold">Bisekcia</a>
                        <a href="/cholesky" class="py-4 px-2 text-white {{Route::current()->uri == "cholesky" ? " border-b-4 border-white" : ""}} font-semibold">Cholesky</a>
                        <a href="/integral" class="py-4 px-2 text-white  {{Route::current()->uri == "integral" ? " border-b-4 border-white" : ""}} font-semibold">N-C Kvadratúrne vzorce</a>
                        <a href="/jacobi" class="py-4 px-2 text-white {{Route::current()->uri == "jacobi" ? " border-b-4 border-white" : ""}}  font-semibold">Jacobiho metóda</a>
                        <a href="/LURozklad" class="py-4 px-2 text-white {{Route::current()->uri == "LURozklad" ? " border-b-4 border-white" : ""}}  font-semibold">LU rozklad</a>
                        <a href="/newton" class="py-4 px-2 text-white {{Route::current()->uri == "newton" ? " border-b-4 border-white" : ""}} font-semibold">Newtnova metóda</a>
                    </div>
                </div>
                <div class="hidden md:hidden lg:flex items-center space-x-3">
                    <a href="" class="py-4 px-2 text-white">Prihlásiť sa</a>
                    {{-- tu mozno ze if prihlaseny tak moznost logout --}}
                </div>
                <div class="lg:hidden flex items-center">
                    <button class="" id="mobile-menu-button">
                        <svg class=" w-6 h-6 text-white hover:text-green-500 "
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
                    <a href="" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white">
                        Domov
                    </a>
                </li>
                <li class="">
                    <a href="" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white">
                        Bisekcia
                    </a>
                </li>
                <li class="">
                    <a href="" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white">
                        Cholesky
                    </a>
                </li>
                <li class="">
                    <a href="" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white">
                        N-C kvadratúrne vzorce
                    </a>
                </li>
                <li class="">
                    <a href="" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white">
                        Jacobiho metóda
                    </a>
                </li>
                <li class="">
                    <a href="" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white">
                        LU rozklad
                    </a>
                </li>
                <li class="">
                    <a href="" class="block text-sm px-2 py-4 text-white bg-[#ff7900] font-semibold hover:text-[#ff7900] hover:bg-white">
                        Newtnova metóda
                    </a>
                </li>
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