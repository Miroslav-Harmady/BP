<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
 @include('Includes.navbar')
    <div class="flex justify-center">
        <div class="w-3/4">
            <h1 class="text-3xl font-bold text-center"> LU rozklad</h1>
            <div class="flex justify-between">
                <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" ><a href="/admin/index">späť</a></button>
                <button class="bg-white border-2 border-solid border-[#ff7900] text-[#ff7900] p-2 rounded-lg  font-semibold hover:bg-[#ff7900] hover:text-white hover:shadow-lg" ><a href="{{route('admin.LU.create')}}">vytvor</a></button>    
            </div>

            @forelse ($collection as $item)
                <div class="p-2 m-2 border-solid border-2 border-black flex justify-between items-center" >
                    <p>
                        <span class="math display">
                            \({{$item->left}}\)
                        </span>
                    </p>
                    <button><a href="{{route('admin.LU.edit', ['id' => $item->id])}}">úprava</a></button>

                    <form action="{{route('admin.LU.delete', ['id' => $item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-500 bg-white font-semibold p-1 border-2 border-solid border-red-500 rounded-lg hover:bg-red-500 hover:text-white " >Vymazať</button>
                    </form>
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