@extends('templates.main')

@section('title',$event->name)

@section('content')
@if(session('msg'))
<p class="msg-error">{{session('msg')}}</p>
    
@endif
<main>
<form method="POST" action="/schedule/update/{{$event->id}}">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1" >Nome</label>
    <input type="text" class="form-control" value="{{$event->name}}"  name="name" id="exampleFormControlInput1" placeholder="Nome do evento">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Descrição</label>
    <textarea multiple class="form-control"   name="description" id="exampleFormControlSelect2">{{$event->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Endereço:</label>
    <input type="text" value="{{$event->adress}}" name="adress" class="form-control">
  </div>
    <div class="foorm-group">
    <label for="date">Data do Evento:</label>
    <input type="date" value="" class="form-control" id="date" name="date">
  </div>
  <div>
    <input type="hidden" value="{{$event->user_id}}" name="user_id">

  </div>
  <br>
  <input type="submit" value="Concluir" class="btn btn-success">
</form>
  </main>

@endsection