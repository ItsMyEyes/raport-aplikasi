@extends('admin.layouts.layouts')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Users / Guru</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('siswa.update', $a->id_siswa) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="">Nis</label>
                    <input type="text" class="form-control" name="nis" value="{{ $a->siswa->nis }}">
                </div>
                <div class="form-group">
                    <label for="">Nisn</label>
                    <input type="text" class="form-control" name="nisn" value="{{ $a->siswa->nisn }}">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $a->siswa->nama }}">
                </div>
                <div class="form-group">
                    <label for="">Kelamin</label>
                    <input type="text" class="form-control" name="kelamin" value="{{ $a->siswa->kelamin }}">
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmp_lhr" value="{{ $a->siswa->tmp_lhr }}">
                </div>
                <div class="form-group">
                    <label for="">Tanggal lahir</label>
                    <input type="date" class="form-control" name="tgl_lhr" value="{{ $a->siswa->tgl_lhr }}">
                </div>
                <div class="form-group">
                    <label for="">No. Telp</label>
                    <input type="text" class="form-control" name="nohp" value="{{ $a->siswa->nohp }}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $a->siswa->email }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection