@extends('layouts.main')
@section('content')
<div class="container">

        <h1>HUBUNGI KAMI</h1>
        <p>
            Kesulitan dalam mememesan tiket? Jangan ragu untuk bertanya langsung melalui form di bawah ini.
        </p>

        <form action="{{ url('/hubungi-kami') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                <div>
                    {{ $errors->first('nama') }}
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                <div>
                    {{ $errors->first('email') }}
                </div>
            </div>

            <div class="form-group">
                <label for="pesan">Pesan kamu</label>
                <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                <div>
                    {{ $errors->first('pesan') }}
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
</div>

@endsection
