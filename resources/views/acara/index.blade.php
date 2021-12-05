@extends('admin.admin')
@section('title', 'Acara')

@section('content')
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Acara</h3>
            <div class="card-tools">
                <a href="{{ URL::to('/admin/acara/create')}}" class="btn btn-tool">
                    <i class="fa fa-plus"></i>
                    &nbsp; Tambah
                </a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="row">
            <div class="card-body col-md-12">
                @include('admin.alertvalidasi')
                <table id="acara" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Acara</th>
                    <th>Kategori</th>
                    <th>Jenis</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($acaras as $index => $item)
                      <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $item->nama_acara }}</td>
                          <td>{{ $item->kategori->nama }}</td>
                          <td>{{ $item->jenis }}</td>
                          <td>{{ $item->jumlah }}</td>
                          <td class="text-center">
                            <form method="POST" action="{{ URL::to('/admin/acara/'.$item['id']) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <div class="btn-group">
                                    <a class="btn btn-info" href="{{ URL::to('/admin/acara/'.$item['id']) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-success" href="{{ URL::to('/admin/acara/'.$item['id']) . '/edit' }}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </div>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Acara</th>
                    <th>Kategori</th>
                    <th>Jenis</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  <!-- /.container-fluid -->
@endsection

@push('scripts')
<script>
    $(function () {
     $('#acara').DataTable();
    });
</script>
@endpush
