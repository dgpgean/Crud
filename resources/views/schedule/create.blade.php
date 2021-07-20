@extends('templates.main')

@section('name', $_SESSION['name'])




@section('title','Novo evento')

@section('content')
@if(session('msg-error'))
  <p class="msg-error">{{session('msg-error')}}</p>
@elseif(session('msg-sucess'))
<p class="msg-sucess">{{session('msg-sucess')}}</p>
@endif
    
<main>
<form method="POST" action="/schedule/save" onsubmit="verifica(event,this)">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Nome do evento">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Descrição</label>
    <textarea multiple class="form-control" name="description" id="exampleFormControlSelect2"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Endereço:</label>
    <input type="text" name="adress" class="form-control">
  </div>
    <div class="foorm-group">
    <label for="date">Data do Evento:</label>
    <input type="date" class="form-control" id="date" name="date">
  </div><br>
  <input type="hidden" value="{{$_SESSION['id']}}" name="id">
  <input type="submit" value="Concluir" class="btn btn-success">
</form>
  </main>
    
@endsection