<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    @include('Includes.navbar')
    <h1 class="text-center text-2xl font-bold my-4">
        Jacobiho metóda - vytváranie
    </h1>
    <a href="{{route('admin.jacobi.index')}}">
        <button class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg">Späť</button>
    </a>
    <form action="{{route('admin.jacobi.save')}}" method="POST" class="flex justify-center">
        @csrf
        <div class="w-1/2 p-5 border-solid border-2">
            <div class="grid grid-cols-1 justify-items-center">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:justify-items-start md:justify-items-start  justify-items-center  mb-4">
                    <div>
                        <div>
                            <label for="inputLeft">Ľavá strana matice: </label>
                        </div>
                        <div>
                            <input type="text" name="inputLeft" id="inputLeft" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="sem vlozte maticu z latexu" value="{{$errors->any() ? old('inputLeft') : ''}}" class="w-full">
                        </div>
                        @error('inputLeft')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="inputRight">Pravá strana matice:</label>
                        </div>
                        <div>
                            <input type="text" name="inputRight" id="inputRight" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="sem vlozte maticu z latexu" value="{{$errors->any() ? old('inputRight') : ''}}">
                        </div>
                        @error('inputRight')
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
                            <label for="dispersion">Zastavovacie kritérium:</label>
                        </div>
                        <div>
                            <input type="number" name="dispersion" id="dispersion" class="border-2 border-solid border-black rounded p-1 w-full" step="0.001" placeholder="0.001" value="{{$errors->any() ? old('dispersion') : ''}}">
                        </div>
                        @error('dispersion')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div>
                        <div>
                            <label for="iterations">Počet iterácii:</label>
                        </div>
                        <div>
                            <select name="iterations" id="iterations" class="border-2 border-solid border-black rounded p-1 w-full">
                                @for ($i = 1; $i < 11; $i++)
                                    <option value="{{$i}}" {{($errors->any() && (old('iterations') == $i)) ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        @error('iterations')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div>
                        <div>
                            <label for="result">Výsledné X:</label>
                        </div>
                        <div>
                            <input type="text" name="result" id="result" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$errors->any() ? old('result') : ''}}">
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