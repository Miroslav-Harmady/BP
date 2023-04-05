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
        N-C kvadratúrne vzorce - úprava
    </h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <a href="/admin/integral/index" class="justify-self-start">
                <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" >Späť</button>
            </a>
            <form action="{{route('admin.integral.update', ['id' => $item->id])}}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="p-5 border-solid border-2">
                    <div class="grid grid-cols-1 justify-items-center">
                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-begin mb-4">
                            <div>
                                <div>
                                    <label for="function">f(x):</label>
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

                            <div>
                                <div>
                                    <label for="n">Pocet intervalov:</label>
                                </div>
                                <div>
                                    <input type="number" name="n" id="n" class="border-2 border-solid border-black rounded p-1 w-full" placeholder="5" value="{{$item->n}}">
                                </div>
                                @error('n')
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