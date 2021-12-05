@extends('admin.admin')
@section('title', 'Edit Transaksi '.$transaksi->invoice)

@section('content')
    <div class="row justify-content-center">
      <div class="col-6">
        <form action="{{ route('transaksi.update',$transaksi->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Transaksi {{ $transaksi->invoice }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="acara_id" class="col-sm-2 col-form-label">Acara</label>
                            <select class="form-control col-sm-10 select2bs4" name="acara_id" id="acara_id" disabled>
                                <option value="" selected="selected">Pilih Acara...</option>
                                @foreach ($acaras as $acara)
                                    <option value="{{ $acara->id }}" {{ $acara->id == $transaksi->acara_id ? 'selected' : '' }}> {{ $acara->nama_acara }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control col-sm-10" value="{{ old('nama') ?? $transaksi->nama }}">
                        </div>
                        <div class="form-group row">
                            <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
                            <input type="tel" name="telpon" id="telpon" class="form-control col-sm-10" value="{{ old('telpon') ?? $transaksi->telpon }}">
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control col-sm-10" value="{{ old('email') ?? $transaksi->email }}">
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                            <input type="number" name="qty" id="qty" class="form-control col-sm-10" value="{{ old('qty') ?? $transaksi->qty }}">
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <select class="form-control col-sm-10 select2bs4" name="status" id="status">
                                <option value="" selected="selected">Status...</option>
                                @foreach ($transaksi->statusOptions() as $statusOptionKey => $statusOptionValue)
                                    <option value="{{ $statusOptionKey }}" {{ $transaksi->status == $statusOptionValue ? 'selected' : '' }}> {{ $statusOptionValue }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer col-md-12">
                        <a href="{{ URL::previous() }}" class="btn btn-outline-info">Kembali</a>
                        <button type="submit" class="btn btn-primary pull-right">Proses</button>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  <!-- /.container-fluid -->
@endsection
