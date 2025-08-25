@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-6xl bg-white shadow-2xl rounded-2xl p-10">
        <div class="flex flex-col items-center mb-10">
            <form action="{{route('recipeType.store')}}" method="POST">
                @csrf
                <label class="w-full max-w-xl text-center text-3xl font-semibold mb-4">Create Recipe Type</label>
                <input type="text" name="name" placeholder="Name" class="w-full max-w-xl text-lg p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="mt-4 w-full px-4 py-2 rounded-full bg-green-500 text-white">Create</button>
                <div class="mt-4">
                    <a href="{!! route('recipeType.index') !!}"
                        class="mt-6  w-full px-4 py-2 rounded-full bg-red-500 text-white">Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection