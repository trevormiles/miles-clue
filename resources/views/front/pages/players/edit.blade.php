@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('players.index') }}" class="back-button">Back to all players</a>
        <h1 class="m-0">Create New Player</h1>

        <form method="POST" action="{{ route('players.update', $player->id) }}">
            @csrf
            @method('PATCH')

            <div class="mt-5">
                <label for="first_name" class="block">First Name:</label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    placeholder="First Name"
                    class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                    value="{{ $player->first_name }}"
                    required
                />
            </div>

            <div class="mt-5">
                <label for="last_name" class="block">Last Name:</label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    placeholder="Last Name"
                    class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                    value="{{ $player->last_name }}"
                    required
                />
            </div>

            <button type="submit" class="btn mt-8">Save</button>
        </form>
    </div>
@endsection