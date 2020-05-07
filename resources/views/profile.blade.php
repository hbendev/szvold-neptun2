@extends('layouts.app')


@php
$user = Auth::user()
@endphp

@section('content')
<section>
    <h1 class="text-center text-blue-500 font-bold text-4xl">{{ $user->type == "student" ? "Hallgató" : "Tanár" }} fiók adatok</h1>
    <div class="flex flex-col justify-center items-center space-y-4 mt-6">
        <p>Neved: {{ $user->lastName}} {{ $user->firstName }} </p>
        <p>E-mail: {{ $user->email }}</p>
    </div>
</section>
@endsection
