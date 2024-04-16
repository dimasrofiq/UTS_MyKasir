<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan ;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    public function index(): View
    {
        //get Data db
        $members = Pelanggan::latest()->paginate(5);
        return view('member.index', compact('members'));
    }

    public function create(): View
    {
        return view('member.create');
    }
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'NamaPelanggan'  => 'required|string|min:3',
            'Alamat'         => 'required',
            'NomorTelepon'   => 'required|max:13'
        ]);

        //create post
        Pelanggan::create([
            'NamaPelanggan' => $request->NamaPelanggan,
            'Alamat'        => $request->Alamat,
            'NomorTelepon'  => $request->NomorTelepon,
        
        ]);

        //redirect to index
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $members = Pelanggan::findOrFail($id);

        //render view with post
        return view('member.edit', compact('members'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'NamaPelanggan'  => 'required|min:3',
            'Alamat'         => 'required',
            'NomorTelepon'   => 'required'
        ]);
        //get post by ID
        $datas = Pelanggan::findOrFail($id);

            //update post without image
            $datas->update([
                'NamaPelanggan' => $request->NamaPelanggan,
                'Alamat'        => $request->Alamat,
                'NomorTelepon'  => $request->NomorTelepon
  
            ]);

        //redirect to index
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    

     // Hapus data
     public function destroy($id): RedirectResponse
     {
         //get post by ID
         $post = Pelanggan::findOrFail($id);
 
         //delete post
         $post->delete();
 
         //redirect to index
         return redirect()->route('member.index')->with(['success' => 'Data Berhasil Dihapus!']);
     }
}
