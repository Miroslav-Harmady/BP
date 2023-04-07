@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-center">
        <div class="w-10/12 md:w-2/6 lg:w-2/6 border-2 border-[#ff7900] rounded-lg">
            <div>
                <div class="bg-[#ff7900] mb-2 pb-1 pl-1">
                    <p class="text-white font-semibold text-lg">
                        Prihlásenie
                    </p>
                </div>
                <div class="flex justify-begin">
                    <form method="POST" action="{{ route('login') }}" class="bg-white ml-10">
                        @csrf
                        <div class="w-max">
                            <div class="flex flex-col lg:flex-row justify-end mb-3">
                                <label for="email" class="mr-2 lg:text-end py-1">Emailová adresa: </label>

                                <div class="">
                                    <input id="email" type="email" class="form-control border-2 border-black rounded-lg p-1 w-full" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="flex flex-col lg:flex-row mb-3 justify-end">
                                <label for="password" class="mr-2 lg:text-end py-1">Heslo: </label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-2 border-black rounded-lg p-1" name="password" required autocomplete="current-password">
                                </div>
                            </div>
                            @error('email')
                                <div class="my-2 text-end">
                                    <p class="text-red-500 font-bold text-base">
                                        Nesprávny email alebo heslo
                                    </p>
                                </div>
                            @enderror
                        </div>
                       
                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="flex mb-2">
                            <div class="space-x-3">
                                <button type="submit" class="bg-white text-[#ff7900] p-1 border-2 rounded-lg font-semibold border-[#ff7900] hover:bg-[#ff7900] hover:text-white">
                                    Prihlásiť sa
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="hover:text-[#ff7900]" href="{{ route('password.request') }}">
                                        Zabudli ste heslo?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
