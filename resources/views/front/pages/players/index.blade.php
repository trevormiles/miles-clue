@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="m-0">Players</h1>
            <a href="{{ route('players.create') }}" class="btn">New Player</a>
        </div>
        @if (count($players) > 0)
            <div class="flex flex-col gap-4">
                @foreach ($players as $player)
                    <a
                        href="{{ route('players.edit', $player->id) }}"
                        class="block rounded-lg p-4 bg-white w-full flex justify-between items-center"
                    >
                        <h3 class="mb-0">{{ $player->fullName() }}</h3>
                        <x-icon-pencil-icon class="w-4 h-auto text-green-700" />
                    </a>
                @endforeach
            </div>
        @else
            <div>There are currently no players</div>
        @endif
    </div>
@endsection