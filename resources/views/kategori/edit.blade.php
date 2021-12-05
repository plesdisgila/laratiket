@extends('admin.admin')
@section('title', 'Edit Kategori '.$kategori->nama_kategori)

@section('content')
    <div class="row justify-content-center">
      <div class="col-6">
        <form action="{{ route('kategori.update',$kategori->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Kategori {{ $kategori->nama_kategori }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="card-body col-md-12">
                        @include('admin.alertvalidasi')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Nama Kategori</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Kategori" value="{{ old('nama') ?? $kategori->nama }}">
                                </div>
                            </div>
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
