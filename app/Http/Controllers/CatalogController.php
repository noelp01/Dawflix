<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function getIndex(){
		$lespelis = Movie::all();
        return view('catalog.index')->with('lespelis',$lespelis);
    }
    public function getShow(Request $request, $id){
        $lespelis1 = Movie::findOrFail($id);
        $revi = Review::all()->where("movie_id", $id);
        return view('catalog.show')->with('lespelis1',$lespelis1)->with('revi',$revi);
    }
    public function getCreate(){
        return view('catalog.create');
    }
    public function getEdit($id){
        $lespelis2 = Movie::findOrFail($id);
        return view('catalog.edit')->with('lespelis2',$lespelis2);
    }
    public function postCreate(Request $request){
        $muvi = new Movie;
        $validated = $this->validateForm($request);
        $muvi->title = $validated['title'];
        $muvi->year  = $validated['year'];
        $muvi->director = $validated['director'];
        $muvi->poster = $validated['post'];
        $muvi->synopsis = $validated['synopsis'];
        $muvi->save();
        notify()->success('Pel·lícula creada, aquesta es una mica merdeta!');
        return redirect('/catalog');
    }
    public function putEdit(Request $request, $id){
        $muvi =  Movie::findOrFail($request->id);
        $validated = $this->validateForm($request);
        $muvi->title=$validated['title'];
        $muvi->year=$validated['year'];
        $muvi->director=$validated['director'];
        $muvi->poster=$validated['post'];
        $muvi->synopsis=$validated['synopsis'];
        $muvi->save();
        notify()->success('Pel·lícula editada, espero que no hi hagin errors!');
        return redirect('/catalog/show/'.$request->id);
    }
    public function putRent(Request $request, $id){
        $muvi =  Movie::findOrFail($request->id);
        $muvi->rented = true;
        $muvi->save();
        return redirect('/catalog/show/'.$request->id);
    }
    public function putReturn(Request $request, $id){
        $muvi =  Movie::findOrFail($request->id);
        $muvi->rented = false;
        $muvi->save();
        return redirect('/catalog/show/'.$request->id);
    }
    public function deleteMovie(Request $request, $id){
        $muvi =  Movie::findOrFail($request->id);
        $muvi->delete();
        notify()->success('Pel·lícula eliminada!');
        return redirect('/catalog');
    }
    public function unaOpinio(Request $request){
        $revi = new Review;
        $validatedR = $this->validateReview($request);
        $revi->title=$validatedR['title'];
        $revi->stars=$validatedR['stars'];
        $revi->review=$validatedR['review'];
        $revi->user_id=Auth::id();
        $revi->movie_id=$request['id'];
        $revi->save();
        notify()->success('Comentari afegit!');
        return redirect('/catalog/show/'.$request->id);
    }
    public function validateForm(Request $request) {
        return $validated = $request->validate([
            "title" => "required",
            "year" => "required",
            "director" => "required",
            "post" => "required",
            "synopsis" => "required",
        ]);
    }
    public function validateReview(Request $request) {
        return $validatedR = $request->validate([
            "title" => "required",
            "stars" => "required",
            "review" => "required",
        ]);
    }
}