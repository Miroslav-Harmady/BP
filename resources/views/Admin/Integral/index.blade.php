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
    <h1 class="text-2xl align-middle"> Integral</h1>
    <button><a href="{{route('admin.integral.create')}}">vytvor</a></button>

    <div class="bg-green-300 border-2 w-1/2 border-black border-solid m-4" >
        <p>
            <span class="math display">
                $$\begin{pmatrix}a & b \\c & d\end{pmatrix}$$
            </span>
        </p>
    </div>

    @forelse ($collection as $item)
        <div class="p-2 m-2 border-solid border-2 border-black" >
            <p>
                <span class="math display">
                    $${{$item->function}}$$
                </span>
            </p>
            <button><a href="{{route('admin.integral.edit', ['id' => $item->id])}}">úprava</a></button>

            <form action="{{route('admin.integral.delete', ['id' => $item->id])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" >Vymazať</button>
            </form>
        </div>
    @empty
        <div class="bg-red-300 ">
            <p>
                Zatial ste nepridali ziadne prikaldy tohto typu
            </p>
        </div>
    @endforelse
</body>
</html>