@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><a href="{{ route('admin.advertisements') }}">Преглед на сите огласи</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
