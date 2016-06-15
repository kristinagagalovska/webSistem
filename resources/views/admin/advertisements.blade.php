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
                                                <div class="list-group">
                                                    <a href="{{ route('advertisement.view', $advertisement->id) }}" class="list-group-item">
                                                        <h1 class="list-group-item-heading">{{ $advertisement->title }}</h1>
                                                        <p class="list-group-item-text">{{ $advertisement->description}}</p>
                                                    </a>
                                                </div>
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
