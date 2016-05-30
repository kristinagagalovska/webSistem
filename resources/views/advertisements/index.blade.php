@foreach($advertisements as $advertisement)
    <p><label>Наслов:</label>{{$advertisement->title}}</p>
    <p><label>Опис:</label>{{$advertisement->description}}</p>
    </br>
@endforeach