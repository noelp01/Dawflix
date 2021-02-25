@extends('layouts.app')

@section('content')
<link href="{{ asset('css/categories.css') }}" rel="stylesheet">

<div class="crudcate">
    <p class="tutul">Llista de categories</p>
    <a class="btn botu4" href="{{ url('/category/create')}}"><p>Afegir categoria</p></a>
    <table class="table table-striped tala">
        <thead>
            <tr>
                <th>ID</th>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Només per adults</th>
                <th>Accions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $cate)
            <tr>
                <td>{{$cate['id']}}</td>
                <td>{{$cate['title']}}</td>
                <td>{{$cate['description']}}</td>
                <td>@if ($cate['adult'] == 1) Sí @else No @endif</td>
                <td>
                    <a class="btn botu1" href="{{ url('/category/'.$cate->id)}}"><p>Mostrar</p></a>
                    <a class="btn botu2" href="{{ url('/category/'.$cate->id.'/edit')}}"><p>Editar</p></a>
                </td>
                <td>
                    <form action="{{ url('/category/'.$cate->id) }}" style="display:inline" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn botu3"><p>Eliminar</p></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        
    </table>
</div>

@stop