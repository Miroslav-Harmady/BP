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
    @include('Includes.adminNavbar')
    <h1 class="text-center text-2xl font-bold my-4">
        LU Rozklad - vytváranie
    </h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <a href="/admin/LURozklad/index" class="justify-self-start">
                <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" >Späť</button>
            </a>
            <form action="{{route('admin.LU.save')}}" method="POST" class="mt-4">
                @csrf
                <div class="p-5 border-solid border-2">
                    <div class="grid grid-cols-1 justify-items-center">
                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:justify-items-start md:justify-items-start  justify-items-center mb-4">
                            <div>
                                <div>
                                    <label for="matrix">Matica:</label>
                                </div>
                                <div>
                                    <input type="text" name="matrix" id="matrix" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="matica v latexu" value="{{$errors->any() ? old('matrix') : '' }}">
                                </div>
                                @error('matrix')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div> 
                           
                            <div>
                                <div>
                                    <label for="resultL">L matica:</label>
                                </div>
                                <div>
                                    <input type="text" name="resultL" id="resultL" placeholder="matica v latexu" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$errors->any() ? old('resultL') : '' }}">
                                </div>
                                @error('resultL')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <div>
                                    <label for="resultL">U matica:</label>
                                </div>
                                <div>
                                    <input type="text" name="resultU" id="resultU" placeholder="matica v latexu" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$errors->any() ? old('resultU') : '' }}">
                                </div>
                                @error('resultU')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                        
                            <div>
                                <div>
                                    <label for="resultX">Vektor X:</label>
                                </div>
                                <div>
                                    <input type="text" name="resultX" id="resultX" placeholder="matica v latexu" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$errors->any() ? old('resultX') : '' }}">
                                </div>
                                @error('resultX')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                        
                            <div>
                                <div>
                                    <label for="resultY">Vektor Y:</label>
                                </div>
                                <div>
                                    <input type="text" name="resultY" id="resultY" placeholder="matica v latexu" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$errors->any() ? old('resultY') : '' }}">
                                </div>
                                @error('resultY')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg">Vytvoriť</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>