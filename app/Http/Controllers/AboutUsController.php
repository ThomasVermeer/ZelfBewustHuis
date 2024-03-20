<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Employee;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function publicIndex()
    {
        $aboutUs = AboutUs::first(); // Haal de "about us" gegevens op
        $partners = Partner::all(); // Haal alle partners op
        $employees = Employee::all(); // Haal alle werknemers op
        return view('over_ons_pagina', compact('aboutUs', 'partners', 'employees'));
    }

    public function index()
    {
        $aboutUs = AboutUs::first(); // Haal de "about us" gegevens op
        $partners = Partner::all(); // Haal alle partners op
        $employees = Employee::all(); // Haal alle werknemers op
        return view('about_us.index', compact('aboutUs', 'partners', 'employees'));
    }

    // Bewerk de "about us" gegevens
    public function editAboutUs()
    {
        $aboutUs = AboutUs::first(); // Haal de "about us" gegevens op
        return view('about_us.edit', compact('aboutUs'));
    }

    public function updateAboutUs(Request $request)
    {
        $aboutUs = AboutUs::first();

        // Validatie van de ontvangen gegevens
        $validatedData = $request->validate([
            'text' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Bewerk de "about us" gegevens
        $aboutUs->text = $validatedData['text'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Verplaats de afbeelding naar de opslaglocatie
            $image->storeAs('public/img', $imageName);

            // Update het pad naar de afbeelding in de database
            $aboutUs->image = 'storage/img/' . $imageName;
        }

        $aboutUs->save();

        return redirect()->route('about_us.index')->with('success', 'About Us informatie is bijgewerkt!');
    }

    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return view('about_us.employeesEdit', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $employee->name = $validatedData['name'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Verplaats de afbeelding naar de opslaglocatie
            $image->storeAs('public/img', $imageName);

            // Update het pad naar de afbeelding in de database
            $employee->image = 'storage/img/' . $imageName;
        }

        $employee->save();

        return redirect()->route('about_us.index')->with('success', 'Werknemer is bijgewerkt!');
    }

    public function createEmployee(Request $request)
    {
        return view('about_us.employeesCreate');
    }

    public function storeEmployee(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $employee = new Employee();
        $employee->name = $validatedData['name'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Verplaats de afbeelding naar de opslaglocatie
            $image->storeAs('public/img', $imageName);

            // Update het pad naar de afbeelding in de database
            $employee->logo = 'storage/img/' . $imageName;
        }

        $employee->save();

        return redirect()->route('about_us.index')->with('success', 'Werknemer is toegevoegd!');
    }

    public function destroyEmployee($id)
    {
        // Controleren of er minimaal één werknemer en één partner is voordat we proberen te verwijderen
        if (Employee::count() > 1 && Partner::count() > 0) {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return redirect()->route('about_us.index')->with('success', 'Werknemer is verwijderd!');
        } else {
            return redirect()->route('about_us.index')->with('error', 'Er moet ten minste één werknemer en één partner blijven!');
        }
    }


    // Bewerk, maak aan en verwijder partners
    public function editPartner($id)
    {
        $partner = Partner::findOrFail($id);
        return view('about_us.partnersEdit', compact('partner'));
    }

    public function updatePartner(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        // Validatie van de ontvangen gegevens
        $validatedData = $request->validate([
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Bewerk de partner
        $partner->name = $validatedData['name'];

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();

            // Verplaats de afbeelding naar de opslaglocatie
            $logo->storeAs('public/img', $logoName);

            // Update het pad naar de afbeelding in de database
            $partner->logo = 'storage/img/' . $logoName;
        }

        $partner->save();

        return redirect()->route('about_us.index')->with('success', 'Partner is bijgewerkt!');
    }

    public function createPartner()
    {
        
        return view('about_us.partnersCreate');
    }

    public function storePartner(Request $request)
    {
        // Validatie van de ontvangen gegevens
        $validatedData = $request->validate([
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Maak een nieuwe partner aan
        $partner = new Partner();
        $partner->name = $validatedData['name'];

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();

            // Verplaats de afbeelding naar de opslaglocatie
            $logo->storeAs('public/img', $logoName);

            // Update het pad naar de afbeelding in de database
            $partner->logo = 'storage/img/' . $logoName;
        }

        $partner->save();

        return redirect()->route('about_us.index')->with('success', 'Partner is toegevoegd!');
    }

    public function destroyPartner($id)
    {
        // Controleren of er minimaal één werknemer en één partner is voordat we proberen te verwijderen
        if (Partner::count() > 1 && Employee::count() > 0) {
            $partner = Partner::findOrFail($id);
            $partner->delete();
            return redirect()->route('about_us.index')->with('success', 'Partner is verwijderd!');
        } else {
            return redirect()->route('about_us.index')->with('error', 'Er moet ten minste één partner en één werknemer blijven!');
        }
    }
}
