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
<body>
    <h1>
        Choleskyho rozklad
    </h1>

    <p>
         Nech A je symetrická pozitívne definitná matica, potom existuje dolno-trojuholníková matica L s kladnými diagonálnymi prvkami taká, že platí
    </p>
    <div>
        <div>
            \(A = L \cdot L^{T} = \begin{pmatrix}
            l_{11}& \color{Blue}0 & \color{Blue}0\\
            l_{21}& l_{22} & \color{Blue}0 \\
            l_{31}&  l_{32}& l_{33}
           \end{pmatrix}
            \cdot \begin{pmatrix}
            l_{11}&  l_{21} &  l_{31}\\
            \color{Blue}0& l_{22} &  l_{32} \\
            \color{Blue}0& \color{Blue}0& \color{Blue}0
           \end{pmatrix}\)
        </div>
    </div>
    <p>
        Tento rozklad sa nazýva <em>Choleskyho rozklad</em> a pre prvky matice L potom dostaneme
    </p>
    <div>
        \(L = \begin{pmatrix}
        \sqrt{a_{11}} & \color{Blue} 0 & \color{Blue} 0 \\
         a_{21}/l_{11}& \sqrt{a_{22} - l_{21}^2} & \color{Blue} 0 \\
         a_{31}/l_{11}& (a_{32}-l_{31}l_{21})/l_{22}  & \sqrt{a_{33}-l_{31}^2-l_{32}^2} \\
        \end{pmatrix}  \)
    </div>

    <p>
        Vo všeobecnosti môžeme <em>Choleskyho rozklad</em> zapísať v tvare
    </p>

    <div>
        \(l_{i,j} = \sqrt{ a_{i,i} - \sum_{k=1}^{i-1}l_{i,k}^2} \)
    </div>
    <div>
        \(l_{j,i} = \frac{1}{l_{i,i}} \left( a_{j,i} - \sum_{k=1}^{j-1}l_{j,k}l_{i,k} \right) \)
    </div>

    <p>
        Postup riešenia sústavy Ax = b metódou <em>Choleskyho rozkladu</em> je nasledovný. Maticu A nahradíme v sústave súčinom \(LL^T\) a označíme \(L^Tx = y\).
        Dostaneme \(Ly = b\). Najprv vyreišime sústavu Ly = b <em>doprednou substitúciou</em> a potom dosadíme y do prvej strany sústavy \(L^Tx = y\), 
        ktorú vyriešime <em>spätnou substitúciou</em>.
    </p>

    <div>
        <div class="flex justify-center">
            <div class="w-1/2 relative p-2">
                <div class="grid grid-cols-1 z-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 justify-items-center">
                        <div>
                            <div>
                                <label for="inputA">Ľavá strana matice:</label>
                            </div>
                            <div>
                                <textarea required class="border-2 border-black border-solid rounded-lg p-2 m-0" name="inputA" id="inputA" cols="20" rows="10"></textarea>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label  for="inputB">Pravá strana matice:</label>
                            </div>
                            <div>
                                <textarea required class="border-2 border-black border-solid rounded-lg p-2 m-0" name="inputB" id="inputB" cols="20" rows="10"></textarea>
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
                        <button class="bg-green-500 border-green-700 border-2 border-solid p-2 rounded-lg font-bold text-white hover:bg-green-600 hover:drop-shadow-lg" onclick="compute()">compute</button>
                    </div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 pointer-events-none" id="errorModal">
                    <div class=" w-3/4 bg-white font-black">
                        Ups! Zdá sa že došlo ku chybe počas výpočtu.
                        <p id="error"></p>
                        <div class="flex justify-center">
                            <button class="bg-green-600 font-bold text-white p-2 rounded" onclick="hideModal()">Schovať</button>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
        <div class="flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-1/2 bg-green-300" >
                    <span id="resultL" class="pr-2">
                    </span>
                
                    <span id="resultY" class="pr-2">
                    </span>
                    <span id="resultX">
                    </span>
            </div>
        </div>
        <div class="bg-green-300 border-2 w-1/2 border-black border-solid m-4" >
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
        </div>
    
    </div>
    
</body>
<script src="{{ asset('js/pages/cholesky.js') }}"></script>
</html>