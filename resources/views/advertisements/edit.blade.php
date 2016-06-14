@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> </h3>
                    </div>
                    <div class="panel-body">
                    <form class="form-horizontal" action="{{route('advertisement.update', $advertisement->id)}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <fieldset>

                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">Вид на оглас</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="type" name="type">
                                        <option disabled>Избери</option>
                                        <option value="prodava"  @if($advertisement->type == "prodava") selected @endif>Се продава</option>
                                        <option value="iznajmuva" @if($advertisement->type == "iznajmuva") selected @endif>Се изнајмува</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">Категорија</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="category" name="category">
                                        <option selected disabled name>Избери</option>
                                        <option value="apartman" @if($advertisement->category == "apartman") selected @endif>Апартман</option>
                                        <option value="kukja" @if($advertisement->category == "kukja") selected @endif>Куќа/Вила</option>
                                        <option value="stan" @if($advertisement->category == "stan") selected @endif>Стан</option>
                                        <option value="soba" @if($advertisement->category == "soba") selected @endif>Соба</option>
                                        <option value="vikendica" @if($advertisement->category == "vikendica") selected @endif>Викендица</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputTitle" class="col-lg-2 control-label">Наслов</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $advertisement->title }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Опис</label>
                                <div class="col-lg-10">
                                    <textarea name="description" class="form-control" rows="3" id="textArea">{{ $advertisement->description }}</textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputTitle" class="col-lg-2 control-label">Адреса</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $advertisement->address }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">Општина</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="category" name="town">
                                        <<option selected disabled name>Избери</option>
                                        <option value="skopje" @if($advertisement->town == "skopje") selected @endif>Скопје</option>
                                        <option value="bitola" @if($advertisement->town == "bitola") selected @endif>Битола</option>
                                        <option value="ohrid" @if($advertisement->town == "ohrid") selected @endif>Охрид</option>
                                        <option value="prilep" @if($advertisement->town == "prilep") selected @endif>Прилеп</option>
                                        <option value="stip" @if($advertisement->town == "stip") selected @endif>Штип</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDescription" class="col-lg-2 control-label">Цена</label>
                                <div class="col-lg-10">
                                    <input name="price" class="form-control" type="text" id="price" value="{{ $advertisement->price }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Паркин/Гаража</label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="garage" id="optionsRadios1" value=FALSE>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Реновиран</label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="renovated" id="optionsRadios1" value=FALSE >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Нова градба</label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="new" id="optionsRadios1" value=FALSE >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Наместен</label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="namesten" id="optionsRadios1" value=FALSE >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">Прикачи слики:</label>
                                <div class="col-lg-10">
                                @foreach($images as $image)
                                    <img src="{{  route('image', $image->file) }}" height="200" width="200">
                                @endforeach

                                <input type="file" name="file[]" multiple/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Откажи</button>
                                    <button type="submit" name="store" class="btn btn-danger">Додади оглас</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    {{--<label>Наслов:</label>--}}


    {{--<label>Опис:</label>--}}


    {{--<label>Вид на оглас:</label>--}}
    {{--<select name="type">--}}
        {{----}}
    {{--</select></br>--}}

    {{--<label>Категорија:</label>--}}
    {{--<select name="category">--}}
        {{----}}
    {{--</select></br>--}}

    {{--<label>Адреса:</label>--}}
    {{--<input name="address" type="text" value="{{ $advertisement->address }}"/></br>--}}

    {{--<label>Општина:</label>--}}
    {{--<select name="town">--}}
        {{----}}
    {{--</select></br>--}}

    {{--<label>Внеси цена</label>--}}
    {{--<input name="price"  type="text" value="{{ $advertisement->price }}"/> </br>--}}

    {{--<label>Дополнителни информации:</label>--}}
    {{--<label>Паркинг/Гаража:</label><input type="checkbox" name="garage" value=FALSE/></br>--}}
    {{--<label>Реновиран:</label><input type="checkbox" name="renovated" value=FALSE/></br>--}}
    {{--<label>Нова градба:</label><input type="checkbox" name="new" value=FALSE/></br>--}}
    {{--<label>Наместен:</label><input type="checkbox" name="namesten" value=FALSE/></br>--}}


    {{--@foreach($images as $image)--}}
    {{--<img src="{{  route('image', $image->file) }}">--}}
    {{--@endforeach--}}

    {{--<input type="file" name="file[]" multiple/></br>--}}

    {{--<button type="submit" name="store">Додади оглас.</button>--}}
{{--</form>--}}
@endsection
