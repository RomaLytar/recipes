<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $fillable = ['title', 'description'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class, 'recipe_ingredient', 'recipe_id', 'ingredient_id')
            ->withPivot('ingredients_count');
    }
}
