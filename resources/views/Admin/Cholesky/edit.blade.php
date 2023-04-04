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
        Choleskyho rozklad - úprava
    </h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <a href="/admin/cholesky/index" class="justify-self-start">
                <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" >Späť</button>
            </a>

            <form action="{{route('admin.cholesky.update', ['id' => $item->id])}}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="p-5 border-solid border-2">
                    <div class="grid grid-cols-1 justify-items-center">
                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:justify-items-start md:md:justify-items-start lg:md:justify-items-center mb-4">
                            <div>
                                <div>
                                    <label for="inputLeft">Ľavá strana matice:</label>
                                </div>
                                <div>
                                    <input type="text" name="inputLeft" id="inputLeft" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->left}}">
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
                                    <input type="text" name="inputRight" id="inputRight" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->right}}">
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
                                    <input type="text" name="resultL" id="resultL" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->resultL}}">    
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
                                    <input type="text" name="resultX" id="resultX" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->resultX}}">
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
                                    <input type="text" name="resultY" id="resultY" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->resultY}}" >
                                </div>
                                @error('resultY')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg">Uložiť</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>