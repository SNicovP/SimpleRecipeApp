<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Uri\UriTemplate\Template;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $input = $request->all();
        if(array_key_exists('search',$input)){
            $search = $input['search'];
        }else{
            $search = null;
        }

        if($search){
            $recipes = Recipe::where('name','like', '%'.$search.'%')
                ->with('recipeType')
                ->get();
        }else{
            $recipes = Recipe::with('recipeType')->get();
        }

        return view('recipe.index', compact('recipes'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recipeTypes = RecipeType::get();
        return view('recipe.create',compact('recipeTypes'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $recipe = Recipe::create(
            [
                'name' => $input['name'],
                'description' => $input['description'],
                'recipe_type_id' => $input['recipe_type_id'],
                'author_id' => Auth::user()->id,
            ]
        );
        return redirect()->route('recipe.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $recipeTypes = RecipeType::get();
        return view('recipe.edit',compact('recipe','recipeTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $input = $request->all();
        // dd($input);
        $recipe->update($input);
        return redirect(route('recipe.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
