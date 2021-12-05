@extends('admin.admin')
@section('title', 'Tambah Acara')

@section('content')
    <div class="row justify-content-center">
      <div class="col-12">
        <form action="{{ route('acara.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Acara</h3>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="card-body">
                        @include('admin.alertvalidasi')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_acara">Nama Acara</label>
                                    <input type="text" name="nama_acara" id="nama_acara" class="form-control" placeholder="Masukkan Nama Acara" value="{{ old('nama_acara')}}">
                                </div>

                                <div class="form-group">
                                    <label for="lokasi">Lokasi Acara</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan Lokasi Acara" value="{{ old('lokasi')}}">
                                </div>

                                <div class="form-group">
                                    <label for="jenis">Jenis Tiket</label>
                                    <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Masukkan Jenis Tiket" value="{{ old('jenis') }}">
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah Tiket</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah Tiket" value="{{ old('jumlah') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="waktu">Waktu Acara</label>
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="waktu" id="waktu"/>
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori Acara</label>
                                    <select class="form-control" name="kategori_id" id="kategori_id">
                                        <option value="" holder>Pilih Kategori...</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}"> {{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga Tiket</label>
                                    <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan harga Tiket" value="{{ old('harga') }}">
                                </div>

                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                            <label class="custom-file-label" for="gambar"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Acara</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control" placeholder="Deskripsi Acara">{!! old('deskripsi') !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer col-md-12">
                        <a href="{{ URL::to('admin') }}" class="btn btn-outline-info">Kembali</a>
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

@push('scripts')

<!-- summernote -->
<link rel="stylesheet" href="{{ asset('/theme/admin/plugins/summernote/summernote-bs4.min.css') }}">
<!-- Summernote -->
<script src="{{ asset('/theme/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function () {
      // Summernote
      $('#deskripsi').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
      });
    })
</script>

<!-- bs-custom-file-input -->
<script src="{{ asset('/theme/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>

<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('/theme/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<script src="{{ asset('/theme/admin/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('/theme/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            locale: 'id',
            icons: {
                time: 'far fa-clock',
                date: 'far fa-calendar',
            },
            format: "YYYY-MM-DD HH:mm"

        });
    });
</script>
@endpush
