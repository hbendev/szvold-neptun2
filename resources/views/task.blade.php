@extends('layouts.app')

@section('content')
<task-page usertype={{ Auth::user()->type }} userid={{ Auth::user()->id }} taskid={{ $task }}></task-page>
@endsection
