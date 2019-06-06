<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Recipes;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\RecipesRepository;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreRecipe;

use App\Http\Requests;

class RecipesController extends Controller
{

    protected $recipesRepository;

    public function __construct(RecipesRepository $recipesRepository)
    {
        $this->recipesRepository = $recipesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $names = Ingredients::pluck('title', 'id')->toArray();
        return view('layouts.create_recipe', compact('names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipe $request)
    {
        $data = $request->all();
        $this->recipesRepository->createRecipe($data);
        Session::flash('message', 'Успешно добавлено!');
        return redirect()->route('front.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipes::find($id);
        if (empty($recipe)) {
            abort(404);
        }
        return view('layouts.recipes_show', compact('recipe'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipes::find($id);
        if (empty($recipe)) {
            abort(404);
        }
        return view('layouts.recipes_edit', compact('recipe'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipes::find($id)->delete();
        return redirect()->route('layouts.recipes_show');
    }
}
