@extends('layouts.app')

@section('title')
    Создать новый тикет
@endsection

@section('content')
    <main role="main">
        <h1>Форма создания нового тикета</h1>
    </main>
    
    <form method="post" action="{{env('APP_URL')}}/create">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <textarea name="title" id="title" class="form-control" placeholder="Введите заголовок тикета"></textarea><br>
        <button type="submit" class="btn btn-success">Создать тикет</button>
    </form>
    

@endsection