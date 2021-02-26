<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
      $categories = Category::all();
		  return view('catalog.categories.index')->with('categories',$categories);
    }

    public function getShow(Request $request, $id){
      $pelicula = Movie::where('category_id',$id)->get();
      return view('catalog.categories.show',array('pelicula' => $pelicula));
    }

    public function getCreate(){
      return view ('catalog.categories.create');
    }

    public function getEdit($id){
      $categories = Category::findOrFail($id);
      return view ('catalog.categories.edit')->with('categories',$categories);
    }

    public function putCreate(Request $request){
      $categories = new Category;
      $validated = $this->validateCategory($request);
      $categories->title=$validated['title'];
      $categories->description=$validated['description'];
      $categories->adult=$validated['adult'];
      $categories->save();
      return redirect()->action('App\Http\Controllers\CategoryController@index');
    }

    public function putUpdate(Request $request, $id){
      $categories = Category::findOrFail($id);
      $validated = $this->validateCategory($request);
      $categories->title=$validated['title'];
      $categories->description=$validated['description'];
      $categories->adult=$validated['adult'];
      $categories->save();

      return redirect()->action('App\Http\Controllers\CategoryController@index');
    }

    public function deleteCategory(Request $request, $id){
      $categories = Category::findOrFail($id);
      $categories->delete();
      return redirect()->action('App\Http\Controllers\CategoryController@index');
    }

    public function validateCategory(Request $request) {
      return $validated = $request->validate([
          "title" => "required",
          "description" => "required",
          "adult" =>  "required"
      ]);
  }
}
