@extends('layouts.main')
@section('content')
<section id="events" class="events">
    <script>
        $(document).ready(function(){
            $(".checkout").on("keyup", ".quantity", function(){
                var price = +$(".price").data("price");
                var quantity = +$(this).val();
                $("#total").text("Rp. " + price * quantity + ",00");
            })
        })
    </script>

    @foreach ($acara as $acara)
    @section('title', $acara->nama_acara)

    <div class="container">
            <div class="row pd-2 m-3 justify-content-center border">
                <div class="col-12">
                    @if (file_exists('upload/images/'.$acara->gambar))
                        <img class="img-fluid pad" src="/upload/images/{{ $acara->gambar }}" alt="Photo" width="200%">
                    @else
                        <img class="img-fluid pad" src="{{ $acara->gambar }}" alt="Photo" width="200%">
                    @endif
                    <h1>{{ $acara->nama_acara }}</h1>
                </div>

                <div class="col-6 py-4">
                    <h5 class="card-title">Lokasi</h5>
                    <p class="card-text">
                        <i class="fas fa-map-marker"></i> {{ $acara->lokasi }}
                    </p>
                </div>
                <div class="col-6 py-4">
                    <h5 class="card-title">Tanggal dan Waktu</h5>
                    <p class="card-text">
                        <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($acara->waktu)->isoFormat('LL') }}
                        <br>
                        <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($acara->waktu)->isoFormat('LT') }} - Selesai
                    </p>
                </div>
            </div>

            <main role="main" class="container">
                <div class="row">
                  <div class="col-md-12 blog-main">
                    <div class="blog-post">
                        <ul class="nav nav-pills nav-fill my-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Deskripsi</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tiket</a>
                            </li>
                        </ul>
                        @include('admin.alertvalidasi')
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                {!! $acara->deskripsi !!}
                            </div>

                            <div class="checkout tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                @if(!empty($acara->jumlah))
                                    <form action="{{ URL::to('/acara') }}" method="POST">
                                        @csrf
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                  <h6 class="my-1 pr-1">Nama </h6>
                                                </div>
                                                <input type="text" name="nama" id="nama" class="form-control col-md-8" placeholder="Masukkan Nama" value="{{ old('nama')}}">
                                            </li>
    
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                  <h6 class="my-1 pr-1">Telpon </h6>
                                                </div>
                                                <input type="tel" name="telpon" id="telpon" class="form-control col-md-8" placeholder="Masukkan No. Telpon" value="{{ old('telpon')}}">
                                            </li>
    
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                  <h6 class="my-1 pr-1">Email </h6>
                                                </div>
                                                <input type="email" name="email" id="email" class="form-control col-md-8" placeholder="Masukkan email" value="{{ old('email')}}">
                                            </li>
    
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                  <h6 class="my-1 pr-1">Harga </h6>
                                                </div>
                                                <span class="text-muted price" data-price="{{ $acara->harga }}">@convert($acara->harga)</span>
                                            </li>
    
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                  <h6 class="my-1 pr-1">Jumlah Tiket</h6>
                                                  <small class="text-muted">Jumlah tiket yang dibeli</small>
                                                </div>
                                                    <input type="number" class="quantity form-control col-md-3" min="0" max="{{ $acara->jumlah }}"
                                                    name="qty" value="{{ old('qty')}}">
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Total (IDR)</span>
                                                <p class="total">Total: <span id="total">Rp. 0,00</span></p>
                                              </li>
    
                                        </ul>
    
                                        <input type="hidden" name="acara_id" value="{{ $acara->id }}">
    
                                        <button type="submit" class="btn btn-primary col-md-12">Beli</button>
                                    </form>
                                    @else
                                    <h6 class="btn btn-danger col-md-12">Tiket Habis</h6>
                                    @endif
                            </div>

                          </div>
                    </div><!-- /.blog-post -->

                  </div><!-- /.blog-main -->

                </div><!-- /.row -->
            </main>
    </div>
    @endforeach
</section>
@endsection
