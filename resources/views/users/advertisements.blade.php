@extends('layouts.app')
@section('content')

    @foreach($advertisements as $advertisement)

        <p><label>Наслов:</label><a href="{{ route('advertisement.view', $advertisement->id) }}">{{ $advertisement->title }}</a></p>
        <p><label>Опис:</label>{{ $advertisement->description}}</p>
    @endforeach
@endsection