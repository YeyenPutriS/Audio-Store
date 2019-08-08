<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Barang';
        $getBarang=Barang::all();
        return view('barang.barang',compact('getBarang','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htgBrg=Barang::count();
        if (($htgBrg)==0){
            $kodeBrg='BRG001';
        } else {
            $kodeBrg='BRG'.sprintf('%03s',$htgBrg+1);
        }
        return view('barang.tambahBarang',compact('kodeBrg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $fotoExt = $foto->getClientOriginalExtension();
        $foto->move(public_path('gambar'), $request->input('kode').'.'.$fotoExt);

        $newBarang = new Barang;
        $newBarang->kode_barang = $request->input('kode');
        $newBarang->nama_barang = $request->input('nama');
        $newBarang->kategori = $request->input('kategori');
        $newBarang->harga = $request->input('harga');
        $newBarang->foto= $request->input('kode').'.'.$fotoExt;
        $newBarang->save();
        
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getBarang = Barang::find($id);
        return view('barang.editBarang',compact('getBarang'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delBarang=Barang::find($id)->delete();
        return redirect('/barang');
    }

    public function headphone()
    {
        $getBarang=Barang::where('kategori','headphone')->get();
        return view('list',compact('getBarang'));
    }

    public function earphone()
    {
        $getBarang=Barang::where('kategori','earphone')->get();
        return view('list',compact('getBarang'));
    }

    public function speaker()
    {
        $getBarang=Barang::where('kategori','speaker')->get();
        return view('list',compact('getBarang'));
    }

    public function headset()
    {
        $getBarang=Barang::where('kategori','headset')->get();
        return view('list',compact('getBarang'));
    }

    public function cari(Request $request)
    {
        $cari=$request->input('cari');
        $getBarang=Barang::where('nama_barang','like',"%".$cari."%")->get();
        return view('list',compact('getBarang'));
    }
}
