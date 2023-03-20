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

    <form action="{{route('admin.newton.save')}}" method="POST" class="flex justify-center">
        @csrf
        <div class="w-1/2 p-5 bg-red-400 border-solid border-2">
            <div class="grid grid-cols-1 justify-items-center">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-begin mb-4">
                    <div>
                        <div>
                            <label for="function">f(x):</label>        
                        </div>
                        <div>
                            <input type="text" name="function" id="function" placeholder="sem vlozte funkciu z latexu" value="{{$errors->any() ? old('function') : ''}}"> 
                        </div>
                        @error('function')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div>
                        <div>
                            <label for="interval">Interval integralu:</label>        
                        </div>
                        <div>
                            <input type="text" name="interval" id="interval" placeholder="1,2" value="{{$errors->any() ? old('interval') : ''}}">
                        </div>
                        @error('interval')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="iterations">Počet iterácii:</label>
                        </div>
                        <div>
                            <select name="iterations" id="iterations">
                                @for ($i = 1; $i < 11; $i++)
                                    <option value="{{$i}}" {{($errors->any() && old('iterations') == $i) ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        @error('iterations')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="approximation">Počet desatinných miest:</label>
                        </div>
                        <div>
                            <select name="approximation" id="approximation">
                                @for ($i = 2; $i < 5; $i++)
                                    <option value="{{$i}}" {{($errors->any() && old('iterations') == $i) ? 'selected' : ''}}>{{$i}}</option>
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
                            <input type="text" step="0.001" name="result" id="result" placeholder="3.2, 7.4, 0.25" value="{{$errors->any() ? old('result') : ''}}">
                        </div>
                        @error('result')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-green-500 text-center text-white border-solid">Vytvoriť</button>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>