<?php

namespace App\Http\Controllers;

use App\Models\RecipeType;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $recipeTypes = RecipeType::get();
        $input = $request->all();

        $search = $input['search'] ?? null;
        $selectedRecipeTypeId = $input['recipeType_id'] ?? null;

        $recipes = Recipe::with('recipeType')
            ->when($search, fn($query) => $query->where('name', 'like', '%' . $search . '%'))
            ->when($selectedRecipeTypeId, fn($query) => $query->where('recipe_type_id', $selectedRecipeTypeId))
            ->get();

        return view('recipeType.index', compact('recipeTypes', 'recipes', 'selectedRecipeTypeId'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipeType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $recipeType = RecipeType::create(
            [
                'name' => $input['name'],
            ]
        );
        return redirect()->route('recipeType.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RecipeType $recipeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecipeType $recipeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecipeType $recipeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecipeType $recipeType)
    {
        //
    }
}
