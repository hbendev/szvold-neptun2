@extends('layouts.app')

@section('content')
<subject-page usertype={{ Auth::user()->type }} userid={{ Auth::user()->id }} subjectid={{ $subject }}></subject-page>
@endsection
