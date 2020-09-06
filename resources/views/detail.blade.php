@extends('layout')

@section('title')
    Тикет номер {{$ticket->id}}
@endsection

@section('main_content')
    <main role="main">
        <h1>Тикет №{{$ticket->id}}: {{$ticket->title}}</h1>
    </main>
    
    @foreach($messages as $message)
        <div class="alert alert-success">
            <p>
                {{$message->body}}
            </p>
            <p>Автор: {{$message->user->name}}</p>
            @foreach($message->files as $file)
                <p>
                    <a href="{{env('STORAGE_URL')}}/upload/{{$file->name}}" target="_blank">{{$file->name}}</a>
                </p>
            @endforeach
        </div>
    @endforeach
    
    <h3>Добавить сообщение</h3>
    
    <form method="post" action="{{env('APP_URL')}}/ticket/{{$ticket->id}}/add" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <textarea name="body" id="body" class="form-control" placeholder="Введите сообщение"></textarea><br>
        <input type="file" multiple name="file[]">
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    

@endsection