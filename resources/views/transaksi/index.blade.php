@extends('admin.admin')
@section('title', 'Transaksi')

@section('content')
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Transaksi</h3>
            
          </div>
          <!-- /.card-header -->
          
          <!--<div class="row justify-content-center">-->
          <!--  <div class="col-md-6">-->
          <!--      <form class="form-horizontal" action="{{ route('transaksi.store') }}" method="POST">-->
          <!--          @csrf-->
          <!--          <div class="card-body">-->
          <!--              <div class="form-group row">-->
          <!--                  <label for="acara_id" class="col-sm-2 col-form-label">Acara</label>-->
          <!--                  <select class="form-control col-sm-10 select2bs4" name="acara_id" id="acara_id">-->
          <!--                      <option value="" selected="selected">Pilih Acara...</option>-->
          <!--                      @foreach ($acaras as $acara)-->
          <!--                          <option value="{{ $acara->id }}"> {{ $acara->nama_acara }}</option>-->
          <!--                      @endforeach-->
          <!--                  </select>-->
          <!--              </div>-->
          <!--              <div class="form-group row">-->
          <!--                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>-->
          <!--                  <input type="text" name="nama" id="nama" class="form-control col-sm-10">-->
          <!--              </div>-->
          <!--              <div class="form-group row">-->
          <!--                  <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>-->
          <!--                  <input type="tel" name="telpon" id="telpon" class="form-control col-sm-10">-->
          <!--              </div>-->
          <!--              <div class="form-group row">-->
          <!--                  <label for="email" class="col-sm-2 col-form-label">Email</label>-->
          <!--                  <input type="email" name="email" id="email" class="form-control col-sm-10">-->
          <!--              </div>-->
          <!--              <div class="form-group row">-->
          <!--                  <label for="qty" class="col-sm-2 col-form-label">Qty</label>-->
          <!--                  <input type="number" name="qty" id="qty" class="form-control col-sm-10">-->
          <!--              </div>-->

          <!--          </div>-->
                    <!-- /.card-body -->
          <!--          <div class="card-footer">-->
          <!--            <button type="submit" class="btn btn-info">Proses</button>-->
          <!--            <input class="btn btn-default float-right" type="reset" value="Reset" />-->
          <!--          </div>-->
                    <!-- /.card-footer -->
          <!--        </form>-->
          <!--  </div>-->
          <!-- </div>-->

          <div class="row">
            <div class="card-body col-md-12">
                @include('admin.alertvalidasi')
                <table id="transaksi" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Invoice Date</th>
                    <th>Invoice</th>
                    <th>Nama Tiket</th>
                    <th>Pemesan</th>
                    <th>Qty</th>
                    <th>Harga Tiket</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($transaksis as $item)
                          <tr>
                              <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('LL HH:mm') }}</td>
                              <td>{{ $item->invoice }}</td>
                              <td>{{ $item->acara['nama_acara'] }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->qty }}</td>
                              <td>@convert($item->acara['harga'])</td>
                              <td>@convert($item->acara['harga']*$item->qty)</td>
                              <td>
                                @if ($item->status=='Lunas')
                                    <span class="badge badge-success">{{ $item->status }}</span>
                                @elseif ($item->status=='Cancel')
                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                @else
                                    <span class="badge badge-warning">{{ $item->status }}</span>
                                @endif
                              </td>
                              <td class="text-center">
                                  @if ($item->status=='Cancel')
                                  <div class="btn-group">
                                    <a class="btn btn-info" href="{{ URL::to('/admin/transaksi/'.$item['id']) }}"><i class="fa fa-eye"></i></a>
                                  </div>
                                  @else
                                    <form method="POST" action="{{ URL::to('/admin/transaksi/'.$item['id']) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="{{ URL::to('/admin/transaksi/'.$item['id']) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-success" href="{{ URL::to('/admin/transaksi/'.$item['id']) . '/edit' }}"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                  @endif
                            </td>
                          </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Invoice Date</th>
                    <th>Invoice</th>
                    <th>Nama Tiket</th>
                    <th>Pemesan</th>
                    <th>Qty</th>
                    <th>Harga Tiket</th>
                    <th>Total</th>
                    <th>Status</th>
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

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/theme/admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/theme/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<script src="{{ asset('/theme/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- /.Select2 -->

<script>
    $(function () {
     $('#transaksi').DataTable({
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

       //Initialize Select2 Elements
        $('.select2 ').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        });
    });
</script>
@endpush
