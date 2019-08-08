@extends('layouts.app')

@section('content')
<div class="container">
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
                <a href="/barang/headphone" class="list-group-item list-group-item-action">Headphones</a>
                <a href="/barang/earphone" class="list-group-item list-group-item-action">Earphones</a>
                <a href="/barang/headset" class="list-group-item list-group-item-action">Headset</a>
                <a href="/barang/speaker" class="list-group-item list-group-item-action">Speaker</a>
            </div>
        </div>
    </div>
</div>
@endsection