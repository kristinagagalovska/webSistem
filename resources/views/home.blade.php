@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @foreach($advertisements as $advertisement)
                                        <div>
                                            <a href="{{ route('advertisement.view', $advertisement->id) }}" class="list-group-item">
                                                <h1 class="list-group-item-heading">{{ $advertisement->title }}</h1>
                                                <p class="list-group-item-text">{{ $advertisement->description}}</p>
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                                <form method="GET" action="{{ route('advertisement.edit', $advertisement->id) }}">
                                                    <input type="hidden" name="_method" value="EDIT" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button type="submit" class="btn btn-danger" >Измени оглас</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 col-md-8">
                                                <form method="POST" action="{{ route('advertisement.delete', $advertisement->id) }}">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button type="submit" class="btn btn-default">Избриши оглас</button>
                                                </form>
                                            </div>
                                        </div></br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
