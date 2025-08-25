<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RecipeType;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'author_id',
        'recipe_type_id'
    ];

    public function recipeType(){
        return $this->belongsTo(RecipeType::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'author_id','id');
    }
}
