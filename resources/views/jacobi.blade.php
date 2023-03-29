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
    <div class="flex justify-center mt-4 ">
        <div class="w-3/4 text-lg bg-white pb-4">
            <h1 class="text-center text-3xl font-bold">
                Jacobiho metóda
            </h1>
            <p class="text-2xl text-red-500 font-bold">
                tu neviem či bude treba aj ten úvod
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

            <p>
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
        </div>
    </div>

    <div class="">
        <div class="flex justify-center">
            <div class="w-3/4 relative p-2 bg-white">
                <div class="grid grid-cols-1 z-3 pb-4">
                    <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-2 justify-items-center mb-4" >
                        <div>
                            <div>
                                <label for="inputA">Ľavá strana matice:</label>        
                            </div>
                            <div>
                                <textarea name="inputA" id="inputA" cols="20" rows="10"></textarea>
                            </div>  
                        </div>
                    
                        <div>
                            <div>
                                <label for="inputB">Pravá strana matice:</label>
                            </div>
                            <div>
                                <textarea name="inputB" id="inputB" cols="20" rows="10"></textarea>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="m">Maximálny počet iterácii:</label>        
                            </div>
                            <div>
                                <select name="m" id="m">
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
                                <input type="number" id="dispersion">
                            </div>
                        </div>
                    
                        <div>
                            <div>
                                <label for="r">Presnosť zaokrúhľovania:</label>        
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
                        <button class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg" onclick="compute()">compute</button>
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
                <table id="table">
                </table>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/pages/jacobi.js') }}"></script>

</html>