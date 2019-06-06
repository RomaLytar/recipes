<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recipes;
use App\Http\Requests\StoreRecipe;
use App\Repositories\RecipesRepository;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class SiteController extends Controller
{
    protected $recipesRepository;

    public function __construct(RecipesRepository $recipesRepository)
    {
    }
    public function index(Request $request)
    {
        $recipes = Recipes::latest()->get();
        return view('layouts.site', compact('recipes'));
    }
    public function destroy($id)
    {
        Recipes::find($id)->delete();
        return redirect()->route('front.home');
    }

}
