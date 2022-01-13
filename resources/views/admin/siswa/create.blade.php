@extends('admin.layouts.layouts')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Import Users</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.import') }}?id_kelas={{$kelas}}&ta={{ Session::get('ta')['ta'] }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="file" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div class="col-12">
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Users / Guru</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <input type="hidden" name="kelas" value="{{$kelas}}">
                <div class="form-group">
                    <label for="">Nis</label>
                    <input type="text" class="form-control" name="nis">
                </div>
                <div class="form-group">
                    <label for="">Nisn</label>
                    <input type="text" class="form-control" name="nisn">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="">Kelamin</label>
                    <input type="text" class="form-control" name="kelamin">
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmp_lhr">
                </div>
                <div class="form-group">
                    <label for="">Tanggal lahir</label>
                    <input type="date" class="form-control" name="tgl_lhr">
                </div>
                <div class="form-group">
                    <label for="">No. Telp</label>
                    <input type="text" class="form-control" name="nohp">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection