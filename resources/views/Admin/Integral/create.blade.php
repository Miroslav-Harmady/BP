<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
@error('n')
    {{old('n')}}
@enderror
<body>
     @include('Includes.navbar')
    <h1 class="text-center text-2xl font-bold my-4">
        N-C kvadratúrne vzorce - vytváranie
    </h1>
    {{-- Tu asi tiez ten pocet desatinnych miest pojde het takze zmen to asi na grid cols 2 lebo ten posledny tam je potom odveci --}}
    <form action="{{route('admin.integral.save')}}" method="POST" class="flex justify-center">
        <div class="w-1/2 p-5 border-solid border-2">
            <button class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg">
                <a href="{{route('admin.integral.index')}}">Späť</a>
            </button>
            <div class="grid grid-cols-1 justify-items-center">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:justify-items-start md:justify-items-start  justify-items-center mb-4">
                    @csrf
                    <div>
                        <div>
                            <label for="function">f(x):</label>
                        </div>
                        <div>
                            <input type="text" name="function" id="function" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="sem vlozte funkciu z latexu" value="{{$errors->any() ? old('function') : '' }}">
                        </div>
                        @error('function')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="interval">Interval integralu: </label>
                        </div>
                        <div>
                            <input type="text" name="interval" id="interval" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="1,2" value="{{$errors->any() ? old('interval') : '' }}">
                        </div>
                        @error('interval')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="n">Počet intervalov:</label>
                        </div>
                        <div>
                            <input type="number" name="n" id="n" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="5" value="{{$errors->any() ? old('n') : '' }}">
                        </div>
                        @error('n')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="approximation">Počet desatinných miest:</label>
                        </div>
                        <div>
                            <select name="approximation" id="approximation" class="border-2 border-solid border-black rounded p-1 w-full">
                                @for ($i = 2; $i < 5; $i++)
                                    <option value="{{$i}}" {{($errors->any() && (old('approximation') == $i)) ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        @error('approximation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div>
                        <div>
                            <label for="result">Výsledok:</label>
                        </div>
                        <div>
                            <input type="text" name="result" id="result" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="3.2, 7.4, 0.25" value="{{$errors->any() ? old('result') : '' }}">
                        </div>
                        @error('result')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg">Vytvoriť</button>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>