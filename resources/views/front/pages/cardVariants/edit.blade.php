@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('cardVariants.index') }}" class="back-button">Back to all card variants</a>
        <h1 class="m-0">Edit Card Variant</h1>

        <form method="POST" action="{{ route('cardVariants.update', $cardVariant->id) }}">
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
                    value="{{ $cardVariant->name }}"
                    required
                />
            </div>

            <button type="submit" class="btn mt-8">Save</button>
        </form>
    </div>
@endsection