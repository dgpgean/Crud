@extends('templates.main')

@section('title','Agenda')

@section('content')

@if(session('msg'))
<p class="msg-error">{{session('msg')}}</p>
    
@endif
    
<main>

    <form method="POST" action="/user">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div id="emailHelp" class="form-text">Não tem cadastro? <a href="/user/new">clique aqui</a></div>
      <button type="submit" class="btn btn-success">Login</button>
    </form>

</main>
    
@endsection
