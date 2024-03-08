<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'street' => 'required',
            'number' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->storeAs('public/img', $imageName);

            $imageName = 'storage/img/' . $imageName;

            Location::create([
                'city' => $request->city,
                'street' => $request->street,
                'number' => $request->number,
                'image' => $imageName,
            ]);

            return redirect()->route('locations.index')
                ->with('success', 'location succesvol aangemaakt.');
        }
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
    public function edit(string $id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'city' => 'required',
            'street' => 'required',
            'number' => 'required',
        ]);

        $location = Location::findOrFail($id);

        $location->update([
            'city' => $request->city,
            'street' => $request->street,
            'number' => $request->number,
        ]);

        return redirect()->route('locations.index')
            ->with('success', 'location succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
