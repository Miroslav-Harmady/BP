<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_CHTML"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
   @include('Includes.adminNavbar')
    <div class="flex justify-center">
        <div class="w-3/4">
            <h1 class="text-3xl font-bold text-center"> Numerické riešenie integrálov</h1>
            <div class="flex justify-between px-2 mb-6">
                <a href="/admin">
                    <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" >Späť</button>
                </a>
                <a href="{{route('admin.integral.create')}}">
                    <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" >Vytvor</button>
                </a>
            </div>

            @forelse ($collection as $item)
                <div class="p-2 m-2 border-b-2 border-[#ff7900] flex justify-between items-center" >
                    <p>
                        \({{$item->function}}\)
                    </p>
                    <div class="flex flex-row space-x-4">
                        <a href="{{route('admin.integral.edit', ['id' => $item->id])}}" class="p-1 font-semibold text-blue-500 border-2 border-blue-500 rounded-lg hover:text-white hover:bg-blue-500  "><button>Úprava</button></a>

                        <form action="{{route('admin.integral.delete', ['id' => $item->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500 bg-white font-semibold p-1 border-2 border-solid border-red-500 rounded-lg hover:bg-red-500 hover:text-white ">Vymazať</button>
                        </form>
                    </div>
                    
                </div>
            @empty
                <div class="m-2 bg-white text-red-500 text-center border-2 border-red-500 text-xl font-bold rounded-2xl p-1">
                    <p>
                        Zatiaľ ste nepridali žiadne príklady tohto typu
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>