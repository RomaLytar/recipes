<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 5/06/2019
 * Time: 6:16 PM
 */
namespace App\Repositories;
use App\Models\Recipes;
use App\Models\Ingredients;
class RecipesRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Recipes';
    }
    public function createRecipe($data)
    {
        $recipe = [
            'description' => $data['description'] ?: null,
            'title' => $data['title'] ?: null
        ];
        $recipe = $this->create($recipe);
        $recipe->ingredients()->sync([$data['id'] => [
            'ingredients_count' => $data['ingredients_count']
        ]]);
        return $recipe;
    }

    public function editRecipe($data, $id)
    {
        $recipe = Recipes::with(['ingredients'])->find($id);
        $array = [
            'description' => $data['description'] ?: null,
            'title' => $data['title'] ?: null
        ];
        $this->update($array, ['id' => $id]);
        $recipe->ingredients()->sync([$data['id'] => [
            'ingredients_count' => $data['ingredients_count']
        ]]);
        return view('layouts.site', compact('recipe'));
    }
}