@extends('admin.admin')
@section('title','Acara ' .  $acara->nama_acara)
@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                Acara {{ $acara->nama_acara }}
            </h3>
          </div>
          <div class="card-body pad table-responsive">
            Kategori {{ $acara->kategori->nama }}
            <br>
            Waktu {{ \Carbon\Carbon::parse($acara->waktu)->isoFormat('LLLL') }}
            <br>
          </div>
          <div class="card-body">
            {{-- <img class="img-fluid pad" src="{{ asset('images/'.$acara->gambar) }}" alt="Photo" > --}}
            @if (file_exists('upload/images/'.$acara->gambar))
                <img class="img-fluid pad" src="/upload/images/{{ $acara->gambar }}" alt="Photo" >
            @else
                <img class="img-fluid pad" src="{{ $acara->gambar }}" alt="Photo" >
            @endif
            <p></p>
            {!! $acara->deskripsi !!}
          </div>
          <div>

          </div>
        </div>
    </div>
</div>

@endsection
