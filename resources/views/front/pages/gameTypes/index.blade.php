@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="m-0">Game Types</h1>
            <a href="{{ route('gameTypes.create') }}" class="btn">New Game Type</a>
        </div>
        @if (count($gameTypes) > 0)
            <div class="flex flex-col gap-4">
                @foreach ($gameTypes as $gameType)
                    <a
                        href="{{ route('gameTypes.edit', $gameType->id) }}"
                        class="block rounded-lg p-4 bg-white w-full flex justify-between items-center"
                    >
                        <h3 class="mb-0">{{ $gameType->name }}</h3>
                        <x-icon-pencil-icon class="w-4 h-auto text-green-700" />
                    </a>
                @endforeach
            </div>
        @else
            <div>There are currently no game types</div>
        @endif
    </div>
@endsection