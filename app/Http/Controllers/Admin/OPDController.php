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
            'deskripsi' => 'required|string|max:150',
            'slug' => 'required|unique:opds',
            'link' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'slug', 'link']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() .'_' . $file->getClientOriginalName();
            $file->move(public_path('logos'), $filename);
            $data['logo'] = 'logos/' . $filename; 
        }

        OPD::create($data);

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
    public function edit($id)
    {
        $opd = Opd::findOrFail($id);
        return view('admin.opd.edit', compact('opd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OPD $opd)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required|string|max:150',
            'slug' => 'required|unique:opds,slug,' . $opd->id,
            'link' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'deskripsi','slug', 'link']);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($opd->logo && file_exists(public_path($opd->logo))) {
                unlink(public_path($opd->logo));
            }
        
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('logos'), $filename);
            $data['logo'] = 'logos/' . $filename;
        }

        $opd->update($data);

        return redirect()->route('admin.opds.index')->with('success', 'OPD berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OPD $opd)
    {

        // Hapus file logo jika ada
        if ($opd->logo && file_exists(public_path($opd->logo))) {
            unlink(public_path($opd->logo));
        }

        $opd->delete();

        $opd->delete();
        return redirect()->route('admin.opds.index')->with('success', 'OPD berhasil dihapus.');
    }
}
