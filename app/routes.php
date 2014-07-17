<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// cats.loc ->> cats.loc/cats
Route::get('/', function() {
  return Redirect::to('cats');
});

// cats.loc/cats home page
Route::get('cats', function() {
  $cats = Cat::all();
  return View::make('cats.index')
    ->with('cats', $cats);
});

// get by breedname
Route::get('cats/breeds/{name}', function($name) {
  $breed = Breed::whereName($name)->with('cats')->first();
  return View::make('cats.index')
    ->with('breed', $breed)
    ->with('cats', $breed->cats);
});

Route::model('cat','Cat');

Route::get('cats/{cat}', function(Cat $cat) {
  return View::make('cats.single')
    ->with('cat',$cat);
});


// .loc/about
Route::get('about', function() {
  return View::make('about')->with('number_of_cats', 9000);
});


// .loc/cats/create
Route::get('cats/create', function() {
  $cat = new Cat;
  return View::make('cats.edit')
    ->with('cat',$cat)
    ->with('method','post');
});

Route::get('cats/{cat}/edit', function(Cat $cat) {
  return View::make('cats.edit')
    ->with('cat',$cat)
    ->with('method', 'delete');
});

Route::post('cats', function() {
  $cat = Cat::create(Input::all());
  return Redirect::to('cats/'.$cat->id)
    ->with('message','Successfully created page!');
});

Route::put('cats/{cat}', function(Cat $cat) {
  $cat->update(Input::all());
  return Redirect::to('cats/'.$cat->id)
    ->with('message', 'Successfully updated page!');
});

Route::delete('cats/{cat}', function(Cat $cat) {
  $cat->delete();
  return Redirect::to('cats')
    ->with('message', 'Successfully deleted page!');
});



View::composer('cats.edit', function($view) {
  $breeds = Breed::all();
  if(count ($breeds) > 0) {
    $breed_options = array_combine($breeds->lists('id'), $breeds->lists('name'));
  } else {
    $breed_options = array(null, 'Unspecified');
  }
});
// .loc/endpoint

