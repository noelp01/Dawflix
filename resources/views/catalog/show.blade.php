@extends('layouts.app')

@section('content')
    <style>
    .tutul{
        font-size: 40px;
    }
    .subtu{
        font-size: 20px;
    }
    img{
        width:300px;
    }
    .brutones{
        margin-top: 30px;
    }
    .contene{
        margin-top:70px;
        padding: 30px;
    }
    .imagen{
        padding:80px;

    }
    .opinions{
        margin-top:40px;
    }
    .come{
        font-size: 40px;
    }

    label{
        font-size: 20px;
    }
    .form-select{
        width: 100%;
    }
    textarea{
        margin-top: 10px;
    }
    .cument{
        margin-top: 20px;
        margin-bottom: 20px;
        border-left: 5px solid black;
        padding-left: 10px;
    }
    .cument p{
        margin-top: 5px;
    }
    </style>

    <div class="row ">
    <div class="col-sm-4 imagen">

        <img src="{{$lespelis1->poster}}">

    </div>
    <div class="col-sm-7 contene">
        <p class="tutul">{{$lespelis1->title}}</p>
        <p class="subtu">Any: {{$lespelis1->year}}</p>
        <p class="subtu">Director: {{$lespelis1->director}}</p>
        <p><b>Resumen:</b> {{$lespelis1->synopsis}}</p>
        <p><b>Estat:</b> @if( $lespelis1->rented ) Pel·lícula actualment alquilada @else Alquilar pel·lícula @endif</p>

        <div class="brutones">
            <a href="" type="button" class="btn btn-success">Afegir a favorits</a>
            @if( $lespelis1->rented )
            <form action="{{action('App\Http\Controllers\CatalogController@putReturn', $lespelis1->id)}}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Tornar pel·licula</button>
            </form>
            @else
            <form action="{{action('App\Http\Controllers\CatalogController@putRent', $lespelis1->id)}}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Alquilar pel·lícula</button>
            </form>
            @endif
            <a href="{{ url('/catalog/edit/' . $lespelis1->id ) }}" type="button" class="btn btn-warning">Editar pel·lícula</a>
            <form action="{{action('App\Http\Controllers\CatalogController@deleteMovie', $lespelis1->id)}}" method="POST" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-dark">Esborrar pel·lícula</button>
            </form>
            <a href="{{ url('/catalog') }}" type="button" class="btn btn-outline-secondary">Tornar al llistat</a>
        </div>

        <div class="opinions">
            <p class="come">Comentaris</p>
            @foreach($revi as $op)
            <div class="cument">
                <b>{{$op->title}}</b>
                <p>{{$op->stars}} estrella/es</p>
                <p>{{$op->review}}</p>
                <p>- {{$op->created_at}} / {{$op->user_id}}</p>
            </div>
            @endforeach
            <form action="{{ url('/catalog/review/create') }}" method="POST">
            <input hidden type="text" name="id" value="{{$lespelis1->id}}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Enviar comentari</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Resum del comentari">
                    @error('title')<div id="tascaFeedback" class="invalid-feedback">El titol no pot estar buit!</div>@enderror
                </div>
                <label for="title">Valoració</label>
                <select name="stars" class="form-select @error('stars') is-invalid @enderror" aria-label="Default select example">
                    <option value="" selected>Escull una valoració</option>
                    <option value="1">1 estrella</option>
                    <option value="2">2 estrelles</option>
                    <option value="3">3 estrelles</option>
                    <option value="4">4 estrelles</option>
                    <option value="5">5 estrelles</option>
                </select>
                @error('stars')<div id="tascaFeedback" class="invalid-feedback">La valoració no pot estar buida!</div>@enderror
                <textarea name="review" id="review" class="form-control @error('review') is-invalid @enderror" placeholder="Dona'ns la teva opinió" rows="3"></textarea>
                @error('review')<div id="tascaFeedback" class="invalid-feedback">El comentari no pot estar buit!</div>@enderror 
               <div class="brutones">
                    <button type="submit" class="btn btn-success">Valorar</button>
                    <a href="{{ url('/catalog/show/' . $lespelis1->id ) }}" type="button" class="btn btn-dark">Cancel·lar</a>
                </div> 
            </form>
            
        </div>        
    </div>
</div>
@stop