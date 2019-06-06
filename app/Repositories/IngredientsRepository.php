<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 5/06/2019
 * Time: 6:16 PM
 */
namespace App\Repositories;
use App\Models\Ingredients;
class IngredientsRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Ingredients';
    }
    public function createIngredients($data)
    {
        $ingredients = [
            'title' => $data['title'] ?: null
        ];
        $ingredients = $this->create($ingredients);
        return $ingredients;
    }
    public function editIngredient($data, $id)
    {
        $array = [
            'title' => $data['title']
        ];
        $this->update($array, ['id' => $id]);
        return view('layouts.ingredients', compact('ingredient'));
    }
}