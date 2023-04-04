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
    @include('Includes.navbar')
    <h1 class="text-center font-bold text-2xl mb-4">
        Admin panel
    </h1>
    <p class="text-center text-lg">
        Vitajte v admin panely. Táto sekcia slúži na manipulovanie s príkladmi, ktoré sa nachádzajú na jednotlivých stránkach. Príklady môžete mazať, upravovať aj vytvárať. Stačí si vybrať jednu z nasledujúcih možností.
    </p>
    <div class="flex justify-center ">
        <div class="w-1/2 grid grid-cols-1 text-center">
            <a href="{{route('admin.bisection.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 px-4 rounded">
                Bisekcia
            </a>
            <a href="{{route('admin.cholesky.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 px-4 rounded">
                Choleskyho algoritmus
            </a>
            <a href="{{route('admin.integral.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 px-4 rounded">
                NC-kvadratúrne vzorce
            </a>
            <a href="{{route('admin.jacobi.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 px-4 rounded">
                Jacobiho metóda
            </a>
            <a href="{{route('admin.LU.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 px-4 rounded">
                LU rozklad
            </a>
            <a href="{{route('admin.newton.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 px-4 rounded">
                Newtnova metóda
            </a>
        </div>
    </div>
</body>
</html>