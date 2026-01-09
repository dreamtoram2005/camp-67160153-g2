<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokedexs = Pokedex::all();
        return view('pokedexs.index', compact('pokedexs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokedexs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'hp' => 'nullable|integer',
            'attack' => 'nullable|integer',
            'defense' => 'nullable|integer',
            'image_url' => 'nullable|string|max:255',
        ]);

        Pokedex::create($validated);

        return redirect()->route('pokedexs.index')->with('success', 'Pokedex created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokedex $pokedex)
    {
        return view('pokedexs.show', compact('pokedex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokedex $pokedex)
    {
        return view('pokedexs.edit', compact('pokedex'));
    }

    /**
     * Update the specified resource in storage.
     * แก้ไขให้รับ $id และใช้ findOrFail ตามที่ต้องการ
     */
    public function update(Request $request, $id)
    {
        // ค้นหาข้อมูลเดิมตาม ID
        $pokedex = Pokedex::findOrFail($id);

        // ตรวจสอบข้อมูล (Validation)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'hp' => 'nullable|integer',
            'attack' => 'nullable|integer',
            'defense' => 'nullable|integer',
            'image_url' => 'nullable|string|max:255',
        ]);

        // อัปเดตข้อมูลทั้งหมดที่ผ่านการตรวจสอบแล้ว
        $pokedex->update($validated);

        return redirect()->route('pokedexs.index')
                         ->with('success', 'Pokemon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokedex $pokedex)
    {
        $pokedex->delete();

        return redirect()->route('pokedexs.index')->with('success', 'Pokedex deleted successfully.');
    }
}