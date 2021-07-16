@extends('templates.template')

@section('content')
    <h1 class="text-center">Crud</h1>
    <hr>
    <div class="col-8 m-auto">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr class="dark">
                    <td class="table-dark">Id</td>
                    <td class="table-dark">Título</td>
                    <td class="table-dark">Autor</td>
                    <td class="table-dark">Preço</td>
                </tr>
            </thead>
            <tbody>
             @foreach($book as $books)
                @php
                    $user=$books->find($books->id)->relUsers;    
                @endphp
                 <tr>
                     <td>{{$books->id}}</td>
                     <td>{{$books->title}}</td>
                     <td>{{$user->name}}</td>
                     <td>{{$books->price}}</td>

                 </tr>
             @endforeach

            </tbody>
        </table>

    </div>
@endsection