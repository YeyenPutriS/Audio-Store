@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Barang</div>
            
                <div class="card-body">
                    <form action="{{route('barang.update',$getBarang->kode_barang)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode Barang</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="{{$getBarang->kode_barang}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{$getBarang->nama_barang}}" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="" selected disabled>Pilih Kategori Barang</option>
                            <option value="headset">Headset</option>
                            <option value="headphone">Headphone</option>
                            <option value="speaker">Speaker</option>
                            <option value="earphone">Earphone</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="number" name="harga" id="harga" class="form-control" value="{{$getBarang->harga}}" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Barang</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection