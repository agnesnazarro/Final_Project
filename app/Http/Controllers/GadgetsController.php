<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gadgets;

class GadgetsController extends Controller
{
    public function index()
    {

        $gadgets = Gadgets::all();
        return view('gadgets.index', compact('gadgets'));
    }

    // Show the form for creating a new gadget
    public function create()
    {

        return view('gadgets.create');
    }

    // Store a newly created gadget in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string',
            'gadget_name' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|numeric',
            'purchase_date' => 'required|date|date_format:Y-m-d',
        ]);

        $gadgets = Gadgets::create($validated);

        // Debugging
        \Log::info('Gadget added:', $gadgets->toArray());
        return redirect()->route('gadgets.index')->with('success', 'Gadget added successfully');
    }

    // Display the specified gadget
    public function show($id)
    {
        $gadgets = Gadgets::findOrFail($id);
        return view('gadgets.show', compact('gadgets'));
    }

    // Show the form for editing the specified gadget
    public function edit($id)
    {
        $gadgets = Gadgets::findOrFail($id);
        return view('gadgets.edit', compact('gadgets'));
    }

    // Update the specified gadget in the database
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'brand_name' => 'required|string',
            'gadget_name' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|numeric',
            'purchase_date' => 'required|date|date_format:Y-m-d',
        ]);

        $gadgets = Gadgets::findOrFail($id);
        $gadgets->update($data);
        return redirect()->route('gadgets.index')->with('success', 'Gadget updated successfully');
    }

    // Remove the specified gadget from the database
    public function destroy($id)
    {
        $gadgets = Gadgets::findOrFail($id);
        $gadgets->delete();
        return redirect()->route('gadgets.index')->with('success', 'Gadget deleted successfully');
    }

}
