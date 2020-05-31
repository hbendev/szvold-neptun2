@extends('layouts.app')

@section('content')
<form class="w-full max-w-lg mx-auto" method="POST" action="{{ route('taskCreate', $task->id) }}">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
            Feladat neve
        </label>
        <input value="{{ $task->name }}" autocomplete="name" required class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="Első beadandó">
        @error('name')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

        </div>
        <div class="w-full md:w-1/2 px-3">
            <label required class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="points">
                Pontérték
            </label>
            <input value="{{ $task->points }}" autocomplete="points" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('points') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="points" type="number" name="points" required placeholder="2">
            @error('points')
                <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="from">
            Kezdés
        </label>
        <input value="{{ $task->from }}" autocomplete="from" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('from') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="from" name="from" type="datetime-local">
        @error('from')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="to">
                Határidő
            </label>
            <input value="{{ $task->to }}" autocomplete="to" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('to') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="to" type="datetime-local" name="to">
            @error('to')
                <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label required class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
            Leírás
        </label>
        <textarea value="{{ $task->description }}" autocomplete="description" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 min-h-32" id="description" type="number" name="description" placeholder="Kezdjen el gépelni.."></textarea>
        @error('description')
            <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-8" type="submit">
        Feladat kiírása
    </button>
</form>
@endsection
