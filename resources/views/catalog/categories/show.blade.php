@extends('layouts.app')

@section('content')

<div class="row" style="margin-top:30px">

    @foreach( $pelicula as $key => $peli )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <center>
        <div class="card" style="margin:20px">
        <a href="{{ url('/catalog/show/' . $peli->id ) }}">
            <img src="{{$peli->poster}}" style="width:100%"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$peli->title}}
            </h4>
        </a>
        </div>
        </center>

    </div>
    @endforeach

    </div>

@stop