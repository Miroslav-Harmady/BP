
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-300">
    @include('Includes.navbar')
    <div class="flex justify-center">
        <div class="flex flex-col justify-items-center mt-4 p-2 w-10/12 md:w-3/4 lg:w-3/4 text-lg bg-white shadow-2xl">
            <div class=" text-center">
                <h1 class="text-3xl text-center my-4 font-bold">Numerická matematika pre geodetov</h1>
                <p class="pb-2">
                    Poznáte ten pocit, keď sa učíte matematiku a musíte mať otvorených nekonečný počet stránok, pretože sa potrebujete pozerať do skrípt, príklady sú na inej stránke
                    a kalkulačku si ešte musíte aj sami dohľadať? 
                </p>
                <p class="pb-2">
                    To sa dnes končí. Naša stránka obsahuje 6 vybraných tém z predmetu matematika 4, pričom každá téma obsahuje teóriu, vzorovo riešený príklad s vysvetlením 
                    a kalkulačku. 
                </p>
            </div>
            <div class="jusitfy-start">
                <p class="pb-2">
                    Stránka obsahuje nasledovné témy:
                </p>
                    
                
                <ul class="pl-2">
                    <li>
                        Riešenie sústav lineárnych rovníc:
                        <ul class="pl-4 flex flex-col">
                            <li class="my-1">
                                <a href="/LURozklad" class="text-[#ff7900] hover:bg-[#ff7900] hover:text-white font-semibold p-1 rounded">LU rozklad</a>
                            </li>
                            <li class="my-1">
                                <a href="/cholesky" class="text-[#ff7900] hover:bg-[#ff7900] hover:text-white font-semibold p-1 rounded">Choleskyho rozklad</a>
                            </li>
                            <li class="my-1">
                                <a href="/jacobi" class="text-[#ff7900] hover:bg-[#ff7900] hover:text-white font-semibold p-1 rounded">Jacobiho metóda</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        Numerické riešenie nelineárnych rovníc:
                        <ul class="pl-4 flex flex-col">
                            <li class="my-1">
                                <a href="/bisekcia" class="text-[#ff7900] hover:bg-[#ff7900] hover:text-white font-semibold p-1 rounded">Metóda bisekcie</a>
                            </li>
                            <li class="my-1">
                                <a href="/newton" class="text-[#ff7900] hover:bg-[#ff7900] hover:text-white font-semibold p-1 rounded">Newtonova metóda</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        Numerické metódy riešenia určitého integrálu:
                        <ul class="pl-4 flex flex-col">
                            <li class="my-1">
                                <a href="/integral" class="text-[#ff7900] hover:bg-[#ff7900] hover:text-white font-semibold p-1 rounded">Newtonove-Cotesove kvadratúrne vzorce</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
