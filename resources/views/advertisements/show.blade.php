@extends('layouts.app')

@section('content')

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            {{--<div class="panel panel-default">--}}
                <div class="panel-body">
                    <div style="clear: both">
                        <h1 style="float: left">{{ $advertisement->title}}
                        </h1>
                        <h1 style="float: right">{{$advertisement->price}}
                        </h1>
                    </div>
                </div>

                @if($images != null)
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
                @else
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="{{ route('image','default.jpg')}}" style="height: 30em; width:50em;">
                            </div>
                            {{--@foreach($images as $image)--}}
                                {{--<div class="item">--}}
                                    {{--<img src="{{ route('image',$image->file)}}" style="height: 30em; width:50em;">--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
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
                @endif

                </br>

                <div style="clear: both">
                    <h3> {{$advertisement->description}}</h3>
                </div>

                </br>

                <div style="clear: both">
                    <h3 style="float: left"><small>Лице за контакт:</small>
                        {{ $author->name}}
                    </h3>
                    <h3 style="float: right"><small>Телефонски број:</small>
                        0{{ $author->number}}
                    </h3>
                </div>
                <div style="clear: both">
                    <h3 style="float: left"><small>Тип на оглас:</small>
                        @if($advertisement->type == 'prodava')
                        Се продава
                        @else
                            Се издава
                        @endif
                    </h3>
                    <h3 style="float: right"><small>Адреса:</small>
                        {{  $advertisement->address }}
                    </h3>
                </div>
                <div style="clear: both">
                    <h3 style="float: left"><small>Категорија на оглас:</small>
                        @if($advertisement->category == 'kukja')
                            Куќа @endif
                        @if($advertisement->category == 'stan')
                            Стан @endif
                        @if($advertisement->category == 'apartman')
                            Апартман @endif
                        @if($advertisement->category == 'soba')
                            Соба @endif
                        @if($advertisement->category == 'vikendica')
                            Викендица @endif
                    </h3>
                    <h3 style="float: right"><small>Град:</small>
                        @if($advertisement->town == 'skopje')
                            Скопје @endif
                        @if($advertisement->town == 'bitola')
                            Битола @endif
                        @if($advertisement->town == 'ohrid')
                            Охрид @endif
                        @if($advertisement->town == 'prilep')
                            Прилеп @endif
                        @if($advertisement->town == 'stip')
                            Штип @endif
                    </h3>
                </div>

                <div style="clear: both">
                    <h3 style="float: right;"> <small>Поседува гаража</small>  @if($advertisement->garage == 'TRUE')
                            <i>Да</i> @else <i>-</i>@endif </h3>
                    <h3 style="float: left;"><small>Реновиран </small>  @if($advertisement->renovated == 'TRUE')
                            <i>Да</i> @else <i>-</i>@endif </h3>
                </div>

                <div style="clear: both">
                    <h3 style="float: right;"> <small>Наместен</small>  @if($advertisement->namesten == 'TRUE')
                            <i>Да</i> @else <i>-</i>@endif </h3>
                    <h3 style="float: left;"><small>Нова градба </small>  @if($advertisement->new == 'TRUE')
                            <i>Да</i> @else <i>-</i>@endif </h3>
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
                        <small><cite>{{$comment->getAuthor()->name}}</cite></small>
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



    {{--</div>--}}

@endsection
