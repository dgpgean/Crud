@extends('templates.main')

@section('title','Cadastro de Usuario')

@section('content')

<main>
  <h2>Novo Usuario</h2>
    <form method="post" action="/users" enctype="multipart/form-data">
       @csrf
        <div class="mb-3">
            <label for="text" class="form-label">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="foorm-group">
          <label for="Image">Foto:</label>
          <input type="file" id="image" name="image" class="form-control">
      </div>
        <div id="emailHelp" class="form-text">Não tem cadastro? <a href="">clique aqui</a></div>
        <button type="submit" class="btn btn-success">Cadastrar</button>       
    </form>
</main>
    
@endsection