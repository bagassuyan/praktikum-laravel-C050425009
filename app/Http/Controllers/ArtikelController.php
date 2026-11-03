<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::latest()->paginate(10);
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(StoreArtikelRequest $request)
{
    $data = $request->validated();
    $data['slug'] = Str::slug($data['judul']);
    $data['user_id'] = auth()->id() ?? 1;   // diganti pada Praktikum 8
    Artikel::create($data);
    return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil ditambahkan');

    $validated = $request->validate([
        'judul'  => 'required|min:5|max:255',
        'isi'    => 'required|min:20',
        'status' => 'required|in:draft,terbit',
    ]);

    Artikel::create([
        'user_id' => auth()->id() ?? 1,
        'judul'   => $validated['judul'],
        'slug'    => Str::slug($validated['judul']),
        'isi'     => $validated['isi'],
        'status'  => $validated['status'],
    ]);

    return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
         return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['judul']);
        $artikel->update($data);

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil diperbarui');

    
        $artikel->update([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul),
            'isi'    => $request->isi,
            'status' => $request->status,
        ]);

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil dihapus');
    }
}
