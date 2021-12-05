@extends('layouts.main')
@section('content')
<section id="events" class="events">
    <div class="container">
        <div class="row">

                @foreach ($acaras as $acara)
                <div class="col-md-4">
                    @if (file_exists('upload/images/'.$acara->gambar))
                        <img class="img-fluid pad" src="/upload/images/{{ $acara->gambar }}" alt="Photo" >
                    @else
                        <img class="img-fluid pad" src="{{ $acara->gambar }}" alt="Photo" >
                    @endif
                    <h3><a href="{{ route('acara.detail', $acara->slug_acara ) }}" target="_blank"> {{ $acara->nama_acara }} </a></h3>
                    <p>
                        <div class="event-meta">
                            <div class="venue">
                                <span class="label label-default">
                                    <i class="nav-icon fas fa-map text-primary"></i>
                                    {{ $acara->lokasi }}
                                </span>
                            </div>
                            <div class="datetime">
                                <span class="label label-info">
                                    <i class="nav-icon fas fa-calendar text-primary"></i>
                                    {{ \Carbon\Carbon::parse($acara->waktu)->isoFormat('LL') }}
                                </span>
                            </div>

                        </div>
                    </p>
                </div>
                @endforeach

        </div>
    </div>

    <div class="pagination justify-content-center pt-3">
        {{ $acaras->links() }}
    </div>

    <div class="pagination justify-content-center">
        <P>
        Menampilkan {{$acaras->currentpage()*$acaras->perpage()}}
        dari  {{$acaras->total()}} hasil

        {{-- Menampilkan  {{($acaras->currentpage()-1)*$acaras->perpage()+1}} to {{$acaras->currentpage()*$acaras->perpage()}}
        dari  {{$acaras->total()}} hasil --}}
        </P>
    </div>

</section>
@endsection
