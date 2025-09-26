# ticket 16


@extends('layouts.app')

@section('content')
    <h1>Merken beginnend met "{{ $letter }}"</h1>

    @if($brands->isEmpty())
        <p>Geen merken gevonden voor deze letter.</p>
    @else
        <ul>
            @foreach($brands as $brand)
                <li>
                    <a href="{{ url('/brands/' . $brand->slug) }}">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
