@extends('admin.admin')
@section('title','Transaksi ' .  $transaksi->invoice)
@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                Transaksi {{ $transaksi->invoice }}
            </h3>
          </div>
          <div class="card-body pad table-responsive">
            Acara : {{ $transaksi->acara->nama_acara }}
            <br>
            Waktu : {{ \Carbon\Carbon::parse($transaksi->acara->waktu)->isoFormat('LLLL') }}
            <br>
            Kategori : {{ $transaksi->acara->kategori->nama }}
          </div>
          <div class="card-body">
              <table class="table table-striped col-md-6">
                <tr>
                    <th>Nama</th>
                    <td>{{ $transaksi->nama }}</td>
                </tr>
                <tr>
                    <th>No Telpon</th>
                    <td>{{ $transaksi->telpon }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $transaksi->email }}</td>
                </tr>
                <tr>
                    <th>Qty</th>
                    <td>{{ $transaksi->qty }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $transaksi->status }}</td>
                </tr>
            </table>
          </div>
          <div>
          </div>
        </div>
    </div>
</div>


@endsection
