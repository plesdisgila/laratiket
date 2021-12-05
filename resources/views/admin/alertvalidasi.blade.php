@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
            <h5>{{ $error }}</h5><br>
    @endforeach
</div>
@endif
            @if (Session::has('tambah'))
            <div id="alert-msg" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('tambah') }}
            </div>
            @endif

            @if (Session::has('update'))
            <div id="alert-msg" class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('update') }}
            </div>
            @endif

            @if (Session::has('danger'))
            <div id="alert-msg" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('danger') }}
            </div>
            @endif
