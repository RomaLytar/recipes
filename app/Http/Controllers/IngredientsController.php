<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\IngredientsRepository;
use App\Http\Requests\StoreIngredients;

use App\Http\Requests;

class IngredientsController extends Controller
{
    protected $ingredientsRepository;

    public function __construct(IngredientsRepository $ingredientsRepository)
    {
        $this->ingredientsRepository = $ingredientsRepository;

    }

    public function index(Request $request)
    {
        $ingredients = Ingredients::get();
        return view('layouts.ingredients', compact('ingredients'));
    }

    public function destroy($id)
    {
        Ingredients::find($id)->delete();
        return redirect()->route('front.ingredients.index');
    }

    public function create()
    {
        return view('layouts.create_ingredient');
    }

    public function store(StoreIngredients $request)
    {
        $data = $request->all();
        $this->ingredientsRepository->createIngredients($data);
        Session::flash('message', 'Успешно добавлено!');
        return redirect()->route('front.ingredients.index');
    }

    public function edit($id)
    {
        $ingredient = Ingredients::find($id);
        if (empty($ingredient)) {
            abort(404);
        }
        return view('layouts.edit_ingredient', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->ingredientsRepository->editIngredient($data, $id);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('front.ingredients.index');
    }
}
