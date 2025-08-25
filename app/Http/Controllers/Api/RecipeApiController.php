<?php

namespace App\Http\Controllers\Api;

use  App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeApiController extends Controller
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

        return response()->json([
            'data' => $recipes->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipe.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        dd($recipe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
