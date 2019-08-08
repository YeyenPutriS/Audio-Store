@extends('layouts.app')

@section('content')          
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Transaksi</div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th width="100">Nama</th>
                            <td>{{$transaksi->user->first()->name}}</td>
                        </tr>
                        <tr>
                            <th width="100">Alamat</th>
                            <td>{{$transaksi->alamat}}</td>
                        </tr>
                        <tr>
                            <th width="100">Total</th>
                            <td>Rp. {{number_format($transaksi->total)}}</td>
                        </tr>
                        <tr>
                            <th colspan="2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$transaksi->id_transaksi}}" style="width:100%;">
                                    Input Nomor Resi
                                </button></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Transaksi</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah Beli</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            @foreach ($dtlTransaksi as $detail)
                            <tr>
                                <td>{{$detail->barang->first()->nama_barang}}</td>
                                <td>Rp. {{number_format($detail->barang->first()->harga)}}</td>
                                <td>{{$detail->barang->first()->kategori}}</td>
                                <td>{{$detail->jumlah}}</td>
                                <td>Rp. {{number_format($detail->subtotal)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="{{$transaksi->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Nomor Resi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('transaksi.update',$transaksi->id_transaksi)}}" method="post" id="addToCart">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="resi">Nomor Resi</label>
                    <input type="text" name="resi" id="resi" class="form-control">
                    <input type="hidden" name="state" value="pengiriman">
                </div>
                <button type="submit" class="btn btn-primary">Konfirmasi Pengiriman</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
