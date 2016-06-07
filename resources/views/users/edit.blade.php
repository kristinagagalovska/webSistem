@extends('layouts.app')

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        </br><input type="hidden" value="{{ csrf_token() }}" name="_token">
        </br><input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
        </br><input type="text" class="form-control" name="number" value="{{ Auth::user()->number }}">
        </br><input type="text" class="form-control" name="isadmin" value="{{ Auth::user()->isadmin }}">
        </br><input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
        </br><input type="password" class="form-control" name="password">
        </br><input type="submit" name="save">
    </form>
@endsection