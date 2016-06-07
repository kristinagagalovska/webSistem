@extends('layouts.app')
@section('content')

    <form method="GET" action="{{ route('advertisement.create') }}">
        <input type="hidden" name="_method" value="CREATE" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Внеси оглас</button>
    </form>

    <form method="POST" action="{{ route('advertisement.search') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <label>Вид на оглас:</label>
        <select name="type">
            <option>Избери</option>
            <option value="prodava">Се продава</option>
            <option value="iznajmuva">Се изнајмува</option>
        </select>

        <label>Категорија:</label>
        <select name="category">
            <option>Избери</option>
            <option value="apartman">Апартман</option>
            <option value="kukja">Куќа/Вила</option>
            <option value="stan">Стан</option>
            <option value="soba">Соба</option>
            <option value="vikendica">Викендица</option>
        </select>

        <label>Општина:</label>
        <select name="town">
            <option>Избери</option>
            <option value="skopje">Скопје</option>
            <option value="bitola">Битола</option>
            <option value="ohrid">Охрид</option>
            <option value="prilep">Прилеп</option>
            <option value="stip">Штип</option>
        </select>

        <button type="submit">Пребарај.</button>
    </form>


    @foreach($advertisements as $advertisement)

    <p><label>Наслов:</label><a href="{{ route('advertisement.view', $advertisement->id) }}">{{ $advertisement->title }}</a></p>
    <p><label>Опис:</label>{{ $advertisement->description}}</p>

    @if($loggedUserId == $advertisement->user_id)

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
    @endif

    @endforeach
    @endsection