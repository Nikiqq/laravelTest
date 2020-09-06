@extends('layouts.app')

@section('title')
    Список тикетов
@endsection

@section('content')
    <main role="main">
        <h1>Список тикетов</h1>
    </main>
    
    @foreach($tickets as $ticket)
        <div class="alert alert-success">
            <h3>{{$ticket->title}}</h3>
            <p>Статус: {{$ticket->status->name}}</p>
            <p>Автор: {{$ticket->user->name}}</p>
            <a href="{{env('APP_URL')}}/ticket/{{$ticket->id}}">Детальный просмотр</a>
            
            <!-- если админ:            -->

            <form method="post" action="{{env('APP_URL')}}/ticket/{{$ticket->id}}/update">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                @foreach($statuses as $status)
                    <option value="{{$status->id}}" 
                        <?php if($status->id === $ticket->status->id) echo 'selected' ?>>
                        {{$status->name}}
                    </option>
                @endforeach
                </select>

                <button type="submit" class="btn btn-success">Обновить статус</button>
            </form>
        </div>
        
    @endforeach

@endsection