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
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($getBarang as $barang)
                        <tr>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{number_format($barang->harga)}}</td>
                            <td>{{$barang->kategori}}</td>
                            <td><img src="/gambar/{{$barang->foto}}" width="200"></td>
                            <td>
                                <a href="barang/{{$barang->kode_barang}}/edit" class="btn btn-warning">Edit</a>
                            <form action="{{route('barang.destroy',$barang->kode_barang)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    <a href="/barang/create" class="btn btn-primary">Tambah barang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
