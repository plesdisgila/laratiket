@extends('admin.admin')
@section('title','kategori ' .  $kategori->nama)
@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                Kategori {{ $kategori->nama }}
            </h3>
          </div>
          <div class="card-body pad table-responsive">
            Kategori {{ $kategori->nama }}
          </div>
        </div>
    </div>
</div>

@endsection
