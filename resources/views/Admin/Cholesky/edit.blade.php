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
    <form action="{{route('admin.cholesky.update', ['id' => $item->id])}}" method="POST" class="flex justify-center">
        @csrf
        @method('PUT')
        <div class="w-1/2 p-5 bg-red-400 border-solid border-2">
            <div class="grid grid-cols-1 justify-items-center">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-begin mb-4">
                    <div>
                        <div>
                            <label for="inputLeft">Ľavá strana matice:</label>
                        </div>
                        <div>
                            <input type="text" name="inputLeft" id="inputLeft" value="{{$item->left}}">
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
                            <input type="text" name="inputRight" id="inputRight" value="{{$item->right}}">
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
                                    <option value="{{$i}}" {{$item->approximation == $i ? 'selected' : ''}}>
                                        {{$i}}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        @error('approximation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="resultL">Výsledná L matica:</label>
                        </div>
                        <div>
                            <input type="text" name="resultL" id="resultL" value="{{$item->resultL}}">    
                        </div>
                        @error('resultL')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="resultX">Vektor X:</label>
                        </div>
                        <div>
                            <input type="text" name="resultX" id="resultX" value="{{$item->resultX}}">
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
                            <input type="text" name="resultY" id="resultY"value="{{$item->resultY}}" >
                        </div>
                        @error('resultY')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-green-500 text-center text-white border-solid">Uložiť</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>