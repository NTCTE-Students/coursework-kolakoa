<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
            'seller_name' => 'required|max:255',
            'price' => 'required|numeric',
            'phone_number' => 'required|max:15',
            'description' => 'nullable',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Ad::create([
            'title' => $validatedData['title'],
            'image_path' => $imagePath,
            'seller_name' => $validatedData['seller_name'],
            'price' => $validatedData['price'],
            'phone_number' => $validatedData['phone_number'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('ads.index');
    }
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index', compact('ads'));
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('ads.index')->with('status', 'Объявление удалено.');
    }

    public function create()
    {
        return view('ads.create');
    }

    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    

}

