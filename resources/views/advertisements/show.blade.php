@extends('layouts.app')

@section('content')

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1><p>{{ $advertisement->title}}</p></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                            GALERIJA
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <label>{{ $advertisement->type}}</label> <label>Цена:</label>{{ $advertisement->price }}</br>
                        <label>{{ $advertisement->address}}</label>
                        <label>{{ $advertisement->town}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <label>{{ $advertisement->description}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><label>{{ $author->name}}</label></h4>
                        <h5><p>{{ $author->number}}</p></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($comments as $comment)
                    <blockquote class="blockquote-reverse">
                        <p>{{ $comment->content }}</p>
                        {{--<small>Someone famous in <cite title="Source Title">Source Title</cite></small>--}}
                    </blockquote>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($loggedUserId != 0)
                    <form action="{{ route('comment.store', $advertisement->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <textarea name="content" rows="3" cols="90"></textarea>
                        </br>
                        <div class="col-md-4 col-md-offset-10">
                        <button type="submit" class="btn btn-default">Коментирај</button>
                            </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection