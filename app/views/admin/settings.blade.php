@extends('admin.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2">
      @include('partials.settings-nav')
    </div>

    <div class="col-md-10">
      <form action="" method="post">
        <fieldset>
          <h3>Pesan</h3>
          <hr>

          <div class="form-group row">
            <label for="announcement" class="col-sm-2 col-form-label">Pengumuman</label>
            <div class="col-sm-10">
              <textarea name="announcement" id="announcement" class="form-control" rows="3">{!! $settings['announcement'] !!}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="admin_notice" class="col-sm-2 col-form-label">Admin Notice</label>
            <div class="col-sm-10">
              <textarea name="admin_notice" id="admin_notice" class="form-control" rows="3">{!! $settings['admin_notice'] !!}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="success_message" class="col-sm-2 col-form-label">Pendaftaran Sukses</label>
            <div class="col-sm-10">
              <textarea name="success_message" id="success_message" class="form-control" rows="2">{!! $settings['success_message'] !!}</textarea>
            </div>
          </div>

          <br>
          <h3>Pendaftaran</h3>
          <hr>

          <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Biaya</label>
            <div class="col-sm-10">
              <input name="price" type="number" min="0" id="price" class="form-control" value="{!! $settings['price'] !!}">
            </div>
          </div>

          <div class="form-group row">
            <label for="registration_code" class="col-sm-2 col-form-label">No. Registrasi Awal</label>
            <div class="col-sm-10">
              <input name="registration_code" type="number" min="0" id="registration_code" class="form-control" value="{!! $settings['registration_code'] !!}">
            </div>
          </div>

          <div class="form-group row">
            <label for="date_open" class="col-sm-2 col-form-label">Dibuka Pada</label>
            <div class="col-sm-10">
              <input name="date_open" type="datetime" id="date_open" class="form-control" value="{!! $settings['date_open'] !!}">
            </div>
          </div>

          <div class="form-group row">
            <label for="date_closed" class="col-sm-2 col-form-label">Ditutup Pada</label>
            <div class="col-sm-10">
              <input name="date_closed" type="datetime" id="date_closed" class="form-control" value="{!! $settings['date_closed'] !!}">
            </div>
          </div>

          <br>
          <h3>Pembayaran</h3>
          <hr>

          <div class="form-group row">
            <label for="link_konfirmasi" class="col-sm-2 col-form-label">Link Konfirmasi</label>
            <div class="col-sm-10">
              <input name="link_konfirmasi" type="text" id="link_konfirmasi" class="form-control" value="{!! $settings['link_konfirmasi'] !!}">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="payment_methods" class="col-sm-2 col-form-label">Metode Pembayaran <small>(Semicolon separated)</small></label>
            <div class="col-sm-10">
              <textarea name="payment_methods" id="payment_methods" class="form-control" rows="3">{!! $settings['payment_methods'] !!}</textarea>
            </div>
          </div>

          <br><hr>

          <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
          </div>
          <br>
        </fieldset>
      </form>
    </div>
  </div>
</div>
@endsection
