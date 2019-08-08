<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Cart;
use App\DetailTransaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transaksi';
        if(auth()->user()->role=='admin'){
            $getTransaksi=Transaksi::all();
        } elseif(auth()->user()->role=='user'){
            $getTransaksi=Transaksi::where('id_user',auth()->user()->id)->get();
        }
        
        return view('transaksi',compact('getTransaksi','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $htgTrx=Transaksi::count();
        if (($htgTrx)==0){
            $kodeTrx='TRX001';
        } else {
            $kodeTrx='TRX'.sprintf('%03s',$htgTrx+1);
        }
        $newTrx = new Transaksi;
        $newTrx->id_transaksi=$kodeTrx;
        $newTrx->id_user=auth()->user()->id;
        $newTrx->total=$request->input('total');
        $newTrx->alamat=$request->input('alamat');
        $newTrx->status='Menunggu Pengiriman';
        $newTrx->resi='Diinput setelah Pengiriman';
        $newTrx->save();

        $getCart = Cart::where('id_user',auth()->user()->id)->get();
        foreach($getCart as $cart) {
            $newDetail = new DetailTransaksi;
            $newDetail->id_transaksi = $kodeTrx;
            $newDetail->kode_barang = $cart->kode_barang;
            $newDetail->jumlah = $cart->jumlah;
            $newDetail->subtotal = $cart->subtotal;
            $newDetail->save();
        }
        $delCart = Cart::where('id_user',auth()->user()->id)->delete();
        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi=Transaksi::find($id);
        $dtlTransaksi=DetailTransaksi::where('id_transaksi',$id)->get();
        return view('detail',compact('transaksi','dtlTransaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('state')=='pengiriman'){
            $kirim = Transaksi::find($id);
            $kirim->status='Telah Dikirim';
            $kirim->resi=$request->input('resi');
            $kirim->save();
        }
        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
