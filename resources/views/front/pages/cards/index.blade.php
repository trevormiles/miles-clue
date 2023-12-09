@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="m-0">Cards</h1>
            <a href="{{ route('cards.create') }}" class="btn">New Card</a>
        </div>
        <div class="flex flex-col gap-4">
            @foreach ($cards as $card)
                <a
                    href="{{ route('cards.edit', $card->id) }}"
                    class="block rounded-lg p-4 bg-white w-full flex justify-between items-center"
                >
                    <h3 class="mb-0">{{ $card->name }}</h3>
                    @svg('pencil-icon', 'w-4 h-auto text-green-700')
                </a>
            @endforeach
        </div>
    </div>
@endsection