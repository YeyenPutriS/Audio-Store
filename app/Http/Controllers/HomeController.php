<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title='Home';
        $getTransaksi=Transaksi::where('status','Menunggu Pengiriman')->get();
        $getBarang=Barang::count();
        return view('home',compact('title','getTransaksi','getBarang'));
    }
}
