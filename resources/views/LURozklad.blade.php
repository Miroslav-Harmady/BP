<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.2.0/math.js"></script>
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_CHTML"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-300">
    @include('Includes.navbar')    
    <div class="flex justify-center mt-8">
        <div class="w-full md:w-3/4 lg:w-3/4 bg-white px-4 shadow-2xl rounded-sm mb-4">
            <h1 class="text-center text-3xl font-bold py-4">
                LU rozklad
            </h1>
            <p class="pb-2 text-lg">
                Princíp metódy <em>LU rozkladu</em> matice spočíva v tom, že regulárnu maticu A prepíšeme v tvare súčinu dvoch matíci, z ktorých jedna - L (z anglického lower) je <em>dolná trojuholníková</em>
                a má na celej hlavnej diagonále jednotky, a druá - U (z anglického slova <em>upper</em>) je <em>horná trojuholníková matica</em> a na hlavnej diagonále má nenulové prvky 
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 pl-10">
                <div class="p-2 text-lg">
                        \(L = \begin{pmatrix}
                            1 & 0 & 0 \\
                            \star & 1 & 0 \\
                            \star & \star & 1
                            \end{pmatrix},\)
                </div>
                <div class="p-2 text-lg">
                    \(U = \begin{pmatrix}
                    \star & \star & \star \\
                    0 & \star & \star \\
                    0 & 0 & \star
                    \end{pmatrix}\)
                </div>
            </div>
            <p class="indent-4 py-2 text-lg">
                V tomto prípade, keď sú prvky na hlavnej diagonále matice L rovné 1, hovoríme o tzv. <em>Doolittelovom rozklade</em>. Okrem toho existuje aj tzv. <em>Croutov rozklad</em>,
                v ktorom sú prvky na hlavnej diagonále matice U rovné 1. My sa budeme venovať iba Doolittleovemu rozkladu.
            </p>
            <p class="indent-4 pb-2 text-lg">
                Postup riešenia sústavy Ax = b metódou <em>LU rozkladu</em> je nasledovný. Maticu A nahradíme v sústave súčinom LU a označíme Ux = y. Dostaneme Ly = b. Najprv vyriešime sústavu Ly = b 
                <em>doprednou substitúciou</em> a potom dosadíme y do pravej strany sústavy Ux = y, ktorú vyriešime <em>spätnou substitúciou</em>.
            </p>
            <p class="indent-4 pb-2 text-lg">
                Výhoda metódy LU rozkladu je hlavne v prípadoch, keď riešime viac sústav s rovnakou maticou a rôznymi pravými stranami.
            </p>

            <h2 class="text-2xl 10">
                Vzorový príklad
            </h2>
            <p>
                Nájdite LU rozklad matice
            </p>

            <h2 class="text-2xl 10 pt-2">
                Neriešené sem
            </h2>
      
            <div class="relative mt-4">
                <p class="text-base">
                    Pre správny výpočet kalkulačky dajte maticu prosím do správneho tvaru. To znamená, že matica musí byť štvorcová a atď... To sa sem ešte doplní. Dodržiavajte prosím vzor, ktorý vidíte dole v
                    v nevyplnených poliach. Dávajte si taktiež pozor na nežiadúce čiarky na konci riadkov.
                 </p>
                <div class="grid grid-cols-1 z-3 mt-4 mb-4 pb-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 justify-items-center">
                        <div>
                            <div>
                                <label for="inputA"> Ľavá strana matice:</label>
                            </div>
                            <div>
                                <textarea name="inputA" id="inputA" cols="20" rows="10" class="border-2 border-solid border-black rounded-lg pl-2" placeholder="1, 2, 0&#10;0, 3, 8&#10;-1, -5,-5"></textarea>
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="inputB"> Pravá strana matice:</label>
                            </div>
                            <div>
                                <textarea name="inputB" id="inputB" cols="20" rows="10" class="border-2 border-solid border-black rounded-lg pl-2" placeholder="8&#10;16&#10;-6" ></textarea>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="r"> Presnosť zaokrúhľovania:</label>
                            </div>
                            <div>
                                <select name="r" id="r" class="border-2 border-solid border-black rounded-lg p-1">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg" onclick="compute()">compute</button>
                    </div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 pointer-events-none" id="errorModal">
                    <div class=" w-3/4 bg-white font-black rounded-lg p-2 border-2 border-[#ff7900] shadow-lg">
                        <p class="text-center text-base font-semibold">
                            Ups! Zdá sa že došlo ku chybe počas výpočtu.
                        </p>
                        <p id="error" class="text-center text-base font-semibold"></p>
                        <div class="flex justify-center my-2">
                            <button class="justify-self-center bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg" onclick="hideModal()">Schovať</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <span id="resultL" class="pr-2">
                        </span>
                        <span id="resultU" class="pr-2">
                        </span>
                        <span id="resultY" class="pr-2">
                        </span>
                        <span id="resultX">
                        </span>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="{{ asset('js/pages/LURozklad.js') }}"></script>
</html>