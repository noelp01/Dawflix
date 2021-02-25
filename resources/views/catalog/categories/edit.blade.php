@extends('layouts.app')

@section('content')
<link href="{{ asset('css/categories.css') }}" rel="stylesheet">

<div class="container">
   <div class="row">
      <div class="offset-md-3 col-md-6">
         <div class="card">
            <div class="card-header text-center">
               Editar categoria
            </div>
            <div class="card-body">
               <form method="POST" action="{{ url('/category/'.$categories->id) }}" enctype = "multipart/form-data">
               {{ method_field('PUT')}}
               {{ csrf_field() }}

               <div class="form-group">
                  <label for="title">Títol</label>
                  <input value="{{$categories->title}}" type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                  @error('title')<div id="tascaFeedback" class="invalid-feedback">El títol no pot estar buit!</div>@enderror
               </div>

               <div class="form-group">
                  <label for="title">Descripció</label>
                  <input value="{{$categories->description}}" type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror">
                  @error('description')<div id="tascaFeedback" class="invalid-feedback">La descripció no pot estar buida!</div>@enderror
               </div>

               <div class="form-group">
                  <label for="title">Adult</label>
                  <input value="{{$categories->adult}}" type="text" name="adult" id="adult" class="form-control @error('adult') is-invalid @enderror">
                  @error('adult')<div id="tascaFeedback" class="invalid-feedback">El control d'edat no pot estar buit!</div>@enderror
               </div>

               <div class="form-group text-center botoedit">
                  <button type="submit" class="btn btn-primary">
                     Editar producte
                  </button>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@stop