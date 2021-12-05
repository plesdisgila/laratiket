
@foreach ($transaksi as $transaksi)
<head>
    <title>
        {{ $transaksi->invoice }}
    </title>
</head>

<body>
@if ($transaksi->status =='Lunas')


    <div class="site-header">
        <div class="site-header__logo">
            <em>E-Voucher</em>
        </div>
        <div class="site-header__action">
            <button onCLick="window.print();set_voucher_print();" id="button-print" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
                    <path d="M128 224h256v224H128zM127.5 224.5h256v224h-256zM111.5 64.5h288v32h-288zM432.5 112.5h-352c-17.645 0-33 12.842-33 30.31V301.2c0 17.468 15.355 33.3 33 33.3h31v-126h288v126h33c17.645 0 31-15.832 31-33.3V142.81c0-17.468-13.355-30.31-31-30.31z" />
                </svg> Print E-Voucher
            </button>
        </div>
    </div>
    @for ($i = 1; $i <= $transaksi->qty; $i++)
    <div class="content_template">
        <div class="evoucher-wrapper">
            <div class="evoucher">
                <table>
                    <tr>
                        <td style="width:75%;text-transform:uppercase;font-weight:700;padding:6px 12px;font-size:14px;">
                            <div class="editable__">
                                Ticket Type : <span style="color:#FF3A2D;"> {{ $transaksi->acara->nama_acara }} </span>
                                (@convert($transaksi->acara->harga))
                            </div>
                        </td>
                    </tr>
                </table>
            <table>
                <tr>
                    <td rowspan="2" style="width:75%;padding:10px 0px;vertical-align:middle;">
                        <div style="position:relative;">
                            @if (file_exists('upload/images/'.$transaksi->acara->gambar))
                                <img class="image_banner" src="/upload/images/{{ $acara->gambar }}" alt="Photo" style="display:block;max-width:460px;height:240px;margin:auto;padding:0px 10px;">
                            @else
                                <img class="image_banner" src="{{ $transaksi->acara->gambar }}" alt="Photo" style="display:block;max-width:460px;height:240px;margin:auto;padding:0px 10px;">
                            @endif

                        </div>
                    </td>
                    <td style="text-align:center;vertical-align:middle;padding:0px;">
                        <div style="position:relative;height:100px;">

                            {{-- <img src="https://s3-ap-southeast-1.amazonaws.com/loket-production-sg/images/organization/20200928193226_5f71d7da460c8.png" class="image_logo" alt="" style="width: 100px;height: 100px;"> --}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;padding:0px 10px">
                        {{-- <span style="height:60px;"><img src="https://neo.loket.com/barcode/gen_barcode1d/4760332277843054" alt="4760332277843054" style="height:60px;"></span>
                        <small style="display:block;margin:0;line-height:1.2;">
                            <b>4760332277843054</b>
                        </small> --}}
                        <span style="display:block;margin:0;line-height:1.2;font-size:12px;">
                            <br>
                            <b>TICKET {{ $i . ' of ' . $transaksi->qty }}</b>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center; text-transform:none; font-weight:700; font-size:13px; whitespace:nowrap; padding:6px 12px;">
                        <div class="editable__">
                            {{ $transaksi->acara->nama_acara }}
                            <br>
                            {{ \Carbon\Carbon::parse($transaksi->acara->waktu)->isoFormat('LL HH:mm') }} &ndash; Selesai
                            <br>
                            {{ $transaksi->acara->lokasi }}
                            <br>
                            Loket Headquarter
                        </div>
                    </td>
                    <td style="text-align:center;line-height:1.2;padding:8px 12px;font-size:13px;">
                        <div class="editable__">
                            <b>
                                {{ substr($transaksi->invoice, 4) }}
                                <br>
                                @if ( $i > 1)
                                    Guest_{{ $i . ' of ' . $transaksi->nama }}
                                @else
                                    {{ $transaksi->nama }}
                                @endif

                            </b>
                            <br>
                                Ordered on {{ \Carbon\Carbon::parse($transaksi->created_at)->isoFormat('LL') }}
                            <br>
                                Ref: Online
                            <br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2 style="margin:0 0;font-size:18px;color:#FF3A2D;text-transform:uppercase;text-align: center;" class="editable__">Terms & Condition</h2>
                        <table class="toc">
                            <tr>
                                <td style="width:100%">
                                    <div class="editable__">
                                    </div>
                                </td>
                            </tr>
            </table>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td style="text-align:center;white-space:nowrap;font-size:14px;font-weight:700;width:33.33333%;text-transform:uppercase;">
                        <span class="editable__">
                        www.<span style="color:#FF3A2D;">laratiket</span>.com
                        </span>
                    </td>
                    <td style="text-align:center;white-space:nowrap;color:#FF3A2D;font-size:14px;font-weight:700;width:33.33333%;text-transform:uppercase;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32">
                        <path d="M22 20c-2 2-2 4-4 4s-4-2-6-4-4-4-4-6 2-2 4-4-4-8-6-8-6 6-6 6c0 4 4.11 12.11 8 16s12 8 16 8c0 0 6-4 6-6s-6-8-8-6z" />
                        </svg>&nbsp;
                        <span class="editable__">
                        +62822-1337-7848
                        </span>
                    </td>
                    <td style="text-align:center;white-space:nowrap;color:#FF3A2D;font-size:14px;font-weight:700;width:33.33333%;text-transform:uppercase;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32">
                        <path d="M32 6.076c-1.177.522-2.443.875-3.77 1.034 1.354-.813 2.395-2.1 2.886-3.632-1.27.752-2.674 1.3-4.17 1.593C25.75 3.796 24.044 3 22.157 3c-3.627 0-6.566 2.94-6.566 6.565 0 .515.058 1.016.17 1.496-5.456-.275-10.294-2.89-13.532-6.86-.565.97-.89 2.096-.89 3.3 0 2.278 1.16 4.287 2.922 5.465-1.076-.034-2.088-.33-2.974-.82v.082c0 3.18 2.262 5.834 5.265 6.437-.55.15-1.13.23-1.73.23-.422 0-.833-.04-1.234-.118.835 2.608 3.26 4.506 6.133 4.56-2.248 1.76-5.08 2.81-8.155 2.81-.53 0-1.052-.032-1.566-.093 2.904 1.863 6.355 2.95 10.063 2.95 12.076 0 18.68-10.004 18.68-18.68 0-.285-.007-.568-.02-.85C30.006 8.55 31.12 7.394 32 6.077z" fill="#55acee">
                        </svg>&nbsp;
                        <span class="editable__">
                        @loketcom
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;white-space:nowrap;font-size:12px;font-weight:700;width:33.33333%;">
                        Powered by <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="break"></div><div class="content_template">

    @endfor
<style type="text/css">
    *,
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    html {
        font-family: Arial, sans-serif;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }

    body {
        margin: 0;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    menu,
    nav,
    section,
    summary {
        display: block;
    }

    audio,
    canvas,
    progress,
    video {
        display: inline-block;
        vertical-align: baseline;
    }

    audio:not([controls]) {
        display: none;
        height: 0;
    }

    [hidden],
    template {
        display: none;
    }

    a {
        background-color: transparent;
    }

    a:active,
    a:hover {
        outline: 0;
    }

    abbr[title] {
        border-bottom: 1px dotted;
    }

    b,
    strong {
        font-weight: bold;
    }

    dfn {
        font-style: italic;
    }

    h1 {
        font-size: 2em;
        margin: 0.67em 0;
    }

    mark {
        background: #ff0;
        color: #000;
    }

    small {
        font-size: 80%;
    }

    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
    }

    sup {
        top: -0.5em;
    }

    sub {
        bottom: -0.25em;
    }

    img {
        border: 0;
    }

    svg:not(:root) {
        overflow: hidden;
    }

    figure {
        margin: 1em 40px;
    }

    hr {
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        height: 0;
    }

    pre {
        overflow: auto;
    }

    code,
    kbd,
    pre,
    samp {
        font-family: monospace, monospace;
        font-size: 1em;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        color: inherit;
        font: inherit;
        margin: 0;
    }

    button {
        overflow: visible;
    }

    button,
    select {
        text-transform: none;
    }

    button,
    html input[type="button"],
    input[type="reset"],
    input[type="submit"] {
        -webkit-appearance: button;
        cursor: pointer;
    }

    button[disabled],
    html input[disabled] {
        cursor: default;
    }

    button::-moz-focus-inner,
    input::-moz-focus-inner {
        border: 0;
        padding: 0;
    }

    input {
        line-height: normal;
    }

    input[type="checkbox"],
    input[type="radio"] {
        box-sizing: border-box;
        padding: 0;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        height: auto;
    }

    input[type="search"] {
        -webkit-appearance: textfield;
        -moz-box-sizing: content-box;
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
    }

    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-decoration {
        -webkit-appearance: none;
    }

    fieldset {
        border: 1px solid #c0c0c0;
        margin: 0 2px;
        padding: 0.35em 0.625em 0.75em;
    }

    legend {
        border: 0;
        padding: 0;
    }

    textarea {
        overflow: auto;
    }

    optgroup {
        font-weight: bold;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    td,
    th {
        padding: 0;
    }

    body {
        font-size: 8pt;
        line-height: 1.5;
        padding-top: 48px;
        background: #eee;
    }

    img {
        max-width: 100%;
    }

    table {
        width: 100%;
    }

    body {
        font-size: 16px;
    }

    .site-header {
        height: 48px;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        background: rgba(255, 255, 255, 0.88);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 1px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 0 16px;
        z-index: 99;
    }

    .site-header__logo {
        float: left;
    }

    .site-header__logo em {
        display: block;
        font-size: 20px;
        font-weight: 400;
        text-transform: uppercase;
        font-style: normal;
        line-height: 48px;
        color: #d9531e;
    }

    .site-header__action {
        float: right;
        padding: 8px 0;
    }

    .site-header__action .btn {
        display: block;
        vertical-align: middle;
        line-height: 22px;
        padding: 4px 12px;
        border: solid 1px rgba(0, 0, 0, 0.1);
        background: #fff;
        border-radius: 3px;
        font: inherit;
        font-size: 14px;
        outline: 0 !important;
        float: left;
        margin: 0 0 0 8px;
        background-color: #01A4EF;
        color: #fff !important;
        background-image: linear-gradient(#2fbdfe, #01A4EF);
        text-shadow: -0.1px -0.1px rgba(0, 0, 0, 0.12);
        box-shadow: 0 0.1px 0.1px rgba(255, 255, 255, 0.4) inset;
    }

    .site-header__action .btn svg {
        display: block;
        width: 22px;
        height: 22px;
        fill: #fff;
        float: left;
        margin: 0 6px 0 -4px;
    }

    .site-header__action .btn:focus {
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }

    .evoucher-wrapper {
        max-width: 746px;
        margin: 24px auto;
        background: #fff;
        padding: 8px;
        border: solid 1px #e5e5e5;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
    }

    .evoucher {
        border: solid 4px #eee;
    }

    .evoucher>table {
        border-collapse: separate;
    }

    .evoucher>table td {
        padding: 12px;
        border: solid 4px #eee;
    }

    .evoucher>table td img {
        max-width: 1000px;
    }

    td svg {
        vertical-align: middle;
    }

    table.toc td {
        border: 0;
        vertical-align: top;
    }

    .evoucher td ul,
    .evoucher td ol {
        margin: 0 0 0 16px;
        padding: 0;
        font-size: 13px;
    }

    .file-btn {
        position: absolute;
        top: 0px;
        right: 10px;
        overflow: hidden;
        height: 24px;
        line-height: 24px;
        padding: 0 6px;
        border-radius: 3px;
        border: solid 1px #ccc;
        font-size: 9px;
        cursor: pointer;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-weight: 700;
        background: rgba(255, 255, 255, .4);
    }

    .file-btn input {
        position: absolute;
        opacity: 0;
        line-height: 4rem;
        width: 8rem;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        cursor: pointer;
    }

    .editable {
        border: dashed 1px #e5e5e5;
        outline: 0;
    }

    .editable:focus {
        background: #ffffce;
    }

    .break {
        margin: 24px 0;
    }

    @media print {
        body {
            padding-top: 0;
            background: transparent;
        }

        .eticket {
            padding: 0;
            border: 0;
            box-shadow: none;
        }

        .site-header {
            display: none;
        }

        .break {
            page-break-after: always;
            height: 0;
            background: transparent;
            margin: 0;
        }

        .editable {
            border: 0;
            background: transparent;
        }

        .inline-editor {
            display: none;
        }
    }
</style>
@else
    <center>
        <b>Silahkan melakukan pembayaran</b>
    </center>
@endif

    </body>
@endforeach
    
