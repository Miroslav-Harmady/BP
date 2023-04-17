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
        Jacobiho metóda - úprava
    </h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <a href="/admin/jacobi/index" class="justify-self-start">
                <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" >Späť</button>
            </a>
   
            <form action="{{route('admin.jacobi.update', ['id' => $item->id])}}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="p-5 border-solid border-2">
                    <div class="grid grid-cols-1 justify-items-center">
                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-left mb-4">
                            <div>
                                <div>
                                    <label for="matrix">Matica:</label>
                                </div>  
                                <div>
                                    <input type="text" name="matrix" id="matrix" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->left}}">
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
                                    <label for="iterations">Počet iterácii:</label>
                                </div>
                                <div>
                                    <select name="iterations" id="iterations" class="border-2 border-solid border-black rounded p-1 w-full">
                                        @for ($i = 1; $i < 11; $i++)
                                            <option value="{{$i}}" {{$item->iterations == $i ? 'selected' : ''}}>
                                                {{$i}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('iterations')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror   
                            </div>

                            <div>
                                <div>
                                    <label for="dispersion">Zastavovacie kritérium:</label>
                                </div>
                                <div>
                                    <input type="number" name="dispersion" id="dispersion" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="0.001" value="{{$item->dispersion}}">
                                </div>
                                @error('dispersion')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror   
                            </div>

                            <div>
                                <div>
                                    <label for="result">Výsledok X:</label>
                                </div>
                                <div>
                                    <input type="text" name="result" id="result" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="3.2, 7.4, 0.25" value="{{$item->result}}">
                                </div>
                                @error('result')
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