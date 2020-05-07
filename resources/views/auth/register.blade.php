@extends('layouts.app')

@section('content')
<form class="w-full max-w-lg mx-auto" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastName">
          Vezetéknév
        </label>
        <input value="{{ old('lastName') }}" autocomplete="lastName" required class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('lastName') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="lastName" name="lastName" type="text" placeholder="Nagy">
        @error('lastName')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstName">
          Keresztnév
        </label>
        <input value="{{ old('firstName') }}" autocomplete="firstName" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 @error('firstName') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="firstName" name="firstName" type="text" placeholder="Béla">
        @error('firstName')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label  required class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
          E-mail
        </label>
        <input value="{{ old('email') }}" autocomplete="email" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('email') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="email" required placeholder="nagy@be.la">
        @error('email')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label  required class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
          Jelszó
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('password') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password" name="password" placeholder="******************">
        <p class="text-gray-600 text-xs italic">Legyen minél hosszabb</p>
        @error('password')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_confirmation">
          Jelszó újra
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 @error('password_confirmation') border-red-500 @enderror leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password_confirmation" name="password_confirmation" type="password" required placeholder="******************">
        <p class="text-gray-600 text-xs italic">Figyelj az ujjaidra</p>
        @error('password_confirmation')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="relative">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
            Fiók típusa
        </label>
        <select required class="block appearance-none w-full bg-gray-200 border border-gray-200  @error('type') border-red-500 @enderror text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="type" name="type">
            <option>Diák</option>
            <option>Tanár</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
      @error('type')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-8" type="submit">
        Regisztráció
    </button>
  </form>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
