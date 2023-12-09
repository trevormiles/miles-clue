@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('cards.index') }}" class="back-button">Back to all cards</a>
        <h1 class="m-0">Edit Card</h1>

        <form method="POST" action="{{ route('cards.update', $card->id) }}">
            @csrf
            @method('PATCH')

            <div class="mt-5">
                <label for="name" class="block">Name:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Name"
                    class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                    value="{{ $card->name }}"
                    required
                />
            </div>

            <div class="mt-5">
                <label for="card_category_id" class="block">Card Category:</label>
                <select
                    name="card_category_id"
                    id="card_category_id"
                    class="mt-1.5 w-full rounded-md border border-gray-200 py-2 px-4"
                    required
                >
                    @foreach ($cardCategories as $cardCategory)
                        <option
                            value="{{ $cardCategory->id }}"
                            {{ ($cardCategory->id === $card->card_category_id) ? 'selected' : '' }}
                        >
                            {{ $cardCategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn mt-8">Save</button>
        </form>
    </div>
@endsection