@extends('layouts.app')
@section('content')
<header class="text-3xl font-semibold">
    Your Recipe List
</header>
<div class="min-h-screen flex items-center justify-center bg-[#808080] px-4">
    <div class="w-full max-w-6xl shadow-2xl rounded-2xl p-10 bg-[#44cbdc]">
        <div class="flex flex-col items-center mb-10">
            <form action="{{route('recipe.index')}}" method="GET">
                <div class="mt-2 mb-2">
                    <a href="{!! route('recipeType.index') !!}"
                    class="px-3 py-2 rounded-full bg-pink-700 text-white">Recipe Types
                </a>
                </div>
            <label class="w-full max-w-xl text-center text-3xl font-semibold mb-4">Search Recipes</label>
            <input
                type="text"
                name="search"
                placeholder="Type to search..."
                class="mt-2 w-full max-w-xl text-lg p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button class="mt-4 mb-4 w-full px-4 py-2 rounded-full bg-green-500 text-white" type="submit">Search</button>
            <div class="mt-2">
                <a href="{!! route('recipe.index') !!}"
                    class="w-full px-4 py-2 rounded-full bg-red-500 text-white">Home
                </a>
            </div>
            <div class="mt-4">
                <a href="{!! route('recipe.create') !!}"
                    class="mt-6  w-full px-4 py-2 rounded-full bg-blue-700 text-white">Create
                </a>
            </div>
            </form>
        </div>

        <div class="overflow-x-auto" style="background: #FF6961; color:#b9fcb9; font-family:Arial, Helvetica, sans-serif">
            <table class="w-full table-auto border-collapse text-xl">
                <thead>
                    <tr class=text-left">
                        <th class="border px-6 py-4">Name</th>
                        <th class="border px-6 py-4">Description</th>
                        <th class="border px-6 py-4">Type</th>
                        <th class="border px-6 py-4">Author</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recipes as $recipe)
                        <tr class="hover:bg-[#44cbdc] hover:text-[#f7f784]">
                            <td class="border px-6 py-4">{{ $recipe->name }}</td>
                            <td class="border px-6 py-4">{{ $recipe->description }}</td>
                            <td class="border px-6 py-4">{{ $recipe->recipeType->name }}</td>
                            <td class="border px-6 py-4">
                                @if($recipe->author)
                                    {{ $recipe->author->email }}
                                @else
                                   Author does not exist
                                @endif
                            </td>
                            <td class="border px-6 py-4">
                                <a href="{{route('recipe.show',$recipe->id)}}">
                                    Show
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <?php
    // Ensure that $selectedCoffee is always set to a meaningful value: it will be initialized in some tests (in the background) but not in others

    // Write your code here
    if (empty($selectedCoffee) || ($selectedCoffee === '')) {
        $selectedCoffee = 'drip';
    }
    if ($selectedCoffee === "espresso"){
        echo "<style>
        .coffee-info{
            hidden: false;
        }
        #espresso-info {
            hidden: false;
        }
        #drip-coffee-info {
            hidden: true;
        }
        </style>";
    var_dump($selectedCoffee);
    }
    if ($selectedCoffee === "drip"){
        echo "<style>
        .coffee-info{
            hidden: false;
        }
        #espresso-info {
            hidden: true;
        }
        #drip-coffee-info {
            hidden: false;
        }
        </style>";
    var_dump($selectedCoffee);
    };
?>

<div class="coffee-info">
    <div id="espresso-info">
        <h1>Espresso ☕</h1>
        <p>Espresso is a concentrated coffee drink with a bold flavor. It pairs perfectly with a chocolate croissant. 🍫🥐</p>
    </div>

    <div id="drip-coffee-info">
        <h1>Drip Coffee ☕</h1>
        <p>Drip coffee, a staple in many routines, is known for its straightforward brewing process and comforting, familiar taste. Perfect for starting your morning or as a midday pick-me-up. ☕️🌅</p>
    </div>
</div>
</div>
@endsection