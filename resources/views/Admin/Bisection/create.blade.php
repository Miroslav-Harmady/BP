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
    <form action="{{route('admin.bisection.save')}}" method="POST" class="flex justify-center">
        <div class="w-1/2 p-5 bg-red-400 border-solid border-2">
            <div class="grid grid-cols-1 justify-items-center">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-begin mb-4">
                    @csrf
                    <div>
                        <div>
                            <label for="function" class="m-2">f(x):</label> 
                        </div>
                        <div>
                            <input type="text" name="function" id="function" placeholder="sem vlozte funkciu z latexu" class="border-2 border-solid border-black rounded p-1 m-2 w-auto" value="{{$errors->any() ? old('function') : '' }}">
                        </div>
                        @error('function')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <div>
                            <label for="interval">Interval:</label>
                        </div>
                        <div>
                            <input type="text" name="interval" id="interval" placeholder="1,2" value="{{$errors->any() ? old('interval') : '' }}"> 
                        </div>
                        @error('interval')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="approximation">Počet desatinných miest:</label>
                        </div>
                        <div>
                            <select name="approximation" id="approximation" value="{{$errors->any() ? old('approximation') : '' }}"> 
                                {{-- toto treba este poriesit lebo sa neuklada hodnota takze nakoniec to asi pojde cez for a nejde to potom ani v choleskym --}}
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                            </select>
                        </div>
                        @error('approximation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                       
                        <div>
                            <label for="dispersion">Zastavovacie kriterium:</label>
                        </div>
                        <div>
                            <input type="number" step="0.001" name="dispersion" id="dispersion" placeholder="0.001" value="{{$errors->any() ? old('dispersion') : '' }}">
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
                            <select name="iterations" id="iterations" value="{{$errors->any() ? old('iterations') : '' }}">
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
                            <label for="result">Výsledok:</label>                                    
                        </div>
                        <div>
                            <input type="text" name="result" id="result" value="{{$errors->any() ? old('result') : '' }}">
                        </div>
                        @error('result')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-green-500 text-center text-white border-solid p-2   ">Vytvoriť</button>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>