@extends('admin.layout')

@section('content')
<div class="container">
  <h2>Edit FAQ</h2>
  <hr>
  <form action="<?= sprintf('/admin/faqs/%s', $faq['id']) ?>" method="post">
    <input type="hidden" name="_METHOD" value="PUT">
    <div class="form-group row">
      <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan</label>
      <div class="col-sm-10">
        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" value="{{ $faq['pertanyaan'] }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="jawaban" class="col-sm-2 col-form-label">Jawaban</label>
      <div class="col-sm-10">
        <textarea name="jawaban" id="jawaban" class="form-control" rows="6">{!! $faq['jawaban'] !!}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="published" class="col-sm-2 col-form-label">Publikasi?</label>
      <div class="col-sm-10">
        <div class="form-check">
          <input type="checkbox" name="published" value="1" aria-label="Tampilkan?" @if ($faq['published']) checked @endif>
          <label class="form-check-label" for="published">Ya, tampilan untuk publik</label>
        </div>
      </div>
    </div>
    <div style="text-align: right">
      <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection
