@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel-body">
                         <form method="GET" action="{{ route('advertisement.create') }}">
                            <input type="hidden" name="_method" value="CREATE" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button class="btn btn-default btn-lg btn-block" type="submit">Внеси оглас</button>
                         </form>
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

                            <button class="btn btn-default" type="submit">Пребарај.</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {{--<div class="row">--}}
            <div class="col-md-8 col-md-offset-2">
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-body">--}}
                        @foreach($advertisements as $advertisement)
                            <div class="list-group">
                                <div class="row">
                                <a href="{{ route('advertisement.view', $advertisement->id) }}" class="list-group-item">
                                    <div class="col-md-3">
                                        <img src="{{ route('image', 'default.jpg')}}" style="height:6em; width:6em;">
                                        </br>
                                        <p> <strong> {{$advertisement->price}} </strong></p>
                                    </div>
                                    <h1 class="list-group-item-heading">{{ $advertisement->title }}</h1>
                                    </br>
                                    <p class="list-group-item-text">{{ $advertisement->description}}</p>
                                    </br>
                                </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection