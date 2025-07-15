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
        return view('admin.layanans.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opds = OPD::all(); // untuk dropdown pilihan OPD
        return view('admin.layanans.create', compact('opds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'opd_id' => 'required|exists:opds,id',
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url'
        ]);

        \App\Models\Layanan::create([
            'opd_id' => $request->opd_id,
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link]);

        return redirect()->route('admin.layanans.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $layanan = Layanan::with('opd')->findOrFail($id);
        return view('admin.layanans.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        $opds = OPD::all();

        return view('admin.layanans.edit', compact('layanan', 'opds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'opd_id' => 'required|exists:opds,id',
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url'
        ]);

        $layanan = Layanan::findOrFail($id);

        $layanan->update($request->only(['opd_id', 'nama_layanan', 'deskripsi', 'link']));

        return redirect()->route('admin.layanans.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanans.index')->with('success', 'Layanan berhasil dihapus');
    }

    public function getByOpd($id)
    {
        $layanans = \App\Models\Layanan::where('opd_id', $id)->get();

        return response()->json($layanans);
    }
}
