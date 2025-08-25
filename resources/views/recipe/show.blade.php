@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-6xl bg-white shadow-2xl rounded-2xl p-10">
        <div class="overflow-x-auto">
            <table class="mb-4 w-full table-auto border-collapse text-xl">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border px-6 py-4">Name</th>
                        <td class="border px-6 py-4">{{ $recipe->name }}</td>
                    </tr>
                    <tr class="bg-gray-200 text-left">
                        <th class="border px-6 py-4">Description</th>
                        <td class="border px-6 py-4">{{ $recipe->description }}</td>
                    </tr>
                    <tr class="bg-gray-200 text-left">
                        <th class="border px-6 py-4">Type</th>
                        <td class="border px-6 py-4">{{ $recipe->recipeType->name }}</td>
                    </tr>
                    <tr class="bg-gray-200 text-left">
                        <th class="border px-6 py-4">Author</th>
                        <td class="border px-6 py-4">
                            @if($recipe->author)
                                {{ $recipe->author->email }}
                            @else
                                Author does not exist
                            @endif
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        <div>
        <a href="{!! route('recipe.edit', $recipe->id) !!}"
                class="mt-6 mb-10 w-full px-4 py-2 rounded-full bg-blue-500 text-white">Edit
        </a>
        </div>
        <div class="mt-4">
        <a href="{!! route('recipe.index') !!}"
            class="mt-6  w-full px-4 py-2 rounded-full bg-red-500 text-white">Home
        </a>
        </div>
    </div>
</div>
@endsection