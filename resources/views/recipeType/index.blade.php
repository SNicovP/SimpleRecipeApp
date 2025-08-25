@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-6xl bg-white shadow-2xl rounded-2xl p-10">
        <div class="flex flex-col items-center mb-10">
            <form method="GET" action="{{ route('recipeType.index') }}" class="w-full max-w-xl text-center">
                <label class="block text-3xl font-semibold mb-4">Search Recipes by Type</label>

                <select
                    name="recipeType_id"
                    onchange="this.form.submit()"
                    class="mb-4 w-full text-lg p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">-- All Types --</option>
                    @foreach($recipeTypes as $type)
                        <option value="{{ $type->id }}" {{ $selectedRecipeTypeId == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>

                <a href="{!! route('recipeType.create') !!}"
                class="w-full inline-block px-3 py-2 rounded-full bg-blue-700 text-white">Create
                </a>

                <a href="{!! route('recipe.index') !!}"
                    class="mt-4 inline-block w-full px-4 py-2 rounded-full bg-red-500 text-white">
                    Home
                </a>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse text-xl">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border px-6 py-4">Name</th>
                        <th class="border px-6 py-4">Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recipes as $recipe)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-6 py-4">{{ $recipe->name }}</td>
                            <td class="border px-6 py-4">{{ $recipe->recipeType->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection