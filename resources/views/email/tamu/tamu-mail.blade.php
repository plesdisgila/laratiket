@component('mail::message')
Hi {{ $transaksi->nama }},

Terima kasih telah memesan tiket **{{ $transaksi->acara->nama_acara }}**

@if ($transaksi->status =='Lunas')
Proses pemesanan tiket dan pembayaran Anda telah sukses!
Silahkan mencetak e-voucher yang kami sediakan pada tautan berikut.

@component('mail::button', ['url' => config('app.url') . 'invoice/' . $transaksi->invoice  , 'color' => 'success'])
Cetak Tiket
@endcomponent

@else
Proses pemesanan tiket Anda telah sukses!
Silahkan melakukan pembayaran dengan menghubungi nomor WhatsApp 082213377848
@endif

<table class="table">
    <tr>
        <th>Nama Event </th>
        <td>: {{ $transaksi->acara->nama_acara }}</td>
    </tr>

    <tr>
        <th>Lokasi Event </th>
        <td>: {{ $transaksi->acara->lokasi }}</td>
    </tr>

    <tr>
        <th>Waktu Event </th>
        <td>: {{ \Carbon\Carbon::parse($transaksi->acara->waktu)->isoFormat('MMM Do YYYY HH:mm')  }}</td>
    </tr>

    <tr>
        <th>Invoice </th>
        <td>: {{ $transaksi->invoice }}</td>
    </tr>

    <tr>
        <th>Status Invoice </th>
        <td>: {{ $transaksi->status }}</td>
    </tr>

    <tr>
        <th>Invoice Date </th>
        <td>: {{ \Carbon\Carbon::parse($transaksi->created_at)->isoFormat('MMM Do YYYY HH:mm') }}</td>
    </tr>
    @if ($transaksi->status =='Lunas')
    <tr>
        <th>URL e-Voucher</th>
        <td>
            : <a href="{{ config('app.url') . 'invoice/' . $transaksi->invoice }}">Klik disini </a>
        </td>
    </tr>
    @else

    @endif
</table>

Detail pesanan anda:
@component('mail::table')
|Ringkasan                       |Harga per Tiket                   |Kuantitas            |Jumlah                                           |
|--------------------------------|:--------------------------------:|:-------------------:|:------------------------------------------------:|
| {{ $transaksi->acara->jenis }} |@convert($transaksi->acara->harga)|{{ $transaksi->qty }}|@convert($transaksi->acara->harga*$transaksi->qty)|
| |Grand Total| |@convert($transaksi->acara->harga*$transaksi->qty)|
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
