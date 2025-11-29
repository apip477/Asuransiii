<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitras = Mitra::all();
        return view('admin.tables.mitra.index', compact('mitras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->putFile('images', $request->file('image'));
        }

        Mitra::create($data);

        return redirect()->route('admin.mitra.index')->with('success', 'Mitra created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.tables.mitra.show', compact('mitra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.tables.mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mitra = Mitra::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($mitra->image) {
                Storage::disk('public')->delete($mitra->image);
            }

            $data['image'] = Storage::disk('public')->putFile('images', $request->file('image'));
        }

        $mitra->update($data);

        return redirect()->route('admin.mitra.index')->with('success', 'Mitra updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($id);

        // Delete image file if exists
        if ($mitra->image) {
            Storage::disk('public')->delete($mitra->image);
        }

        $mitra->delete();

        return redirect()->route('admin.mitra.index')->with('success', 'Mitra deleted successfully.');
    }
}
