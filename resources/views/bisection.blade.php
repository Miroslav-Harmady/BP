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
<body>
    <h1>
        Metóda bisekcie
    </h1>
    <p>
        Metóda bisekcie sa nazýva aj <em>metóda polovičného delenia intervalu</em> a aplikuje sa na problémy formulované v tvare f(x) = 0.
        Predpokladajme, že funkcia f(x) je spojitá na intervale \( I = \langle a, b \rangle\) a má v ňom  práve jeden koreň \(\color{Blue}\alpha\).
        Na začiatok si vyberme \(a_0\) a \(a_0\), ktorých hodnoty \(f(a_0)\) a \(f(b_0)\) majú opačné znamienka. Potom rozdelíme interval mdedzi
        \(a_0\) a \(b_0\) pomocou \(s_1 = (a_0 + b_0)/2\) a vypočítame jeho hodnotu \(f(s_1)\). Pre ďalšiu iterácui si ponecháme \(s_1\) a 
        jednu hodnotu z \(a_0\) alebo \(b_0\), ktorá má opačné znamenko \(f\) v porovnaní s \(f(s_1)\). Pokračujeme v delení intervalu, pokým 
        \(\left| f(s_n) \right| \lt \varepsilon_1 \) alebo \(\left| a_n - b_n \right| \lt \varepsilon_2 \)
    </p>
    <p>
        Metóda bisekcie je jednoduchá, vždy konverguje, ale táto konvergencia je pomalá, nakoľko je založená na delení intervalu. Na druhej strane je jednoduchá na naprogramovanie a dáva odhad chyby v každom kroku.
    </p>
    <h2>
        tu ukazkove priklady ale to sa este dohodneme
    </h2>
    <h2>
        Neriešené príklady na precvičenie.
    </h2>
    @forelse ($collection as $item)
        <p>
            \({{$item->function}}\)
        </p>
    @empty
        <p>
            Zatiaľ nebol k tejto téme priradený žiadny neriešený príklad.
        </p>
    @endforelse
    <br>
    <br>
    <br>
    <div> 
        <div class="flex justify-center">
            <div class="w-1/2 relative p-2 bg-red-200">
                <div>
                    <p>
                        Opytat sa ze ci je rozdiel medzi a = 0, b = 4 a ked je to naopak
                    </p>
                </div>
                <div class="grid grid-cols-1 z-3">
                    <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center mb-4" >
                        
                        <div>
                            <div>
                                <label for="inputF">f(x)=</label>
                            </div>
                            <div>
                                <input type="text" name="inputF" id="function_des" placeholder="x^3-4*x+3" class="border-2 border-black rounded-lg border-solid">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="inputA">a:</label>
                            </div>
                            <div>
                                <input type="number" name="inputA" id="inputA" class="border-2 border-black rounded-lg border-solid">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="inputB">b:</label>
                            </div>
                            <div>
                                <input type="number" name="inputB" id="inputB" class="border-2 border-black rounded-lg border-solid">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="eps">eps:</label>
                            </div>
                            <div>
                                <input type="number" name="eps" min="0" id="eps" class="border-2 border-black rounded-lg border-solid"> 
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="r"> Presnosť zaokrúhľovania:</label>
                            </div>
                            <div>
                                <select id="r">
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button onclick="compute()" id="idk" class="justify-self-center bg-green-500 border-green-700 border-2 border-solid p-2 rounded-lg font-bold text-white hover:bg-green-600 hover:drop-shadow-lg">Vypočítaj</button>
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

            <div id="tester" style="width:600px;height:250px;"></div>
            <table id="resultTable"></table>
    </div>
</body>
<script src="{{ asset('js/pages/bisection.js') }}"></script>
</html>