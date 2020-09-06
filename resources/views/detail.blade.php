@extends('layout')

@section('title')
    Тикет номер {{$ticket->id}}
@endsection

@section('main_content')
    <main role="main">
        <h1>{{$ticket->id}}: {{$ticket->title}}</h1>
    </main>
    
    @foreach($messages as $message)
        <div class="alert alert-success">
            <p>
                {{$message->body}}
            </p>
            <p>Автор: {{$message->user->name}}</p>
            @foreach($message->files as $file)
                <p>
                    <a href="upload/{{$file->name}}">{{$file->name}}</a>
                </p>
            @endforeach
        </div>
    @endforeach

@endsection