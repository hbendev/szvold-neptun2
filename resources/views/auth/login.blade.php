@extends('layouts.app')

@section('content')
<form class="container mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Email-cím
    </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="email" id="email" type="email" placeholder="sfsdl@elte.ik.hu">
    @error('email')
        <p class="text-red-500 text-xs italic alert" role="alert">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Jelszó
    </label>
    <input class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************">
    @error('password')
        <p class="text-red-500 text-xs italic" role="alert">{{ $message }}</p>
    @enderror

    </div>

    <div class="form-check">
        <label class="md:w-2/3 block text-gray-500 font-bold" for="remember">
        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <span class="text-base">
            Emlékezz rám
        </span>
        </label>
    </div>

    <div class="flex items-center justify-between">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Belépés
    </button>
    </div>
</form>
<p class="text-center text-gray-500 text-xs">
    &copy;2020 Neptun 2
</p>
@endsection
