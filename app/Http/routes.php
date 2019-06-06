<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '', 'middleware' => ['front']], function () {
    Route::get('/', 'SiteController@index')->name('front.home');
    Route::delete('recipe/{id}', 'SiteController@destroy')->name('recipes.destroy');
    Route::get('recipe/{id}', 'RecipesController@show')->name('front.recipe.show');
    Route::get('/edit_recipe/{id}', 'RecipesController@edit')->name('front.recipe.edit');
    Route::post('/edit_recipe/{id}', 'RecipesController@update')->name('front.recipe.update');
    Route::get('/add_recipe', 'RecipesController@create')->name('front.recipe.create');
    Route::post('/add_recipe', 'RecipesController@store')->name('front.recipe.store');
    Route::get('/ingredients', 'IngredientsController@index')->name('front.ingredients.index');
    Route::delete('ingredients/{id}', 'IngredientsController@destroy')->name('ingredients.destroy');
    Route::get('/edit_ingredient/{id}', 'IngredientsController@edit')->name('front.ingredients.edit');
    Route::get('/add_ingredient', 'IngredientsController@create')->name('front.ingredients.add');
    Route::post('/add_ingredient', 'IngredientsController@store')->name('front.ingredients.store');
    Route::post('/edit_ingredient/{id}', 'IngredientsController@update')->name('front.ingredients.update');
});
Route::auth();

Route::get('/home', 'HomeController@index');
