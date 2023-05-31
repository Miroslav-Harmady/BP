<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_CHTML"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.2.0/math.js"></script>
    <script src="https://cdn.plot.ly/plotly-2.14.0.min.js"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-300">
    @include('Includes.navbar')
    <div class="flex justify-center mt-8">
        <div class="w-full bg-white text-lg shadow-2xl px-4 rounded-sm mb-4 pb-4 md:w-3/4 lg:w-3/4">
            <h1 class="text-center text-3xl font-bold p-4">
                Metóda bisekcie
            </h1>
            <p >
                Metóda bisekcie sa nazýva aj <em>metóda polovičného delenia intervalu</em> a aplikuje sa na problémy formulované v tvare \(f(x) = 0\).
                Predpokladajme, že funkcia \(f(x)\) je spojitá na intervale \( I = \langle a, b \rangle\) a má v ňom  práve jeden koreň \(\color{Blue}\alpha\).
                Na začiatok si vyberme \(a_0\) a \(b_0\), ktorých hodnoty \(f(a_0)\) a \(f(b_0)\) majú opačné znamienka. Potom rozdelíme interval medzi
                \(a_0\) a \(b_0\) pomocou \(s_1 = (a_0 + b_0)/2\) a vypočítame jeho funkčnú hodnotu \(f(s_1)\). Pre ďalšiu iteráciu si ponecháme \(s_1\) a 
                jednu hodnotu z \(a_0\) alebo \(b_0\), ktorá má opačné znamienko \(f\) v porovnaní s \(f(s_1)\). Pokračujeme v delení intervalu, pokým 
                \(\left| f(s_n) \right| \lt \varepsilon_1 \) alebo \(\left| a_n - b_n \right| \lt \varepsilon_2 \).
            </p>
            <p class="  pb-2">
                Metóda bisekcie je jednoduchá, vždy konverguje, ale táto konvergencia je pomalá, nakoľko je založená na delení intervalu. Na druhej strane je jednoduchá na naprogramovanie a dáva odhad chyby v každom kroku.
            </p>
            <h2 class="text-2xl py-2 font-semibold border-b-2">
               Vzorový príklad
            </h2>
            <p>
                Metódou bisekcie nájdite s presnosťou \(\left|{f(s_n)}\right| < 0.1\) aproximáciou koreňa rovnice \(f(x)=x^2+x-3\) v intervale \(\left\langle 1,2 \right\rangle\)
            </p>
            <img src="{{asset('images/bis1.png') }}" alt="prvá iterácia bisekcie" class="w-full h-auto">
            <p>
                Na základe grafu vidíme, že \(f(a)\) a \(f(b)\) majú opačné znamienka, a teda má zmysel pokračovať \(a = 1\), \(b = 2\), \(f(a) = -1\), \(f(b) = 3\), \(s = 1.5\) a \(f(s) = 0.75\). Keďže \(f(a) \cdot f(s) < 0\), posúvame \(b\) na hodnotu \(s\), a teda nová hodnota \(b = 1.5\)
            </p>
            <img src="{{asset('images/bis2.png') }}" alt="druhá iterácia bisekcie" class="w-full h-auto">
            <p>
                Znovu overíme podmienku nutnú pre pokračovanie vo výpočte a zisťujeme že \(s=\frac{1 + 1.5}{2} = 1.25\), tým pádom \(f(s) = -0.1875\). Tentokrát \(f(b) \cdot f(s) < 0 \), takže tentorkát posunieme \(a\) na novú hodnotu \(a=1.25\)
            </p>
            <img src="{{asset('images/bis3.png') }}" alt="tretia iterácia bisekcie" class="w-full h-auto">
            <p>
                Po overení poračujeme výpočtom: \(s=\frac{1.25 + 1.5}{2} = 1.375\), tým pádom \(f(s) = 0.2656\), \(f(a) \cdot f(s) < 0\), posunieme \(b\) na \(b = 1.375\)
            </p>
            <img src="{{asset('images/bis4.png') }}" alt="štvrtá iterácia bisekcie" class="w-full h-auto">
            <p>
                \(s=\frac{1.25 + 1.375}{2} = 0.03252 < 0.1\) a tu náš algoritmus končí a našli sme približnú hodnotu \(s = 1.3125\)
            </p>

            <h2 class="text-2xl py-2 font-semibold border-b-2">
                Neriešené príklady
            </h2>

            <p class="mb-2 ">
                Pomocou metódy bisekcie nájdite približné riešenie rovnice \(f(x) = 0\), ak je zadaný interval \(I\). V prípade potreby zaokrúhľujte na 4 desatinné miesta.
            </p>

            @foreach ($collection as $item)
                <div>
                    <p class="mb-2 ml-4">{{++$counter . ")"}}</p>
                    <p class="ml-8">\({{$item->function}}\), \(I = <{{$item->interval}}>\); zastavovacie kritérium \(|f(x_i)| < {{$item->dispersion}}\)</p>
                    <p class="my-2"> <b>Výsledok: </b>{{$item->result}}; iterácie: {{$item->iterations}}</p>
                </div>    
            @endforeach
            
            <div class="relative ">
                <p class="text-base">
                    Pre správny výpočet prosím vyplňte všetky polia, nakoľko pre výpočet sú všetky potrebné. Funkciu však treba zadať v špecifickej syntaxi.
                     Ako zadávať ktoré operácie, či funkcie sa dozviete v dokumentácií na stránke <a href="https://mathjs.org/docs/index.html" target="_blank" class="text-[#ff7900] hover:border-b-2 hover:border-[#ff7900]">https://mathjs.org/docs/index.html</a>  
                </p>
                <div class="grid grid-cols-1 z-3">
                    <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center mb-4" > 
                        <div>
                            <div>
                                <label for="inputF">f(x)=</label>
                            </div>
                            <div>
                                <input type="text" name="inputF" id="function_des" placeholder="x^3-4*x+3" class="border-2 border-black rounded-lg border-solid p-1">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="inputA">a:</label>
                            </div>
                            <div>
                                <input type="number" name="inputA" id="inputA" class="border-2 border-black rounded-lg border-solid p-1" placeholder="0">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="inputB">b:</label>
                            </div>
                            <div>
                                <input type="number" name="inputB" id="inputB" class="border-2 border-black rounded-lg border-solid p-1" placeholder="4">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="eps">Zastavovacie kritérium:</label>
                            </div>
                            <div>
                                <input type="number" name="eps" min="0" id="eps" class="border-2 border-black rounded-lg border-solid p-1" placeholder="0.001"> 
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="r"> Presnosť zaokrúhľovania:</label>
                            </div>
                            <div>
                                <select id="r" class="border-2 border-black rounded-lg p-1">
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button onclick="compute()" id="idk" class="justify-self-center bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg">Vypočítaj</button>
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
                    <div id="chart" class="w-full h-auto mb-4" ></div>
                    <table class="mx-auto" id="resultTable"></table>
            </div>
        </div>
    </div>   
</body>
<script src="{{ asset('js/pages/bisection.js') }}"></script>
<script>
   style
</script>
</html>