@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-center">
        <div  class="w-10/12 md:w-2/6 lg:w-2/6 border-2 border-[#ff7900] rounded-lg">
            <div>
                <div class="bg-[#ff7900] mb-2 pb-1 pl-1">
                    <p class="text-white font-semibold text-lg">
                        Resetovanie hesla
                    </p>
                </div>
                <div class="flex justify-begin">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <form method="POST" action="{{ route('password.email') }}" class="bg-white ml-10">
                        @csrf
                        <div  class="w-max">
                            <div class="flex flex-col lg:flex-row justify-end mb-3">
                                <label for="email" class="mr-2 lg:text-end py-1">Emailová adresa: </label>
                                <div class="">
                                    <input id="email" type="email" class="form-control border-2 border-black rounded-lg p-1 w-full" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            @error('email')
                                <div class="my-2 text-end">
                                    <p class="text-red-500 font-bold text-base">
                                        Daný email nespoznávame
                                    </p>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-white text-[#ff7900] p-1 border-2 rounded-lg font-semibold border-[#ff7900] hover:bg-[#ff7900] hover:text-white">
                                    Odoslať link pre obnovu hesla
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
