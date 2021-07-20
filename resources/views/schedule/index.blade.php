@extends('templates.main')


@section('name', $_SESSION['name'])
    
    


@section('title','Usuario')

@section('content')
    <div class="all-cards">
        @foreach ($events as $event)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{ date('d/m/Y', strtotime($event->date))}}</h5>
                    <p>{{$event->name}}</p>
                    <p class="card-text">{{$event->description}}</p>
                    <p>Endereço: {{$event->adress}}</p>
                    <a href="/schedule/{{$event->id}}" class="card-link btn-edit">Editar</a>
                    <form class="form-delete"action="/schedule/delete/{{$event->id}}" method="POST" onsubmit="deletar(event,this)">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$event->user_id}}" >
                        <button class="btn-delete" type="submit" value="Excluir">Excluir </button>
                    </form>
                    </div>
                </div> 
        @endforeach
    </div>  
    {{$events->links()}}

@endsection