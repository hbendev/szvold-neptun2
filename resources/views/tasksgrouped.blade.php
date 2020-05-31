@extends('layouts.app')

@section('content')
    @foreach ($groups as $group)
<h1></h1>
<h1 class="text-center text-blue-500 font-bold text-4xl">
    {{$group[0]->subject->name}} - {{$group[0]->subject->identifier}}
</h1>

<table class="text-left w-full border-collapse container mx-auto mt-8">
  <th
  class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
  text-grey-600 border-b border-gray-400">
  Név
</th>
<th
  class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
  text-grey-600 border-b border-gray-400">
  Pontszám
</th>
<th
  class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
  text-grey-600 border-b border-gray-400">
  Akciók
</th>
</tr>
</thead>
<tbody>
@foreach ($group as $task)
    <tr
    class="hover:bg-gray-300">
    <td class="py-4 px-6 border-b border-gray-400">{{$task->name}}</td>
    <td class="py-4 px-6 border-b border-gray-400">{{$task->points}}</td>
    <td class="py-4 px-6 border-b border-gray-400">
        <a href="{{'/tasks/' . $task->id }}">
        <button
            class="text-gray-200 font-bold py-1 px-3 rounded text-xs
            bg-blue-400 hover:bg-blue-600">
            Beadás
        </button>
        </a>
    </td>
    </tr>

@endforeach
</tbody>
</table>
    @endforeach
@endsection
