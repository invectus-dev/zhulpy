<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    public function create(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'nama' => 'required',
        //     'kategori_id' => 'required|exists:kategoris,id',
        //     'kamar' => 'required|numeric',
        //     'alamat' => 'required|string',
        //     'harga' => 'required|numeric',
        //     'luas_tanah' => 'required|numeric',
        //     'luas_bagunan' => 'required|numeric',
        //     'status' => 'required|in:baru,terjual',
        //     'jenis' => 'required|in:rumah,apartemen,ruko',
        // ]);

        $product = produk::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'kamar' => $request->kamar,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'luas_tanah' => $request->luas_tanah,
            'luas_bangunan' => $request->luas_bagunan,
            'status' => $request->status,
            'jenis' => $request->jenis,
            'fasilitas_tambahan' => $request->fasilitas_tambahan
        ]);

        foreach ($request->file('foto') as $file) {
            if ($file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('properti'), $filename);
                $product->foto()->create(['foto' => $filename, 'produk_id' => $product->id]);
            }
        }


        if(Auth::user()->role != 'admin'){
            User::where('id', Auth::user()->id)->update([
                'quota' => Auth::user()->quota - 1
            ]);
        }


        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function preview($id)
    {
        $product = produk::where('id', $id)->with('user')->first();
        $product->look = $product->look + 1;
        $product->save();

        return view('preview', compact('product'));
    }

    public function postingan()
    {
        $products = produk::where('user_id', Auth::user()->id)->get();

        return view('user', compact('products'));
    }

    public function habis(Request $request){
       produk::where('id', $request->id)->delete();


       $foto = foto::where('produk_id', $request->id)->get();

        foreach ($foto as $f) {
            unlink(public_path('properti/' . $f->foto));
            $f->delete();
        }


        return redirect()->back();
    }
    
}
