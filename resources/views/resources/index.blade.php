@extends('layouts.main')
@section('content')
    <div class="container">
        <h1>Список ресурсов</h1>
        <ul>
            @if($resources->isEmpty())
                <p>Ресурсов пока нет.</p>
            @else
                @foreach($resources as $resource)
                    <li>
                        <strong>{{ $resource->title }}</strong> – {{ $resource->description }}
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endsection