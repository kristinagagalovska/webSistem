@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <h3>
                    <form method="POST" action="{{ route('advertisement.search') }}" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <select name="type">
                        <option>Избери</option>
                        <option value="prodava">Се продава</option>
                        <option value="iznajmuva">Се изнајмува</option>
                    </select>
                    <select name="category">
                        <option>Избери</option>
                        <option value="apartman">Апартман</option>
                        <option value="kukja">Куќа/Вила</option>
                        <option value="stan">Стан</option>
                        <option value="soba">Соба</option>
                        <option value="vikendica">Викендица</option>
                    </select>
                    <select name="town">
                        <option>Избери</option>
                        <option value="skopje">Скопје</option>
                        <option value="bitola">Битола</option>
                        <option value="ohrid">Охрид</option>
                        <option value="prilep">Прилеп</option>
                        <option value="stip">Штип</option>
                    </select>
                    <button class="btn btn-default"  type="submit"> Пребарај.</button>
                </form>
                </h3>
            </div>
            <div class="col-md-12 col-md-offset-1">
                <img src="{{ route('image','mk.jpg')}}" class="img-responsive" alt="Cinque Terre" width="800" height="900">
            </div>
        </div>
    </div>
@endsection




{{--<div class="container">--}}
    {{--<div class="jumbotron">--}}
        {{--<h1>My First Bootstrap Page</h1>--}}
        {{--<p>Resize this responsive page to see the effect!</p>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
        {{--<div class="col-sm-4">--}}
            {{--<h3>Column 1</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>--}}
            {{--<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>--}}
        {{--</div>--}}
        {{--<div class="col-sm-4">--}}
            {{--<h3>Column 2</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>--}}
            {{--<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>--}}
        {{--</div>--}}
        {{--<div class="col-sm-4">--}}
            {{--<h3>Column 3</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>--}}
            {{--<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{----}}
{{--</html>--}}