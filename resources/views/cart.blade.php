@extends('layouts.app')

@section('content')          
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Keranjang</div>
                <div class="card-body">
                    @if(count($getCart)==0)
                    Tidak ada barang terdaftar
                    @else
                    <table class="table">
                        <thead>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah Beli</th>
                            <th>Subtotal</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($getCart as $barang)
                            <tr>
                                <td>{{$barang->barang->first()->nama_barang}}</td>
                                <td>{{number_format($barang->barang->first()->harga)}}</td>
                                <td>{{$barang->barang->first()->kategori}}</td>
                                <td>{{$barang->jumlah}}</td>
                                <td>{{number_format($barang->subtotal)}}</td>
                                <td><form action="{{route('cart.destroy',$barang->id)}}" method="post" id="{{$barang->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" form="{{$barang->id}}">Hapus</button></td></form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Konfirmasi Pesanan</div>
                <div class="card-body">
                    @if(count($getCart)==0)
                    Tidak ada barang terdaftar
                    @else
                    <table class="table">
                        <tr>
                            <th>Jumlah Barang: </th>
                            <td>{{$getCart->sum('jumlah')}}</td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>Rp. {{number_format($getCart->sum('subtotal'))}}</td>
                        </tr>
                    </table>
                    <form action="{{route('transaksi.store')}}" method="post">
                        @csrf
                    <label for="alamat">Alamat Pengiriman</label>
                    <input type="text" name="alamat" class="form-control">
                    <input type="hidden" name="total" value="{{$getCart->sum('subtotal')}}">
                    <br>
                    <button type="submit" class="btn btn-primary" style="width:100%;">Checkout</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
