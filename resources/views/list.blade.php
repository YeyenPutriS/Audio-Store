@extends('layouts.app')

@section('content')          
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Barang</div>
                <div class="card-body">
                    @if(count($getBarang)==0)
                    Tidak ada barang terdaftar
                    @else
                    <table class="table">
                        <thead>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($getBarang as $barang)
                            <tr>
                                <td>{{$barang->nama_barang}}</td>
                                <td>{{number_format($barang->harga)}}</td>
                                <td>{{$barang->kategori}}</td>
                                <td><img src="/gambar/{{$barang->foto}}" width="200"></td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$barang->kode_barang}}">
                                        Buy
                                    </button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                @if(auth()->user()->role=='admin')
                <div class="card-footer text-muted">
                    <a href="/barang/create" class="btn btn-primary">Tambah barang</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@foreach($getBarang as $mdlBrg)
<!-- Modal -->
<div class="modal fade" id="{{$mdlBrg->kode_barang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cart.store')}}" method="post" id="addToCart">
                @csrf
                <table class="table">
                    <tr>
                        <th>Nama Barang</th>
                        <td>{{$mdlBrg->nama_barang}}</td>
                    </tr>
                    <tr>
                        <th>Harga Barang</th>
                        <td>Rp. {{number_format($mdlBrg->harga)}}</td>
                    </tr>
                </table>
                <div class="form-group">
                    <label for="jml">Jumlah Beli</label>
                    <input type="number" name="jml" id="jml" class="form-control">
                </div>
                <input type="hidden" name="kode" value="{{$mdlBrg->kode_barang}}">
                <input type="hidden" name="harga" value="{{$mdlBrg->harga}}">
                <button type="submit" class="btn btn-primary">Tambahkan ke Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
