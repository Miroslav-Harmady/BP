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
        LU rozklad
    </h1>
    <div>
        <p>
            Princíp metódy <em>LU rozkladu</em> matice spočíva v tom, že regulárnu maticu A prepíšeme v tvare súčinu dvoch matíci, z ktorých jedna - L (z anglického lower) je <em>dolná trojuholníková</em>
            a má na celej hlavnej diagonále jednotky, a druá - U (z anglického slova <em>upper</em>) je <em>horná trojuholníková matica</em> a na hlavnej diagonále má nenulové prvky 
        </p>
        <div class="flex">
            <div>
                \(L = \begin{pmatrix}
                1 & 0 & 0 \\
                \star & 1 & 0 \\
                \star & \star & 1
                \end{pmatrix}\)
            </div>
            <div>
                \(U = \begin{pmatrix}
                \star & \star & \star \\
                0 & \star & \star \\
                0 & 0 & \star
                \end{pmatrix}\)
            </div>
        </div>
        <p>
            V tomto prípade, keď sú prvky na hlavnej diagonále matice L rovné 1, hovoríme o tzv. <em>Doolittelovom rozklade</em>. Okrem toho existuje aj tzv. <em>Croutov rozklad</em>,
            v ktorom sú prvky na hlavnej diagonále matice U rovné 1. My sa budeme venovať iba Doolittleovemu rozkladu.
        </p>
        <p>
            Postup riešenia sústavy Ax = b metódou <em>LU rozkladu</em> je nasledovný. Maticu A nahradíme v sústave súčinom LU a označíme Ux = y. Dostaneme Ly = b. Najprv vyriešime sústavu Ly = b 
            <em>doprednou substitúciou</em> a potom dosadíme y do pravej strany sústavy Ux = y, ktorú vyriešime <em>spätnou substitúciou</em>.
        </p>
        <p>
            Výhoda metódy LU rozkladu je hlavne v prípadoch, keď riešime vuac sústav s rovnakou maticou a rôznymi pravými stranami.
        </p>
    </div>

    <div>
        <h2>
            sekcia na vzorový príklad
        </h2>
        <br>
        <br>
    </div>

    <div>
        <h2>
            neriešené sem
        </h2>
        <br>
        <br>
    </div>

    <div>
        <div class="flex justify-center">
            <div class="w-1/2 relative p-2">
                <div class="grid grid-cols-1 z-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 justify-items-center">
                        <div>
                            <div>
                                <label for="inputA"> Ľavá strana matice:</label>
                            </div>
                            <div>
                                <textarea name="inputA" id="inputA" cols="20" rows="10"></textarea>
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="inputB"> Pravá strana matice:</label>
                            </div>
                            <div>
                                <textarea name="inputB" id="inputB" cols="20" rows="10" ></textarea>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="r"> Presnosť zaokrúhľovania:</label>
                            </div>
                            <div>
                                <select name="r" id="r">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 w-1/2 bg-green-300" >
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


</body>
<script src="{{ asset('js/pages/LURozklad.js') }}"></script>
</html>