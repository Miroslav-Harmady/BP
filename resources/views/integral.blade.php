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
        <div class="w-full md:w-3/4 lg:w-3/4 text-lg bg-white px-4  shadow-2xl rounded-sm mb-4">
            <h1 class="text-center text-3xl font-bold py-4">
                Newtonove-Cotesove kvadratúrne vzorce
            </h1>
        
            <p class="">
                <em>Základná myšlienka</em> Newtonových - Cotesových kvadratúrnych vzorcov spočíva v tom, že funkciu \(f(x)\) <em>nahradíme</em> na intervale \(\left< a,b \right>\)
                nejakou inou <em>jednoduchšou funkciou</em> \(P_m(x)\), v tomto prípade aproximačným alebo interpolačným polynómom stupňa \(m\). Vo všeobecnosti platí, že pokiaľ je
                funkcia \(P_m(x)\) dobrou aproximáciou funkcie \(f(x)\), tak aj $$\int_{a}^{b}P_m(x)dx$$ je dobrou aproximáciou \(\int_a^bf(x)dx\).
            </p>
            <p>
                Postup výpočtu určitého integrálu potom môžeme zhrnúť do nasledovných bodov:
            </p>
            <p>
                Interval \(\left< a,b \right>\) rozdelíme na \(n\) <em>rovnakých čiastkových intervalov</em> (nazývaných aj <em>podintervaly</em>) rovnakej dĺžky \(h\), ktorú vypočítame
                 $$h = \frac{b - a}{n}.$$
            </p>
            <p>
                Získali sme tak (n + 1) deliacich bodov, ktoré označíme \(x_i, i = 1,...,n + 1\). Platí 
            </p>
                             
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3">
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
            <p class="mt-2">
               Všeobecný vzťah je: 
                $$\int_{a}^{b}f(x)dx \approx h \cdot \sum_{i=1}^{n}f(x_i)$$
            </p>
            <h2 class="text-2xl py-2 font-semibold border-b-2">
                Vzorový príklad
            </h2>
            <p>
                Vypočítajte približne hodnotu \(\int_{1}^{5}\cos(x+3)dx\) pomocou obdĺžnikovej metódy, ak počet podintervalov n = 4. Vypočítajte pre ľavý krajný, pravý krajný a stredný bod interpolácie.
            </p>
            <p class="py-2">
                Najskôr vypočítame dĺžku čiastkového intervalu \(h = \frac{b-a}{n} = \frac{5-1}{4} = 1\) <br>
                A teraz môžeme vypočítať funkčné hodnoty v bodoch interpolácie. 
            </p>
            <h3 class="text-xl py-3">
                Ľavý krajný bod:
            </h3>
            <p>
                \(f(x_1)=f(1)\approx -0.6536\)<br>
                \(f(x_2)=f(2)\approx 0.2837\)<br>
                \(f(x_3)=f(3)\approx 0.9602\)<br>
                \(f(x_4)=f(4)\approx 0.7539\)<br>
                Po dosadení do vzorca uvedeného vyššie dostávame hodnotu \(1.3442\)
            </p>
            <h3 class="text-xl py-3">
                Pravý krajný bod:
            </h3>
            <p>
                
                Pre pravý krajný bod nám stačí dopočítať hodnotu pre \(x_5\), \(f(x_5) = f(5)\approx-0.1455\) <br>
                Súčtom hodnôt \(f(2)\) až \(f(5)\) dostávame výsledok \(1.8523\) 
            </p>
            <h3 class="text-xl py-3">
               Stredný bod:
            </h3>
            <p>
                \(f(1.5)\approx -0.2108\)<br>
                \(f(2.5)\approx 0.7087\)<br>
                \(f(3.5)\approx 0.9766\)<br>
                \(f(4.5)\approx 0.3466\)<br>
                Po dosadení do vzorca uvedeného vyššie dostávame hodnotu \(1.8211\)
            </p>

            <h2 class="text-2xl py-2 font-semibold border-b-2">
                Neriešené príklady
            </h2>

            <p class="mb-2 ">
                Použitím <em>obdĺžnikovej metódy</em> s použitím všetkých uzlových bodov vypočítajte s presnosťou na 4 desatinné miesta.
            </p>

            @foreach ($collection as $item)
                <div>
                    <p class="mb-2 ml-4">{{++$counter . ")"}}</p>
                    <p class="ml-8">\(\int_{{{explode(",", $item->interval)[0]}}}^{{{explode(",", $item->interval)[1]}}}{{$item->function}}dx\); \(n = {{$item->n}}\)</p>
                    <p class="my-2"> <b>Výsledok: </b></p>
                    <p>
                        Pravý: {{explode(",", $item->result)[0]}}
                    </p>
                    <p>
                        Ľavý: {{explode(",", $item->result)[1]}}
                    </p>
                    <p>
                        Stredný: {{explode(",", $item->result)[2]}}
                    </p>
                </div>    
            @endforeach

            <div class="relative mt-4">
                <p class="text-base">
                    Pre správny výpočet prosím vyplňte všetky polia, nakoľko pre výpočet sú všetky potrebné. Funkciu však treba zadať v špecifickej syntaxi.
                     Ako zadávať ktoré operácie, či funkcie sa dozviete v dokumentácii na stránke <a href="https://mathjs.org/docs/index.html" target="_blank" class="text-[#ff7900] hover:border-b-2 hover:border-[#ff7900]">https://mathjs.org/docs/index.html</a> 
                </p>      
                <div class="grid grid-cols-1 z-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 justify-items-center">
                        <div>
                            <div>
                                <label for="f"> f(x):</label>
                            </div>
                            <div>
                                <input type="text" id="f" class="border-2 border-black rounded-lg border-solid p-1">
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="a"> a:</label>
                            </div>
                            <div>
                                <input type="number" id="a" class="border-2 border-black rounded-lg border-solid p-1">
                            </div>        
                        </div>

                        <div>
                            <div>
                                <label for="b"> b:</label>
                            </div>
                            <div>
                                <input type="number" id="b" class="border-2 border-black rounded-lg border-solid p-1">
                            </div>
                        </div>
                    
                        <div>
                            <div>
                                <label for="n">n:</label>
                            </div>
                            <div>
                                <input type="number" id="n" class="border-2 border-black rounded-lg border-solid p-1">
                            </div>        
                        </div>

                        <div>
                            <div>
                                <label for="r"> Presnosť zaokrúhľovania:</label>
                            </div>
                            <div>
                                <select name="r" id="r" class="border-2 border-black rounded-lg p-1">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button class="justify-self-center bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg" onclick="compute()">Vypočítaj</button>
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
                <div id="result" class="flex justify-center my-4">
                    <table id="table" class="mr-2"></table>
                    <table id="table2" class="mr-2"></table>
                    <table id="table3" class="mr-2"></table>
                </div>
            </div>
        </div>    
    </div>
</body>
<script src="{{ asset('js/pages/integral.js') }}"></script>
</html>