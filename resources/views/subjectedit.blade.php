@extends('layouts.app')

@section('content')
<form class="w-full max-w-lg mx-auto" method="POST" action="{{ route('update-subject', $subject->id) }}">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
            Tárgy neve
        </label>
        <input value="{{ $subject->name }}" autocomplete="name" required class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="Valós analízis">
        @error('name')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

        </div>
        <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="identifier">
            Tárgy kódja
        </label>
        <input value="{{ $subject->identifier }}" autocomplete="identifier" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 @error('identifier') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="identifier" name="identifier" type="text" placeholder="IK-">
        <p class="text-gray-600 text-xs italic">Formátuma: IK-SSSNNN</p>
        @error('identifier')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label  required class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="credit">
            Kreditérték
        </label>
        <input value="{{ $subject->credit }}" autocomplete="credit" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('credit') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="credit" type="number" name="credit" required placeholder="2">
        @error('credit')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label  required class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="credit">
            Leírás
        </label>
        <textarea value="{{ $subject->description }}" autocomplete="description" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 min-h-32" id="description" name="description" placeholder="Kezdjen el gépelni.."></textarea>
        @error('description')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-8" type="submit">
        Tárgy módosítása
    </button>
</form>
@endsection
