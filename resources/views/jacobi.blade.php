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
    <div class="flex justify-center mt-8 ">
        <div class="w-full md:w-3/4 lg:w-3/4 text-lg bg-white px-4 shadow-2xl rounded-sm mb-4 pb-4">
            <h1 class="text-center text-3xl font-bold my-4">
                Jacobiho metóda
            </h1>
           <p>
            Jacobiho metóda je jedna z <em>iteračných metód</em>. Výsledky iteračných metód nemusia byť nutne presné, nakoľko dochádza k nepresnostiam pri zaokrúhľovaní, alebo pri chybách samotných metód. 
            Práve preto vždy hľadáme len približné riešenie odpovedajúce vopred zadanej presnosti. Najrpv si zvolíme <em>počiatočnú aproximáciu riešenia</em> \(x^{(0)}\), ktorá sa postupom iterácii spresňuje. 
            Výpočet je zastavovaný <em>zastavovacou podmienkou</em>. 
           </p>

            <p>
                Princíp <em>Jacobiho metódy</em> vysvetlíme na systéme troch lineárnych rovníc o troch neznámych $$a_{11}x_1 + a_{12}x_2 + a_{13}x_3$$
                $$a_{21}x_1 + a_{22}x_2 + a_{2n}x_3$$
                $$a_{31}x_1 + a_{32}x_2 + a_{3n}x_3$$
            </p>

            <p>
                Každú s rovníc vydelíme koeficientom \(a_{ii}\) za predpokladu, že \(a_{ii} \not= 0 \) 
                $$x_1 + \frac{a_{12}}{a_{11}}x_2 + \frac{a_{13}}{a_{11}}x_3 = \frac{b_{1}}{a_{11}},$$
                $$\frac{a_{21}}{a_{22}}x_1 + x_2  \frac{a_{23}}{a_{22}}x_3 = \frac{b_{2}}{a_{22}},$$
                $$\frac{a_{31}}{a_{33}}x_2 + \frac{a_{32}}{a_{33}}x_2 +  x_3 = \frac{b_{3}}{a_{33}}.$$
            </p>

            <p>
                Potom z prvej rovnice vyjadríme \(x_1\), z druhej vyjadríme \(x_2\), z tretej rovnice vyjadríme \(x_3\) a zapíšeme nasledovne
            </p>
        
            <p>
                $$x_1 = \color{Blue}0 \color{Black} \cdot x_1 - \frac{a_{12}}{a_{11}}x_2 - \frac{a_{13}}{a_{11}}x_3 + \frac{b_{1}}{a_{11}},$$
                $$x_2 = -\frac{a_{21}}{a_{22}}x_1 +\color{Blue} 0 \color{Black} \cdot x_2  - \frac{a_{23}}{a_{22}}x_3 + \frac{b_{2}}{a_{22}},$$
                $$x_3 = - \frac{a_{31}}{a_{33}}x_1 - \frac{a_{32}}{a_{33}}x_2 + \color{Blue} 0 \color{Black} \cdot x_3 + \frac{b_{3}}{a_{33}}$$
            </p>

            <p class="py-2">
                \(\begin{pmatrix}
                    x1\\
                    x2\\
                    x3 
                \end{pmatrix}\) =  \(\begin{pmatrix}
                \color{Blue} 0 & - \frac{a_{12}}{a_{11}} & - \frac{a_{13}}{a_{11}} \\
                - \frac{a_{21}}{a_{22}} & \color{Blue} 0 & - \frac{a_{23}}{a_{22}} \\
                - \frac{a_{31}}{a_{33}} & - \frac{a_{32}}{a_{33}} & \color{Blue} 0
                \end{pmatrix} \cdot \) \(\begin{pmatrix} x1\\ x2\\ x3 \end{pmatrix} + \)
                \(\begin{pmatrix} \frac{b_1}{a_{11}}\\ \frac{b2}{a_{22}}\\ \frac{b3}{a_{33}} \end{pmatrix}\)
            </p>
            <p>
                Iteračná formula pre výpočet vektora \(x^{\color{Green}{(k)}}\), k = 1, ..., bude potom mať tvar
            </p>

            <p class="text-sm md:text-lg lg:text-lg">
                $$x_1^{\color{Green}{(k)}} = \color{Blue}0 \color{Black} \cdot x_1^{\color{Red}{(k-1)}} - \frac{a_{12}}{a_{11}}x_2^{\color{Red}{(k-1)}} - \frac{a_{13}}{a_{11}}x_3^{\color{Red}{(k-1)}} + \frac{b_{1}}{a_{11}},$$
                $$x_2^{\color{Green}{(k)}} = -\frac{a_{21}}{a_{22}}x_1^{\color{Red}{(k-1)}} +\color{Blue} 0 \color{Black} \cdot x_2^{\color{Red}{(k-1)}}  - \frac{a_{23}}{a_{22}}x_3^{\color{Red}{(k-1)}} + \frac{b_{2}}{a_{22}},$$
                $$x_3^{\color{Green}{(k)}} = - \frac{a_{31}}{a_{33}}x_1^{\color{Red}{(k-1)}} - \frac{a_{32}}{a_{33}}x_2^{\color{Red}{(k-1)}} + \color{Blue} 0 \color{Black} \cdot x_3^{\color{Red}{(k-1)}} + \frac{b_{3}}{a_{33}}$$
            </p>
            <p class="py-2">
                respektíve
            </p>

            <p class="py-2">
                \(\begin{pmatrix}
                    x1^{\color{Green}{(k)}}\\
                    x2^{\color{Green}{(k)}}\\
                    x3^{\color{Green}{(k)}} 
                \end{pmatrix}\) =  \(\begin{pmatrix}
                \color{Blue} 0 & - \frac{a_{12}}{a_{11}} & - \frac{a_{13}}{a_{11}} \\
                - \frac{a_{21}}{a_{22}} & \color{Blue} 0 & - \frac{a_{23}}{a_{22}} \\
                - \frac{a_{31}}{a_{33}} & - \frac{a_{32}}{a_{33}} & \color{Blue} 0
                \end{pmatrix} \cdot \) \(\begin{pmatrix} x1^{\color{Red}{(k-1)}}\\ x2^{\color{Red}{(k-1)}}\\ x3^{\color{Red}{(k-1)}} \end{pmatrix} + \)
                \(\begin{pmatrix} \frac{b_1}{a_{11}}\\ \frac{b2}{a_{22}}\\ \frac{b3}{a_{33}} \end{pmatrix}\),
            </p>
            <p>
                Kde horný index k označuje poradie iterácie. Horné indexy same zámere zvýraznili zelenou a červenou farbou, aby sme neskôr mohli poukázať na rozdiel medzi Jacobiho a Gaussovou-Seidelovou metódou. Je tiež dôležité si uvedomiť, že nahlavnej diagonále mám iba nulové prvky.
            </p>
            <p>
                Všeobecne <em>Jacobiho metódu</em> môžeme napísať nasledovne: Vybrme i-tú rovnicu
                $$\sum_{j=1}^{n}a_{ij}x_j = b_i$$
                a iteračný zápis výpočtu hodnoty \(x_i\) bude nasledovný
                $$x_i^{\color{Green}{(k)}} = \frac{1}{a_{i,i}} \left( b_i - \sum_{j=1}a_{ij}x{j}^{\color{Red}{(k-1)}} \right)$$
                Na konvergenciu Jacobiho metódy jepostačujúce, aby matica A bola <em>diagonálne dominantná</em>. To, či je matica riadkovo (resp. stĺpcovo) diagonálne dominantná znamená,
                že jej diagonálne prvky sú väčšieako suma ostatných prvkov v príslušnom riadku(resp. stĺpci).
            </p>
            <p>
                Hlavnou výhodou Jacobiho metódy je ľahká paralelizácia a vektorizácia algoritmu.
            </p>
      
            <div class="relative">
                <div class="grid grid-cols-1 z-3 pb-4">
                    <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-2 justify-items-center mb-4" >
                        <div>
                            <div>
                                <label for="inputA">Ľavá strana matice:</label>        
                            </div>
                            <div>
                                <textarea name="inputA" id="inputA" class="border-2 border-black border-solid rounded-lg p-1 m-0" cols="20" rows="10" placeholder="4, 6, -2&#10;6, 13, 1&#10;-2, 1, 6"></textarea>
                            </div>  
                        </div>
                    
                        <div>
                            <div>
                                <label for="inputB">Pravá strana matice:</label>
                            </div>
                            <div>
                                <textarea name="inputB" id="inputB" class="border-2 border-black border-solid rounded-lg p-1 m-0" cols="20" rows="10" placeholder="-6&#10;-5&#10;9"></textarea>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="m">Maximálny počet iterácii:</label>        
                            </div>
                            <div>
                                <select name="m" id="m" class="border-2 border-black border-solid rounded-lg p-1 m-0">
                                    @for ($i = 1; $i < 11; $i++)
                                        <option value = {{$i}}>{{$i}}</option>
                                    @endfor 
                                </select>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="dispersion">Zastavovacie kriterium:</label>
                            </div>
                            <div>
                                <input type="number" class="border-2 border-solid border-black rounded p-1 w-full" id="dispersion">
                            </div>
                        </div>
                    
                        <div>
                            <div>
                                <label for="r">Presnosť zaokrúhľovania:</label>        
                            </div>
                            <div>
                                <select name="r" id="r" class="border-2 border-black border-solid rounded-lg p-1 m-0">
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
                <table id="table">
                </table>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/pages/jacobi.js') }}"></script>

</html>