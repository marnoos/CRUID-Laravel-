<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
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
        $request->validate([
            'nama_produk' => 'required|min:3|max:50',
            'harga' => 'required|numeric|min:100',

        ], [
            'nama_produk.required' => 'Nama produk wajib di isi',
            'nama_produk.min' => 'Nama produk minimal 3 karakter',
            'harga.min' => 'Harga minimal adalah Rp.100',
        ]);
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
        $request->validate([
            'nama_produk' => 'required|min:3|max:10',
            'harga' => 'required|numeric|min:100',
        ]);
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
