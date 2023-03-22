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

    <form action="{{route('admin.LU.save')}}" method="POST" class="flex justify-center">
        @csrf
        <div class="w-1/2 p-5 bg-red-400 border-solid border-2">
            <div class="grid grid-cols-1 justify-items-center">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-begin mb-4">
                    <div>
                        <div>
                            <label for="inputLeft">Ľavá strana matice:</label>
                        </div>
                        <div>
                            <input type="text" name="inputLeft" id="inputLeft" placeholder="sem vlozte maticu z latexu" value="{{$errors->any() ? old('inputLeft') : '' }}">
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
                            <input type="text" name="inputRight" id="inputRight" placeholder="sem vlozte maticu z latexu" value="{{$errors->any() ? old('inputRight') : '' }}">
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
                            <select name="approximation" id="approximation">
                                @for ($i = 2; $i < 5; $i++)
                                <option value={{$i}} {{($errors->any() && old('approximation') == $i) ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        @error('approximation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <div>
                            <label for="resultL">L matica:</label>
                        </div>
                        <div>
                            <input type="text" name="resultL" id="resultL" value="{{$errors->any() ? old('resultL') : '' }}">
                        </div>
                        @error('resultL')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <div>
                            <label for="resultL">U matica:</label>
                        </div>
                        <div>
                            <input type="text" name="resultU" id="resultU" value="{{$errors->any() ? old('resultU') : '' }}">
                        </div>
                        @error('resultU')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div>
                        <div>
                            <label for="resultX">Vektor X:</label>
                        </div>
                        <div>
                            <input type="text" name="resultX" id="resultX" value="{{$errors->any() ? old('resultX') : '' }}">
                        </div>
                        @error('resultX')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div>
                        <div>
                            <label for="resultY">Vektor Y:</label>
                        </div>
                        <div>
                            <input type="text" name="resultY" id="resultY" value="{{$errors->any() ? old('resultY') : '' }}">
                        </div>
                        @error('resultY')
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