<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\DetailPenjualan;
use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use PDF;
 

class DetailPenjualanController extends Controller
{
    public function  store(Request $request): RedirectResponse
    {
        $this->validate($request,[
        'PenjualanId'  => 'required|',
        'ProdukId'     => 'required|',
        'JumlahProduk' => 'required|'

        ]);

        $stoks= DB::table('produks')->where('id',$request->ProdukId)->value('Stok');


        if($request->JumlahProduk > $stoks) {
        return redirect('detailpenjualan/'.$request->PenjualanId.'/edit')->with(['Success' => 'Stok Tidak Tersedia']);

        }else{
        $pengstok = $stoks - $request->JumlahProduk;
        $jproduks = DB::table('produks')->where('id',$request->ProdukId)->value('Harga');
        $stotal = $jproduks * $request->JumlahProduk;

        DetailPenjualan::create([
            
            'PenjualanId' => $request->PenjualanId,
            'ProdukId' => $request->ProdukId,
            'JumlahProduk' => $request->JumlahProduk,
            'SubTotal' => $stotal
        ]);
        $total = DB::table('detailpenjualans')->where('PenjualanId',$request->PenjualanId)->sum('SubTotal');

        $penjualan = Penjualan::findOrFail($request->PenjualanId);

        $penjualan->update([
            'TotalHarga' => $total,
        ]);

        $produk = Produk::findOrFail($request->ProdukId);

        $produk ->update([
            'Stok' => $pengstok
        ]);
        }
        return redirect('detailpenjualan/'.$request->PenjualanId.'/edit')->with(['Success' => 'Data Berhasil Disimpan']);
            }

    public function edit(string $id): View
    {
         //get Data db join pelanggan dan penjualan
         $penjualans = DB::table('penjualans')
         ->join('pelanggans', 'pelanggans.id', '=', 'penjualans.PelangganId')
         ->select('pelanggans.*', 'penjualans.*')
         ->where ('penjualans.id','=',$id)
         ->get();
    
         $detailpenjualan = DB::table('detailpenjualans')
                    ->join('produks', 'produks.id', '=', 'detailpenjualans.ProdukId')
                    ->select('detailpenjualans.*', 'produks.NamaProduk')
                    ->where ('detailpenjualans.PenjualanId','=',$id)
                    ->get();
          
        //get Data db
        $produks = Produk::latest()->paginate(5);
        $ID= DB::table('penjualans')->where('id',$id)->value('id');


        //render view with post
        return view('detailpenjualan.tambah', compact('penjualans','produks', 'detailpenjualan','ID'));
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

 
    public function show($id)
    {
     $detailpenjualan = DB::table('detailpenjualans')
     ->join('produks', 'produks.id', '=', 'detailpenjualans.ProdukId')
     ->select('detailpenjualans.*', 'produks.NamaProduk')
     ->where ('detailpenjualans.PenjualanId','=',$id)
     ->get();

     $penjualans = DB::table('penjualans')
     ->join('pelanggans', 'pelanggans.id', '=', 'penjualans.PelangganId')
     ->select('pelanggans.NamaPelanggan', 'penjualans.TotalHarga')
     ->where ('penjualans.id','=',$id)
     ->get();


    
     $pdf = PDF::loadview('detailpenjualan/cetak_pdf', compact('detailpenjualan','penjualans'));
     return $pdf->stream('Laporan-Data-Penjualan.pdf');
    }


    public function destroy($id, $PenjualanId)
    {
          //get post by ID
          $post = DetailPenjualan::findOrFail($id);
          //delete post
          $post->delete();

  
          //redirect to index
          return redirect()->route('detailpenjualan/'.$PenjualanId.'/edit')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
