<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        //get Data db
        $produks = Produk::latest()->paginate(5);
        return view('produk.index', compact('produks'));
    }

    public function create(): View
    {
        return view('produk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'NamaProduk' => 'required|min:3',
            'Harga'      => 'required',
            'Stok'       => 'required',
            'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/produks', $image->hashName());

        //create post
        Produk::create([
            'NamaProduk' => $request->NamaProduk,
            'Harga'      => $request->Harga,
            'Stok'       => $request->Stok,
            'image'      => $image->hashName()
        ]);

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // public function show(string $id): View
    // {
    //     //get post by ID
    //     $produks = Produk::findOrFail($id);

    //     //render view with post
    //     return view('produk.show', compact('produks'));
    // }

    public function edit(string $id): View
    {
        //get post by ID
        $produks = Produk::findOrFail($id);

        //render view with post
        return view('produk.edit', compact('produks'));
    }
   
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'NamaProduk' => 'required|min:3',
            'Harga'      => 'required',
            'Stok'       => 'required',
            'image'      => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        //get post by ID
        $datas = Produk::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/produks', $image->hashName());
            //delete old image
            Storage::delete('public/produks/'.$datas->image);

            //update post with new image
            $datas->update([
                'NamaProduk' => $request->NamaProduk,
                'Harga'      => $request->Harga,
                'Stok'       => $request->Stok,
                'image'      => $image->hashName()
            ]);
        } else {

            //update post without image
            $datas->update([
                'NamaProduk' => $request->NamaProduk,
                'Harga'      => $request->Harga,
                'Stok'       => $request->Stok
            ]);
        }
        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    
    // Hapus data
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Produk::findOrFail($id);

        //delete image
        Storage::delete('public/produks/'. $post->foto);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
