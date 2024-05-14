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
        // validate form
        $this->validate($request, [
            'TanggalPenjualan' => 'required',
            'PelangganId' => 'required',
            'TotalHarga' => 'required|numeric' // tambahkan validasi untuk memastikan TotalHarga diisi dan berupa angka
        ]);
    
        // create post
        Penjualan::create([
            'TanggalPenjualan' => $request->TanggalPenjualan,
            'PelangganId' => $request->PelangganId,
            'TotalHarga' => $request->TotalHarga // tambahkan field TotalHarga ke dalam data yang akan disimpan
        ]);
    
        // redirect to index
        return redirect()->route('penjualan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    public function edit(string $id): View
    {
        // Dapatkan data penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id);
    
        // Dapatkan semua data pelanggan untuk opsi dropdown
        $pelanggans = Pelanggan::latest()->get();
    
        // Render view dengan data penjualan dan data pelanggan
        return view('penjualan.edit', compact('penjualan', 'pelanggans'));
    }
    
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'TanggalPenjualan' => 'required',
            'PelangganId' => 'required',
            'TotalHarga' => 'required|numeric' // Tambahkan validasi untuk memastikan TotalHarga diisi dan berupa angka
        ]);
    
        // Dapatkan data penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id);
    
        // Perbarui data penjualan, termasuk TotalHarga
        $penjualan->update([
            'TanggalPenjualan' => $request->TanggalPenjualan,
            'PelangganId' => $request->PelangganId,
            'TotalHarga' => $request->TotalHarga // Sertakan juga field TotalHarga untuk diperbarui
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
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
