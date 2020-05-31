
@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center space-y-4 mt-6">
      <details>
        <summary>Feladat Leírás</summary>
        <p>{{$solution->task->description}}</p>
      </details>
      <p>
          Megoldás: {{$solution->solution}}
      </p>

      @if ($solution->filePath != NULL)
      <p>
        <a href="/solutions/{{$solution->id}}/file">Fájl letöltése</a>
      </p>
      @else
      <p>Nincs beadott fájl</p>
      @endif
  </div>

    <form class="w-full max-w-lg mx-auto" method="POST" action="{{ route('rate-solution', $solution->id) }}">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label required class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="rating">
                    Pontérték
                </label>
            <input value="{{ old('rating') ?? $solution->rating }}" autocomplete="rating" min="0" max="{{$solution->task->rating}}" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('rating') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="rating" type="number" name="rating" required placeholder="2">
                @error('rating')
                    <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="review">
                Vélemény
            </label>
            <textarea autocomplete="review" class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200 @error('review') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 min-h-32" id="review" type="number" name="review" placeholder="Kezdjen el gépelni..">{{ old('review') ?? $solution->review }}</textarea>
            @error('review')
                <p role="alert" class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-8" type="submit">
            Értékel
        </button>
    </form>
@endsection
