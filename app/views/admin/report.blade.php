@extends('admin.layout')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-9">
        <h1>Laporan Keuangan</h1>
    </div>
    <div class="col-sm-12 col-md-3">
        <input id="datepicker" width="100%" />
    </div>
  </div>

  <hr>
  <table class="table table-striped table-bordered table-hover table-responsive-md">
    <thead>
        <tr>
        <th scope="col">Sesi</th>
        <th scope="col">Waktu Sesi</th>
        <th scope="col">Pendaftar Baru</th>
        <th scope="col">Konfirmasi</th>
        <th scope="col">Uang Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $k => $v)
        <tr>
            <th scope="row">{{ $k }}</th>
            <td>{{ $v['time'] }}</td>
            <td>{{ $v['joined'] }}</td>
            <td>{{ $v['confirmed'] }}</td>
            <td>Rp{{ $v['income'] }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <hr>
  <small>
    Penjelasan: <br/>
    *) <strong>Pendaftar Baru:</strong> Jumlah member yang mendaftar pada suatu sesi (bukan keseluruhan dari awal pendaftaran).<br/>
    *) <strong>Konfirmasi:</strong> Jumlah member yang melakukan pembayaran pada suatu sesi (bisa pendaftaran baru sekaligus pembayaran, atau sudah mendaftar tempo waktu dan baru melakukan pembayaran).<br/>
    *) <strong>Uang Masuk:</strong> Hasil dari biaya pendaftaran dikalikan banyaknya konfirmasi.<br/>
  </small>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
    <script>
      'use strict'
      let currentDate = null

      let getQueryParams = () => {
        const params = []
        const rawQuery = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

        rawQuery.forEach((param) => {
          params.push(param.split('='))
        })

        return params;
      }

      let today = () => {
          const d = new Date()
          return `${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()}`
      }

      if (getQueryParams()[0][0] == 'd') {
        currentDate = getQueryParams()[0][1]
      } else {
        currentDate = today()
      }

      let datePicker = $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        showOnFocus: true,
        format: 'dd/mm/yyyy',
        value: currentDate,
        change: function (e, type) {
          if (currentDate != $(this)[0].value) {
            currentDate = $(this)[0].value
            window.location.href = window.location.pathname + '?d=' + currentDate
          }
        }
      })
    </script>
@endpush