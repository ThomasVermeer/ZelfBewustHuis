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
    
    // Bewerk, maak aan en verwijder werknemers
    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // Validatie van de ontvangen gegevens
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Bewerk de werknemer
        $employee->name = $validatedData['name'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employee_images');
            $employee->image = $imagePath;
        }

        $employee->save();

        return redirect()->route('about_us.employees.edit')->with('success', 'Werknemer is bijgewerkt!');
    }

    public function createEmployee(Request $request)
    {
        // Validatie van de ontvangen gegevens
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Maak een nieuwe werknemer aan
        $employee = new Employee();
        $employee->name = $validatedData['name'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employee_images');
            $employee->image = $imagePath;
        }

        $employee->save();

        return redirect()->route('about_us.employees.edit')->with('success', 'Werknemer is toegevoegd!');
    }

    public function destroyEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('about_us.employees.edit')->with('success', 'Werknemer is verwijderd!');
    }

    // Bewerk, maak aan en verwijder partners
    public function editPartner($id)
    {
        $partner = Partner::findOrFail($id);
        return view('partners.edit', compact('partner'));
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
            $logoPath = $request->file('logo')->store('partner_logos');
            $partner->logo = $logoPath;
        }

        $partner->save();

        return redirect()->route('about_us.partners.edit')->with('success', 'Partner is bijgewerkt!');
    }

    public function createPartner(Request $request)
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
            $logoPath = $request->file('logo')->store('partner_logos');
            $partner->logo = $logoPath;
        }

        $partner->save();

        return redirect()->route('about_us.partners.edit')->with('success', 'Partner is toegevoegd!');
    }

    public function destroyPartner($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->route('about_us.partners.edit')->with('success', 'Partner is verwijderd!');
    }
}
