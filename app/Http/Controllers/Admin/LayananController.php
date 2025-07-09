<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\OPD;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::with('opd')->latest()->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opds = OPD::all(); // untuk dropdown pilihan OPD
        return view('admin.layanan.create', compact('opds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'opd_id' => 'required|exist:opds,id',
            'nama_layanan' => 'required',
            'deskripsi' => 'nullable',
            'link' => 'nullable|url'
        ]);

        Layanan::create($request->only(['opd_id', 'nama_layanan', 'deskripsi', 'link']));

        return redirect()->route('admin.layanans.index')->with('success', 'Layanan berhasil ditambahkan');
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
    public function edit(Layanan $layanan)
    {
        $opds = OPD::all();
        return view('admin.layanans.edit', compact('layanan', 'opds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'opd_id' => 'required|exist:opds,id',
            'nama_layanan' => 'required',
            'deskripsi' => 'nullable',
            'link' => 'nullable|url'
        ]);

        $layanan->update($request->only(['opd_id', 'nama_layanan', 'deskripsi', 'link']));

        return redirect()->route('admin.layanans.index')->with('success', 'Layanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanans.index')->with('success', 'Layanan berhasil dihapus');
    }
}
