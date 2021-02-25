@extends('layouts.app')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Afegir pel·lícula
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST">
            {{ csrf_field() }}

            <div class="form-group">
               <label for="title">Títol</label>
               <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Afegir títol">
               @error('title')<div id="tascaFeedback" class="invalid-feedback">El títol no pot estar buit!</div>@enderror
            </div>

            <div class="form-group">
                <label for="title">Any</label>
                <input type="text" name="year" id="year" class="form-control @error('year') is-invalid @enderror" placeholder="Afegir l'any">
               @error('year')<div id="tascaFeedback" class="invalid-feedback">L'any no pot estar buit!</div>@enderror
            </div>

            <div class="form-group">
                <label for="title">Director</label>
                <input type="text" name="director" id="director" class="form-control @error('director') is-invalid @enderror" placeholder="Afegir director">
               @error('director')<div id="tascaFeedback" class="invalid-feedback">El director no pot estar buit!</div>@enderror
            </div>

            <div class="form-group">
                <label for="title">Poster</label>
                <input type="text" name="post" id="post" class="form-control @error('post') is-invalid @enderror" placeholder="Afegir poster">
               @error('post')<div id="tascaFeedback" class="invalid-feedback">El poster no pot estar buit!</div>@enderror
            </div>

            <div class="form-group">
               <label for="synopsis">Categoria</label>
               <select id="inputState" class="form-control" name="category_id">
                  <option selected>Escull una categoria...</option>
                  @foreach($categories as $cate)
                  <option value="{{$cate->id}}">{{$cate->title}}</option>
                  @endforeach
               </select>
               @error('category_id')<div id="tascaFeedback" class="invalid-feedback">La categoria no pot estar buit!</div>@enderror 
            </div>

            <div class="form-group">
               <label for="synopsis">Resum</label>
               <textarea name="synopsis" id="synopsis" class="form-control @error('synopsis') is-invalid @enderror" placeholder="Afegir synopsis"
               rows="3"></textarea> 
               @error('synopsis')<div id="tascaFeedback" class="invalid-feedback">El resum no pot estar buit!</div>@enderror 
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                  Afegir pel·lícula
               </button>
            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@stop