@extends('layouts.app')
@section('content')

    @foreach($advertisements as $advertisement)

        <p><label>Наслов:</label><a href="{{ route('advertisement.view', $advertisement->id) }}">{{ $advertisement->title }}</a></p>
        <p><label>Опис:</label>{{ $advertisement->description}}</p>

            <form method="GET" action="{{ route('advertisement.edit', $advertisement->id) }}">
                <input type="hidden" name="_method" value="EDIT" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit">Измени оглас</button>
            </form>

            <form method="POST" action="{{ route('advertisement.delete', $advertisement->id) }}">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit">Избриши оглас</button>
            </form>

    @endforeach
@endsection