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
        Bisekcia - úprava
    </h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <a href="/admin/bisection/index" class="justify-self-start">
                <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" >Späť</button>
            </a>
            <form action="{{route('admin.bisection.update', ['id' => $item->id])}}" method="POST" class="mt-4">
                <div class="p-5 border-solid border-2 ">
                    <div class="grid grid-cols-1 justify-items-center">
                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 sm:justify-items-start md:justify-items-start lg:grid-cols-3  justify-items-center mb-4">
                            @csrf
                            @method('PUT')
                            <div>
                                <div>
                                    <label for="function" class="mb-2">f(x):</label>
                                </div>
                                <div>
                                    <input type="text" name="function" id="function" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->function}}">
                                </div>
                                @error('function')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <div>
                                    <label for="interval">Interval:</label>
                                </div>
                                <div>
                                    <input type="text" name="interval" id="interval" class="border-2 border-solid border-black rounded p-1 w-full" value="{{$item->interval}}">
                                </div>
                                @error('interval')
                                    <div class="border-2 border-red-500 rounded-xl p-1 mt-2">
                                        <p class="text-red-500 font-semibold">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                            
                            {{-- <div>
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
                            </div> --}}

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
                                    <label for="result">Výsledok:</label>
                                </div>
                                <div>
                                    <input type="text" name="result" id="result" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="1.2345" value="{{$item->result}}">
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
                            <button type="submit" class="bg-white border-2 border-[#ff7900] text-[#ff7900] border-solid p-2 rounded-lg font-bold hover:bg-[#ff7900] hover:text-white hover:drop-shadow-lg">Uložiť</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>