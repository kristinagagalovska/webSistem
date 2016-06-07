@extends('layouts.app')

@section('content')

    <form role="form" action="{{route('advertisement.store')}}" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <label>Наслов:</label>
        <input type="text" name="title"></br>

        <label>Опис:</label>
        <input name="description" type="text"/></br>

        <label>Вид на оглас:</label>
        <select name="type">
            <option selected disabled name>Избери</option>
            <option value="prodava">Се продава</option>
            <option value="iznajmuva">Се изнајмува</option>
        </select></br>

        <label>Категорија:</label>
        <select name="category">
            <option selected disabled name>Избери</option>
            <option value="apartman">Апартман</option>
            <option value="kukja">Куќа/Вила</option>
            <option value="stan">Стан</option>
            <option value="soba">Соба</option>
            <option value="vikendica">Викендица</option>
        </select></br>

        <label>Адреса:</label>
        <input name="address" type="text"/></br>

        <label>Општина:</label>
        <select name="town">
            <option selected disabled name>Избери</option>
            <option value="skopje">Скопје</option>
            <option value="bitola">Битола</option>
            <option value="ohrid">Охрид</option>
            <option value="prilep">Прилеп</option>
            <option value="stip">Штип</option>
        </select></br>

        <label>Внеси цена</label>
        <input name="price"  type="text"/> </br>

        <label>Дополнителни информации:</label>
        <label>Паркинг/Гаража:</label><input type="checkbox" name="garage" value=FALSE/></br>
        <label>Реновиран:</label><input type="checkbox" name="renovated" value=FALSE/></br>
        <label>Нова градба:</label><input type="checkbox" name="new" value=FALSE/></br>
        <label>Наместен:</label><input type="checkbox" name="namesten" value=FALSE/></br>

        <input type="file" name="file[]" multiple/></br>

        <button type="submit" name="store">Додади оглас.</button>
    </form>

@endsection