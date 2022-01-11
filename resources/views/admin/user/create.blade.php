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
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Kode Guru</label>
                    <input type="number" class="form-control" name="kode_guru">
                </div>
                <div class="form-group">
                    <label for="">Nip</label>
                    <input type="text" class="form-control" name="nip">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="">No. hp</label>
                    <input type="text" class="form-control" name="no_hp">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Akses</label>
                    <select name="akses" id="" class="form-control">
                        <option value="">~~ Option ~~</option>
                        <option value="Admin">Admin</option>
                        <option value="Wakil Kurikulum">Wakil Kurikulum</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection