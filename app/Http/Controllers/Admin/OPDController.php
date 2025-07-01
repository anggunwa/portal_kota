<?php

namespace App\Http\Controllers\Admin;

use App\Models\OPD;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OPDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opds = OPD::all();
        return view('admin.opd.index', compact('opds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.opd.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:opds',
            'link' => 'nullable|url',
        ]);

        OPD::create($request->only(['nama', 'slug', 'link']));

        return redirect()->route('admin.opds.index')->with('success', 'OPD berhasil ditambahkan');
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
    public function edit(OPD $opd)
    {
        return view('admin.opd.edit', compact('opd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OPD $opd)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:opds,slug,' . $opd->id,
            'link' => 'nullable|url',
        ]);

        $opd->update($request->only(['nama', 'slug', 'link']));

        return redirect()->route('admin.opds.index')->with('success', 'OPD berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OPD $opd)
    {
        $opd->delete();
        return redirect()->route('admin.opds.index')->with('success', 'OPD berhasil dihapus.');
    }
}
