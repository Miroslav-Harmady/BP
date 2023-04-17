<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    @include('Includes.adminNavbar')
    <h1 class="text-center font-bold text-2xl mb-4">
        Admin panel
    </h1>
    <div class="flex justify-center">
        <p class="text-center text-lg w-full md:w-1/2 lg:w-1/2 ">
            Vitajte v admin paneli. Táto sekcia slúži na manipulovanie s príkladmi, ktoré sa nachádzajú na jednotlivých stránkach. Príklady môžete mazať, upravovať aj vytvárať. Stačí si vybrať jednu z nasledujúcih možností.
        </p>
    </div>
    <div class="flex justify-center mt-4">
        <div class="w-3/4 md:w-1/2 lg:w-1/2 grid grid-cols-1 text-center text-lg">
            <a href="{{route('admin.bisection.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-3 p-2 rounded">
                Bisekcia
            </a>
            <a href="{{route('admin.cholesky.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-3 p-2 rounded">
                Choleskyho algoritmus
            </a>
            <a href="{{route('admin.integral.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-3 p-2 rounded">
                NC-kvadratúrne vzorce
            </a>
            <a href="{{route('admin.jacobi.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-3 p-2 rounded">
                Jacobiho metóda
            </a>
            <a href="{{route('admin.LU.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-3 p-2 rounded">
                LU rozklad
            </a>
            <a href="{{route('admin.newton.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-3 p-2 rounded">
                Newtnova metóda
            </a>
        </div>
    </div>
</body>
</html>