<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage()-1);
        $totalharga = Buku::sum('harga');
        return view('buku.index', compact('data_buku', 'no', 'totalharga'));
    }
    public function create()
    {
        //
        return view('buku.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|string|numeric',
            'tgl_terbit' => 'required|date',
        ]);
        //
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan','Buku Berhasil Disimpan');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
        $buku = Buku::find($id);
        return view('buku.edit', compact(['buku']));
    }
    public function update(Request $request, $id)
    {
        //
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan','Buku Berhasil Terupdate');
    }
    public function destroy($id)
    {
        //
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('buku')->with('pesan','Buku Berhasil Dihapus');
    }
}
