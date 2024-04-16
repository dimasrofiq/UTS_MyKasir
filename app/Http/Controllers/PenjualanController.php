<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Penjualan;
use App\Models\Pelanggan ;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenjualanController extends Controller
{
    public function index(): View
    {
        //get Data db join pelanggan dan penjualan
        $penjualans = DB::table('pelanggans')
        ->join('penjualans', 'pelanggans.id', '=', 'penjualans.PelangganId')
        ->select('pelanggans.*', 'penjualans.*')
        ->get();

        return view('penjualan.index', compact('penjualans'));
    }

    public function create(): View
    {
        $pelanggans = Pelanggan::latest()->paginate(5);
        return view('penjualan.create', compact('pelanggans'));

    }
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'TanggalPenjualan'  => 'required',
            'PelangganId'       => '',
            'TotalHarga'       => ''
        ]);

        //create post
        Penjualan::create([
            'TanggalPenjualan'  => $request->TanggalPenjualan,
            'PelangganId'       => $request->PelangganId
           

        
        ]);

        //redirect to index
        return redirect()->route('penjualan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $penjualans = Penjualan::findOrFail($id);

        //render view with post
        return view('penjualan.edit', compact('penjualans'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'TanggalPenjualan'   => 'required',
            'PelangganId'        => 'required'
        ]);
        //get post by ID
        $datas = Penjualan::findOrFail($id);

            //update post without image
            $datas->update([
                'TanggalPenjualan'  => $request->TanggalPenjualan,
                'PelangganId'       => $request->PelangganId
  
            ]);

        //redirect to index
        return redirect()->route('penjualan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


     // Hapus data
     public function destroy($id): RedirectResponse
     {
         //get post by ID
         $post = Penjualan::findOrFail($id);
 
         //delete post
         $post->delete();
 
         //redirect to index
         return redirect()->route('penjualan.index')->with(['success' => 'Data Berhasil Dihapus!']);
     }
}
