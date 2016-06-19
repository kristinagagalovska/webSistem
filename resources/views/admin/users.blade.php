@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($users[0])
            @foreach($users as $user)
                @if($user->id != Auth::user()->id)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4><b>{{ $user->name }}</b></h4></div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ route('image', 'avatar.png')}}" style="height:6em; width:5em;">
                                    </div>
                                    <div class="col-md-9">
                                        <p>E-mail: <b> {{ $user->email }} </b></p>
                                        <p>Тел.број: <b>{{ $user->number }} </b></p>
                                    <div class="row ">
                                    <div class="col-md-3">
                                        <form method="POST" action="{{route('user.delete', $user->id)}}">
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button class="btn btn-default btn-sm" type="submit">Delete</button>
                                        </form>
                                    </div>
                                    <div class="col-md-3">
                                        <form method="GET" action="{{route('user.edit', $user->id)}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button class="btn btn-default btn-sm" style="width: 150%;">Edit</button>
                                        </form>
                                    </div>
                                        @if($user->isadmin)
                                            <div class="col-md-3">
                                                <form method="POST" action="{{route('user.setAdmin', $user->id) }}">
                                                    <input type="hidden" name="_method" value="PUT" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-sm btn-default" type="submit">Remove Admin</button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <form method="POST" action="{{route('user.setAdmin', $user->id)}}">
                                                    <input type="hidden" name="_method" value="PUT" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-sm btn-default" type="submit">Make Admin</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                 </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection