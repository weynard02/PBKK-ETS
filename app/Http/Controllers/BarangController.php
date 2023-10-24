<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::all();
        $kondisis = Kondisi::all();
        return view('create', compact('jenis', 'kondisis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'jenis_id' => 'required',
            'kondisi_id' => 'required',
            'keterangan' => 'required|max:255',
            'kecacatan' => 'max:255',
            'jumlah' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $imagePath = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $imagePath);

        Barang::create([
            'nama' => $request->nama,
            'jenis_id' => $request->jenis_id,
            'kondisi_id' => $request->kondisi_id,
            'keterangan' => $request->keterangan,
            'kecacatan' => $request->kecacatan,
            'jumlah' => $request->jumlah,
            'image_path' => $imagePath
        ]);

        return redirect()->route('barang')->with('success', 'Input successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis = Jenis::all();
        $kondisis = Kondisi::all();
        $barang = Barang::findorfail($id);

        return view('edit', compact('jenis', 'kondisis', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'jenis_id' => 'required',
            'kondisi_id' => 'required',
            'keterangan' => 'required|max:255',
            'kecacatan' => 'max:255',
            'jumlah' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $barang = Barang::findorfail($id);

        $imagePath = $barang->image_path;
        if ($request->image) {
            Storage::delete('public/images/'.$barang->image_path);
            $imagePath = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $imagePath);
        }
        
        $barang->update([
            'nama' => $request->nama,
            'jenis_id' => $request->jenis_id,
            'kondisi_id' => $request->kondisi_id,
            'keterangan' => $request->keterangan,
            'kecacatan' => $request->kecacatan,
            'jumlah' => $request->jumlah,
            'image_path' => $imagePath
        ]);

        return redirect()->route('barang')->with('success', 'Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findorfail($id);
        Storage::delete('public/images/'.$barang->image_path);
        $barang->delete();
        return redirect()->route('barang')->with('success', 'Delete successfully!');
    }
}
