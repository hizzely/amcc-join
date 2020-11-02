@extends('admin.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-9">
      <h1>FAQ</h1>
    </div>
    <div class="col-sm-12 col-md-3" style="text-align: right">
      <a href="/admin/faqs/create" class="btn btn-success">Buat Baru</a>
    </div>
  </div>
  <hr>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Pertanyaan</th>
          <th scope="col">Jawaban</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($faqs as $faq)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $faq['pertanyaan'] }}</td>
            <td>{{ $faq['jawaban'] }}</td>
            <td>
              <a href="<?= sprintf('/admin/faqs/%s/edit', $faq['id']) ?>" class="btn btn-info btn-sm"><i class="ion-edit"></i></a>
              <form method="post" action="<?= sprintf('/admin/faqs/%s', $faq['id']) ?>" style="display: inline-block">
                <input type="hidden" name="_METHOD" value="DELETE">
                <button type="submit" class="btn btn-danger btn-sm"><i class="ion-trash-a"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
