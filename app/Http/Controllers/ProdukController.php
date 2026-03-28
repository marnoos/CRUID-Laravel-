<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function create()
    {
        return view('tambah_produk');
    }

    public function index()
    {
        $produks = Produk::all();

        return view('welcome', compact('produks'));
    }

    public function store(Request $request)
    {
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
        ]);
        return redirect('/')->with('sucess', 'data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('edit_produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
        ]);
        return redirect('/')->with('sucess', 'data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/')->with('sucsess', 'data berhasil dihapus');
    }
}
