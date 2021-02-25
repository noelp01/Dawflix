@extends('layouts.app')

@section('content')
<link href="{{ asset('css/categories.css') }}" rel="stylesheet">

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Afegir categoria
         </div>
         <div class="card-body">
            <form method="POST">
            {{ method_field('PUT')}}
            {{ csrf_field() }}

            <div class="form-group">
               <label for="title">Títol</label>
               <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Afegir títol">
               @error('title')<div id="tascaFeedback" class="invalid-feedback">El títol no pot estar buit!</div>@enderror
            </div>

            <div class="form-group">
                <label for="title">Descripció</label>
                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Afegir la descripció">
               @error('description')<div id="tascaFeedback" class="invalid-feedback">La descripció no pot estar buida!</div>@enderror
            </div>

            <div class="form-group">
                <label for="title">Adult</label>
                <input type="text" name="adult" id="adult" class="form-control @error('adult') is-invalid @enderror" placeholder="Afegir mayoría d'edat">
               @error('adult')<div id="tascaFeedback" class="invalid-feedback">El control d'edat no pot estar buit!</div>@enderror
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary">
                  Afegir pel·lícula
               </button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>

@stop