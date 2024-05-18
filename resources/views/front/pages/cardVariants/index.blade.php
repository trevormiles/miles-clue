@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="m-0">Card Variants</h1>
            <a href="{{ route('cardVariants.create') }}" class="btn">New Card Variant</a>
        </div>
        @if (count($cardVariants) > 0)
            <div class="flex flex-col gap-4">
                @foreach ($cardVariants as $cardVariant)
                    <a
                        href="{{ route('cardVariants.edit', $cardVariant->id) }}"
                        class="block rounded-lg p-4 bg-white w-full flex justify-between items-center"
                    >
                        <h3 class="mb-0">{{ $cardVariant->name }}</h3>
                        <x-icon-pencil-icon class="w-4 h-auto text-green-700" />
                    </a>
                @endforeach
            </div>
        @else
            <div>There are currently no card variants</div>
        @endif
    </div>
@endsection