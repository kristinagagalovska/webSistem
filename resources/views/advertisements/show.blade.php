@extends('layouts.app')

@section('content')

    <p><label>Тип на оглас:</label>{{ $advertisement->type}}</p>
    <p><label>Категорија:</label>{{ $advertisement->category}}</p>

    <p><label>Наслов:</label>{{ $advertisement->title}}</p>
    <p><label>Опис:</label>{{ $advertisement->description}}</p>
    <p><label>Адреса:</label>{{ $advertisement->address}}</p>
    <p><label>Град:</label>{{ $advertisement->town}}</p>
    <p><label>Цена:</label>{{ $advertisement->price}}</p>

    @foreach($images as $image)
    <img src="{{ route('image', $image->file) }}">
    @endforeach

    <form method="GET" action="{{ route('index') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Почетна</button>
    </form>


    @foreach ($comments as $comment)
    <p>{{ $comment->content }}</p>
    @endforeach

    @if($loggedUserId != 0)
    <form action="{{ route('comment.store', $advertisement->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <br/>
        <dt><p>Add comment:</p></dt>
        <textarea name="content" rows="3" ></textarea></div>
        <dd><button type="submit" class="btn btn-primary">Submit</button></dd>
    </form>
    @endif

@endsection