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
    <div class="flex justify-center">
        <div class="w-3/4 text-lg bg-white">
            <h1 class="text-center text-3xl font-bold py-4">
                Newtonove-Cotesove kvadratúrne vzorce
            </h1>
        
            <p class="">
                <em>Základná myšlienka</em> Newtonových - Cotesových kvadratúrnych vzorcov spočíva v tom,že funkciu \(f(x)\) <em>nahradíme</em> na intervale \(\left< a,b \right>\)
                nejakou inou <em>jednoduchšou funkciou</em> \(P_m(x)\), v tomto prípad aproximačným alebo interpolačným polynómom stupňa m. Vo všeobecnosti platí, že pokiaľ je
                funkcia \(P_m(x)\) dobrou aprosimáciou funkcie \(f(x)\), tak aj $$\int_{a}^{b}P_m(x)dx$$ je dobrou aproximáciou \(\int_a^bf(x)dx\)
            </p>
            <p>
                Postup výpočtu určitého integrálu potom môžeme zhrnúť do nasledovných bodov:
            </p>
            <p>
                1. Interval \(\left< a,b \right>\) rozdelíme na n <em>rovnakých čiastkových intervalov</em> (nazývaných aj <em>podintervaly</em>) rovnakej dĺžky h, ktorú vypočítame
                 $$h = \frac{b - a}{n}$$.
            </p>
            <p>
                Získali sme tak (n + 1) deliacich bodov, ktoré označíme \(x_i, i = 1,...,n + 1\). Platí 
            </p>
                           
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3"> 
                {{-- toto asi dam este na grid uvidi sa --}}
                <div class="px-4">
                    \(x_i = a + (i - 1) \cdot h,\)
                </div>
                <div class="px-4">
                    \(y_i = f(x_i)\),
                </div>
                <div class="px-4">
                    \(i = 1,...,n + 1\)
                </div>
            </div>
            <p class="text-2xl text-red-500 font-bold">
                Dobre tu sa radšej opýtaj že čo všetko tam má byť a čo už nie z tej teórie
            </p>
        </div>
    </div>

    <div>
        <div class="flex justify-center">
            <div class="w-3/4 relative p-2 bg-white">
                <div class="grid grid-cols-1 z-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 justify-items-center">
                        <div>
                            <div>
                                <label for="f"> f:</label>
                            </div>
                            <div>
                                <input type="text" id="f" class="border-2 border-black rounded-lg border-solid">
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="a"> a:</label>
                            </div>
                            <div>
                                <input type="number" id="a" class="border-2 border-black rounded-lg border-solid">
                            </div>        
                        </div>

                        <div>
                            <div>
                                <label for="b"> b:</label>
                            </div>
                            <div>
                                <input type="number" id="b" class="border-2 border-black rounded-lg border-solid">
                            </div>
                        </div>
                    
                        <div>
                            <div>
                                <label for="n">n:</label>
                            </div>
                            <div>
                                <input type="number" id="n" class="border-2 border-black rounded-lg border-solid">
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
                        <button class="justify-self-center bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg" onclick="compute()">compute</button>
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
                <div id="result">
                    <table id="table"></table>
                    <table id="table2"></table>
                    <table id="table3"></table>
                </div>
            </div>
        </div>    
    </div>
</body>
<script src="{{ asset('js/pages/integral.js') }}"></script>
</html>