<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->storeAs('public/img', $imageName);

            $imageName = 'storage/img/' . $imageName;

            Event::create([
                'name' => $request->name,
                'description' => $request->description,
                'address' => $request->address,
                'city' => $request->city,
                'zipcode' => $request->zipcode,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date' => $request->date,
                'image' => $imageName,
            ]);

            return redirect()->route('events.index')
                ->with('success', 'Evenement succesvol aangemaakt.');
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
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);



        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'date' => $request->date,

        ]);

        return redirect()->route('events.index')
            ->with('success', 'Evenement succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')
            ->with('success', 'Evenement succesvol verwijderd.');
    }
}
