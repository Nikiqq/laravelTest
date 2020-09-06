@extends('layout')

@section('title')
    Список тикетов
@endsection

@section('main_content')
    <main role="main">
        <h1>Список тикетов</h1>
    </main>
    
    @foreach($items as $item)
        <div class="alert alert-success">
            <h3>{{$item->title}}</h3>
            <p>Статус: {{$item->status}}</p>
            <p>Автор: {{$item->user->name}}</p>
            <a href="{{env('APP_URL')}}/ticket/{{$item->id}}">Детальный просмотр</a>
        </div>
    @endforeach

@endsection