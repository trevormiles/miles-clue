<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardVariant;

class CardVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cardVariants = CardVariant::all();

        return view('front.pages.cardVariants.index', [
            'cardVariants' => $cardVariants,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.cardVariants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        CardVariant::create(['name' => $name]);

        return redirect()->route('cardVariants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardVariant $cardVariant)
    {
        return view('front.pages.cardVariants.edit', [
            'cardVariant' => $cardVariant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CardVariant $cardVariant)
    {
        $name = $request->input('name');
        $cardVariant->name = $name;
        $cardVariant->save();

        return redirect()->route('cardVariants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
