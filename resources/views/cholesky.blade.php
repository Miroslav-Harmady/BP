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
        <div class="w-3/4 bg-white px-4 shadow-2xl rounded-sm mb-4">
            <h1 class="text-center text-3xl font-bold py-4 text-">
                Choleskyho rozklad
            </h1>
            <p class="text-lg">
                Nech A je symetrická pozitívne definitná matica, potom existuje dolno-trojuholníková matica L s kladnými diagonálnymi prvkami taká, že platí
           </p>

           <div class="py-2 text-lg">
                \(A = L \cdot L^{T} =\) \(\begin{pmatrix}
                l_{11}& \color{Blue}0 & \color{Blue}0\\
                l_{21}& l_{22} & \color{Blue}0 \\
                l_{31}&  l_{32}& l_{33}
                    \end{pmatrix}
                \cdot \) \(\begin{pmatrix}
                l_{11}&  l_{21} &  l_{31}\\
                \color{Blue}0& l_{22} &  l_{32} \\
                \color{Blue}0& \color{Blue}0& \color{Blue}0
                    \end{pmatrix}\)
            </div>
            <p class="text-lg">
                Tento rozklad sa nazýva <em>Choleskyho rozklad</em> a pre prvky matice L potom dostaneme
            </p>
            <div class="py-2">
                \(L = \begin{pmatrix}
                \sqrt{a_{11}} & \color{Blue} 0 & \color{Blue} 0 \\
                 a_{21}/l_{11}& \sqrt{a_{22} - l_{21}^2} & \color{Blue} 0 \\
                 a_{31}/l_{11}& (a_{32}-l_{31}l_{21})/l_{22}  & \sqrt{a_{33}-l_{31}^2-l_{32}^2} \\
                \end{pmatrix}  \)
            </div>

            <p class="text-lg py-2">
                Vo všeobecnosti môžeme <em>Choleskyho rozklad</em> zapísať v tvare
            </p>
        
            <div class="py-2 text-lg">
                \(l_{i,j} = \sqrt{ a_{i,i} - \sum_{k=1}^{i-1}l_{i,k}^2} \)
            </div>
            <div class="pb-2 text-lg" >
                \(l_{j,i} = \frac{1}{l_{i,i}} \left( a_{j,i} - \sum_{k=1}^{j-1}l_{j,k}l_{i,k} \right) \)
            </div>
        
            <p class="py-2 text-lg">
                Postup riešenia sústavy Ax = b metódou <em>Choleskyho rozkladu</em> je nasledovný. Maticu A nahradíme v sústave súčinom \(LL^T\) a označíme \(L^Tx = y\).
                Dostaneme \(Ly = b\). Najprv vyreišime sústavu Ly = b <em>doprednou substitúciou</em> a potom dosadíme y do prvej strany sústavy \(L^Tx = y\), 
                ktorú vyriešime <em>spätnou substitúciou</em>.
            </p>
            <div class="relative">
                <p class="text-base">
                    Pre správny výpočet kalkulačky dajte maticu prosím do správneho tvaru. To znamená, že matica musí byť štvorcová a atď... To sa sem ešte doplní. Dodržiavajte prosím vzor ktorý vidíte dole v
                    v nevyplnených poliach. Dávajte si taktiež pozor na nežiadúce čiarky na konci riadkov.
                 </p>
                <div class="grid grid-cols-1 z-3 mt-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 justify-items-center">
                        <div>
                            <div>
                                <label for="inputA">Ľavá strana matice:</label>
                            </div>
                            <div>
                                <textarea required class="border-2 border-black border-solid rounded-lg p-1 m-0" name="inputA" id="inputA" cols="20" rows="10" placeholder="4, 6, -2&#10;6, 13, 1&#10;-2, 1, 6"></textarea>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label  for="inputB">Pravá strana matice:</label>
                            </div>
                            <div>
                                <textarea required class="border-2 border-black border-solid rounded-lg p-1 m-0" name="inputB" id="inputB" cols="20" rows="10" placeholder="-6&#10;-5&#10;9"></textarea>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="r">Presnosť zaokrúhľovania:</label>
                            </div>
                            <div>
                                <select class="rounded-lg border-2 border-black" id="r">
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-3/4 bg-white pt-8" >
                        <span id="resultL" class="pr-2">
                        </span>
                    
                        <span id="resultY" class="pr-2">
                        </span>
                        <span id="resultX">
                        </span>
                </div>
            </div>       
        </div>
       
        {{-- <div class="bg-green-300 border-2 w-1/2 border-black border-solid m-4" >
            <p>
                <span id="test">
                    \begin{equation}
                    \left(
                    \begin{array}{cccc|c}
                        a_{11} & a_{12} & \cdots & a_{1n} & b_1\\
                        a_{21} & a_{22} & \cdots & a_{2n} & b_2\\
                        \vdots & \vdots & \ddots & \vdots & \vdots\\
                        a_{m1} & a_{m2} & \cdots & a_{mn} & b_m
                    \end{array}
                    \right) \nonumber
                    \end{equation}
                </span>
            </p>
        </div> --}}
    </div>
    
</body>
<script src="{{ asset('js/pages/cholesky.js') }}"></script>
</html>