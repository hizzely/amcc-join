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
            <label for="success_message" class="col-sm-2 col-form-label">Pendaftaran Sukses</label>
            <div class="col-sm-10">
              <textarea name="success_message" id="success_message" class="form-control" rows="2">{!! $settings['success_message'] !!}</textarea>
            </div>
          </div>

          <br>
          <h3>Tanggal Pendaftaran</h3>
          <hr>

          <div class="form-group row">
            <label for="date_open" class="col-sm-2 col-form-label">Mulai Dibuka Pada</label>
            <div class="col-sm-10">
              <textarea name="date_open" id="date_open" class="form-control" rows="2">{!! $settings['date_open'] !!}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="date_closed" class="col-sm-2 col-form-label">Ditutup Pada</label>
            <div class="col-sm-10">
              <textarea name="date_closed" id="date_closed" class="form-control" rows="2">{!! $settings['date_closed'] !!}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
@endsection
