<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.plot.ly/plotly-2.14.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.2.0/math.js"></script>
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_CHTML"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-300">
    @include('Includes.navbar')
    <div class="flex justify-center mt-8">
        <div class="w-full md:w-3/4 lg:w-3/4 text-lg bg-white px-4 shadow-2xl rounded-sm mb-4 py-4">
            <h1 class="text-3xl text-center font-bold">
                Newtonova metóda
            </h1>
            <p class="pt-2">
                Newtonova metóda sa nazýva aj <em>metóda dotyčníc</em>.
            </p>
            <p class="pt-2">
                Zadanú rovnicu upravíme do tvaru f(x) = 0. Nech \(x_0\) je náš počiatčný odhad riešenia a nech \(f'(x) \not=0\), potom dotyčnica
                 \(t_0\) ku grafu funkcie \(y = f(x)\) v bode \(x_0, f(x_0)\) pretne x-ovú os presne v jednom bode. Tento bod označíme (\(x_1,0\)).
                 X-ová súradnica tohto bodu, \(x_1\), bude naša prvá aproximácia. Označíme (\(x_1, f(x_1)\)) na grafe funkcie \(y = f(x)\) a 
                 zostrojíme dotyčnicu \(t_1\) ku grafu funkcie v tomto novom bode. Potom dotyčnica \(t_1\) pretne x-ovú os v bode \((x_2,0)\).
                 X-ová súradnica tohto bodu, \(x_2\), bude druhá aproximácia presného riešenia \(\color{Blue}\alpha\). Týmto spôsobom získame 
                také riešenie, ktoré spĺňa zadané kritérium.
            </p>
            <p class="pt-2">
                Aby sme získali vzťah medzi \(x_i\) a \(x_{i + 1}\), vrátime sa k dotyčnici \(t_0\). Sklon dotyčnice \(t_0\) je \(f'(x_0)\), t. j. 
                hodnota derivácie funkcie \(f(x)\) v bode x = \(x_0\). Dotyčnica \(t_0\) prechádza bodom \((x_0, f(x_0))\) a aplikovaním smernicového 
                tvaru priamky na \(t_0\) dostávame $$y-f(x_0) = f'(x_0)(x_1 - x_0).$$
            </p>
            <p class="pt-2">
                Bod \((x_1, 0)\) leží na \(t_0\), preto jeho súradnice musia spĺňať rovnicu \(t_0\), t. j. \(x = x_1\) a \(y = 0\) $$0 - f(x_0) = f'(x0)(x_1 - x_0).$$
            </p>
            <p>
                Predelením obidvoch strán rovnice \(f'(x_0)\) (za predpokladu\(f'(x_0) \not=0 \)) máme $$\frac{-f(x_0)}{f'(x_0)} = x_1 - x_0$$
                a vyjadrením \(x_1\) dostaneme $$x_1 = x_0 - \frac{f(x_0)}{f'(x_0)}.$$
            </p>
            <h2 class="text-2xl py-2 font-semibold border-b-2">
                Vzorový príklad
            </h2>
            <p>
                Newtonovou metódou nájdite riešenie rovnice \(4x^3+2x+1 = 0;x_0=0\) <br>
                \( x_{i+1} = x_i - \frac{f(x_i)}{f'(x_i)} = \) \(x_i - \frac{4x_i^3 + 2x_i + 1}{12x_i^2+2}\)
            </p>
            <p>
                \(x_1 = 0 - \frac{4 \cdot 0^3 +2 \cdot 0 + 1}{12 \cdot 0^2 + 2}\) \(\Rightarrow x_1 = -0.5\) <br>
                \(x_2 = -0.5 - \frac{4 \cdot (-0.5)^3 +2 \cdot (-0.5) + 1}{12 \cdot (-0.5)^2 + 2}\) \(\Rightarrow x_2 = -0.4\) <br>
                \(x_3 = -0.4 - \frac{4 \cdot (-0.4)^3 +2 \cdot (-0.4) + 1}{12 \cdot (-0.4)^2 + 2}\) \( \Rightarrow x_3 = -0.3857\) <br>
                Pri ďalšej iterácii pre \(x_4\) dostaneme hodnotu, ktorej rozdiel oproti \(x_3\) je menej ako zastavovacie kritérium, preto tu výpočet končíme.
            </p>

            <h2 class="text-2xl py-2 font-semibold border-b-2">
                Neriešené príklady
            </h2>

            <p class="mb-2 ">
                Použitím Newtonovej metódy nájdite pibližné riešenie rovnice \(f(x) = 0\), ak máte zadaný počiatočný odhad riešenia \(x_0\). 
            </p>

            @foreach ($collection as $item)
                <div>
                    <p class="mb-2 ml-4">{{++$counter . ")"}}</p>
                    <p class="ml-8">\({{$item->function}}\); \(x_0={{$item->interval}}\), zastavovacie kritérium \(|f(x_i)| < {{$item->dispersion}}\)</p>
                    <p class="my-2"><b>Výsledok:</b> {{$item->result}}; počet iterácií: {{$item->iterations}}</p>
                </div>    
            @endforeach

            <div class="relative mt-4">
                <p class="text-base">
                    Pre správny výpočet prosím vyplňte všetky polia, nakoľko pre výpočet sú všetky potrebné. Funkciu však treba zadať v špecifickej syntaxi.
                     Ako zadávať ktoré operácie, či funkcie sa dozviete v dokumentácii na stránke <a href="https://mathjs.org/docs/index.html" target="_blank" class="text-[#ff7900] hover:border-b-2 hover:border-[#ff7900]">https://mathjs.org/docs/index.html</a>. 
                     Kalkulačka zobrazuje aj graf zadanej funkcie, polia "začiatok D intervalu" a "koniec D intervalu" predstavujú podmnožinu definičného oboru, na ktorom sa funkcia zobrazí.
                </p>   
                <div class="grid grid-cols-1 z-3 pb-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 justify-items-center">
                        <div>
                            <div>
                                <label for="inputF">f(x):</label>
                            </div>
                            <div>
                                <input type="text" name="inputF" id="function_des" class="border-2 border-solid border-black rounded-lg p-1" placeholder="x^3-4*x^2+3x-7">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="inputA">x0:</label>        
                            </div>
                            <div>
                                <input type="number" name="inputA" id="inputA" class="border-2 border-solid border-black rounded-lg p-1" placeholder="0">
                            </div>  
                        </div>
                    
                        <div>
                            <div>
                                <label for="inputda">začiatok D intervalu:</label>
                            </div>
                            <div>
                                <input type="number" name="inputda" id="inputda" class="border-2 border-solid border-black rounded-lg p-1">
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="inputdb">koniec D intervalu:</label>
                            </div>
                            <div>
                                <input type="number" name="inputdb" id="inputdb" class="border-2 border-solid border-black rounded-lg p-1">
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="eps">Zastavovacie kritérium:</label>        
                            </div>
                            <div>
                                <input type="number" name="eps" min="0" id="eps" class="border-2 border-solid border-black rounded-lg p-1">         
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="r" > Presnosť zaokrúhľovania:</label>
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
                        <button class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg" onclick="compute()">Vypočítaj</button>
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
                    <div id="chart" class="w-full h-auto"></div>
                <div>
                    <table id="resultTable" class="mx-auto mb-4"></table>
                </div>
            </div>       
        </div>
    </div>
</body>
<script src="{{ asset('js/pages/newton.js') }}"></script>

</html>