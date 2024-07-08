<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::paginate(12);
        return view('layouts.partials.index', compact('houses'));
    }

    public function create()
    {
        return view('layouts.partials.create');
    }

    public function show($id)
    {
        $house = House::findOrFail($id);
        return view('layouts.partials.show', compact('house'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email',
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'description.max' => 'The description may not be greater than 500 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'address.required' => 'The address field is required.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address and must contain @ and .',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $validatedData = $request->all();
        $validatedData['image'] = $imageName;
        House::create($validatedData);

        return redirect()->route('houses.index')->with('success', 'House created successfully.');
    }

    public function edit(House $house)
    {
        return view('layouts.partials.edit', compact('house'));
    }

    public function update(Request $request, House $house)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'address' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $house->update($validatedData);

        return redirect()->route('houses.index')->with('success', 'House updated successfully.');
    }

    public function destroy(House $house)
    {
        $house->delete();
        return redirect()->route('houses.index')->with('success', 'House deleted successfully.');
    }
}