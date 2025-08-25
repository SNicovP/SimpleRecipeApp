<?php

namespace App\Models;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;

class RecipeType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function recipes(){
        return $this->hasMany(Recipe::class);
    }
}
