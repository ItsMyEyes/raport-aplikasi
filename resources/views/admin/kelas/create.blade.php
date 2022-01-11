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
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Kode Guru</label>
                    <input type="number" class="form-control" name="wali_kelas">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="kelas">
                </div>
                <div class="form-group">
                    <label for="">Tingkat</label>
                    <select name="tingkat" id="" class="form-control">
                        <option value="" selected>~~ Option ~~</option>
                        <option value="10">Tingkat Kelas 10</option>
                        <option value="11">Tingkat Kelas 11</option>
                        <option value="12">Tingkat Kelas 12</option>
                        <option value="13">Tingkat Kelas 13</option>
                        <option value="14">Tingkat Kelas 14</option>
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