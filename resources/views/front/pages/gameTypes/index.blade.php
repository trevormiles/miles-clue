@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="m-0">Game Types</h1>
            <a href="{{ route('gameTypes.create') }}" class="btn">New Game Type</a>
        </div>
        <div class="flex flex-col gap-4">
            @foreach ($gameTypes as $gameType)
                <a
                    href="{{ route('gameTypes.edit', $gameType->id) }}"
                    class="block rounded-lg p-4 bg-white w-full flex justify-between items-center"
                >
                    <h3 class="mb-0">{{ $gameType->name }}</h3>
                    @svg('pencil-icon', 'w-4 h-auto text-green-700')
                </a>
            @endforeach
        </div>
    </div>
@endsection