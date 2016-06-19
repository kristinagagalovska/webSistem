@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($advertisements[0])
                @foreach($advertisements as $advertisement)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4><b>{{ $advertisement->title }}</b></h4></div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ route('image', 'default.jpg')}}" style="height:6em; width:5em;">
                                    </div>
                                    <div class="col-md-9">
                                        <p>Тип на оглас: <b> @if($advertisement->type == 'prodava')
                                                    Се продава
                                                @else
                                                    Се издава
                                                @endif </b></p>
                                        <p>Категорија: <b>@if($advertisement->category == 'kukja')
                                                    Куќа @endif
                                                @if($advertisement->category == 'stan')
                                                    Стан @endif
                                                @if($advertisement->category == 'apartman')
                                                    Апартман @endif
                                                @if($advertisement->category == 'soba')
                                                    Соба @endif
                                                @if($advertisement->category == 'vikendica')
                                                    Викендица @endif</b></p>
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <form method="POST" action="{{route('advertisement.delete', $advertisement->id)}}">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button  class="btn btn-default btn-sm" type="submit">Delete</button>
                                                </form>
                                            </div>
                                            <div class="col-md-3">
                                                <form method="GET" action="{{route('advertisement.edit', $advertisement->id)}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-default btn-sm" style="width: 150%;">Edit</button>
                                                </form>
                                            </div>
                                            {{--@if($user->admin)--}}
                                            <div class="col-md-3">
                                                <form method="GET" action="{{route('advertisement.view', $advertisement->id)}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-default btn-sm" type="submit">View</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection