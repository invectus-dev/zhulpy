<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $data['user'] = User::where('role', '!=', 'admin')->get();
        $data['kategori'] = kategori::with('produk')->get();

        return view('admin')->with($data);
    }

    public function tambah(Request $request)
    {
        User::where('id', $request->user_id)->update(['quota' => $request->quota]);

        return redirect()->back();
    }

    public function tambahKategori(Request $request)
    {
        kategori::create([
            'kategori' => $request->kategori
        ]);

        return redirect()->back();
    }

    public function hapusKategori($id)
    {
        kategori::where('id', $id)->delete();
        produk::where('kategori_id', $id)->delete();

        return redirect()->back();
    }
}
