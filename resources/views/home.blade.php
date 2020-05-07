@extends('layouts.app')

@section('content')
<home-page usertype={{ Auth::user()->type }} userid={{ Auth::user()->id }}></home-page>
@endsection
