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

    @if($images != null)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{ route('image',$images[0]->file)}}" style="height: 30em; width:50em;">
                                </div>
                                @foreach($images as $image)
                                <div class="item">
                                    <img src="{{ route('image',$image->file)}}" style="height: 30em; width:50em;">
                                </div>
                                @endforeach

                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

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