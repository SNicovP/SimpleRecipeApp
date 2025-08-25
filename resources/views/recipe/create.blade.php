@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-xl">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Create Recipe</h2>

        <form method="POST" action="{{ route('recipe.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Recipe Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <input
                    id="description"
                    type="text"
                    name="description"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Type</label>
                <select
                    id="recipe_type_id"
                    name="recipe_type_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                    @foreach($recipeTypes as $recipeType)
                        <option value="{!! $recipeType->id !!}">{!! $recipeType->name !!}</option>
                    @endforeach
                </select>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white text-lg font-semibold py-3 rounded-xl hover:bg-blue-700 transition duration-300"
            >
                Submit
            </button>
            <div class="mt-4">
                <a href="{!! route('recipe.index') !!}"
                    class="mt-6  w-full px-4 py-2 rounded-full bg-red-500 text-white">Home
                </a>
            </div>
        </form>
    </div>
</div>
@endsection