@extends('layouts.app')

@section('content')          
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Transaksi</div>
                <div class="card-body">
                    @if(count($getTransaksi)==0)
                    Tidak ada Transaksi Berlangsung
                    @else
                    <table class="table">
                        <thead>
                            <th>Nama Konsumen</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Nomor Resi</th>
                            <th>Detail</th>
                            @if(auth()->user()->role=='admin')
                            <th>Aksi</th>
                            @else
                            @endif
                        </thead>
                        <tbody>
                            @foreach($getTransaksi as $transaksi)
                            <tr>
                                <td>{{$transaksi->user->first()->name}}</td>
                                <td>{{$transaksi->alamat}}</td>
                                <td>{{$transaksi->status}}</td>
                                <td>{{$transaksi->resi}}</td>
                                <td><a href="/transaksi/{{$transaksi->id_transaksi}}" class="btn btn-outline btn-success">Detail</a></td>
                                @if(auth()->user()->role=='admin')
                                    @if($transaksi->status=='Menunggu Pengiriman')
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$transaksi->id_transaksi}}">
                                            Input Nomor Resi
                                        </button></td>
                                    @else
                                    @endif
                                @else
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($getTransaksi as $mdlTrx)
<!-- Modal -->
<div class="modal fade" id="{{$mdlTrx->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Nomor Resi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('transaksi.update',$mdlTrx->id_transaksi)}}" method="post" id="addToCart">
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
@endforeach
@endsection
