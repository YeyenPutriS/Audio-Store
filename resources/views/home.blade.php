@extends('layouts.app')

@section('content')
    @if (auth()->user()->role=='admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Transaksi Menunggu</div>
                    <div class="card-body">
                        @if(count($getTransaksi)==0)
                        Tidak ada Transaksi Menunggu
                        @else
                        <div class="list-group">
                            @foreach ($getTransaksi as $transaksi)
                            <a href="/transaksi/{{$transaksi->id_transaksi}}" class="list-group-item list-group-item-action">{{$transaksi->user->first()->name}}</a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Data Barang</div>
                    <div class="card-body">
                        Jumlah barang terdaftar: {{$getBarang}} barang
                    </div>
                    <div class="card-footer text-muted">
                        <a href="/barang" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        <h4>{{session('success')}}</h4>
    </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/gambar/BRG001.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.45);">
                                <h2>Headphone</h2>
                                <p>Klik untuk cari headphone terbaik</p>
                                <a href="/barang/headphone" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/gambar/BRG007.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.45);">
                                <h2>Earphone</h2>
                                <p>Klik untuk cari earphone terbaik</p>
                                <a href="/barang/earphone" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/gambar/BRG011.png" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.45);">
                                <h2>Speaker</h2>
                                <p>Klik untuk cari speaker terbaik</p>
                                <a href="/barang/speaker" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/gambar/BRG012.png" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.45);">
                                <h2>Headset</h2>
                                <p>Klik untuk cari headset terbaik</p>
                                <a href="/barang/headset" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="list-group">
                    <p class="list-group-item list-group-item-action active">
                        Kategori
                    </p>
                    <a href="{{route('headphone')}}" class="list-group-item list-group-item-action">Headphones</a>
                    <a href="/barang/earphone" class="list-group-item list-group-item-action">Earphones</a>
                    <a href="/barang/headset" class="list-group-item list-group-item-action">Headset</a>
                    <a href="/barang/speaker" class="list-group-item list-group-item-action">Speaker</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
