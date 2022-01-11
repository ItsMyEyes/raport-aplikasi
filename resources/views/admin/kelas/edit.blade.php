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
            <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="">Kode Guru</label>
                    <input type="number" class="form-control" name="wali_kelas" value="{{ $kelas->wali_kelas }}">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="kelas" value="{{ $kelas->kelas->kelas }}">
                </div>
                <div class="form-group">
                    <label for="">Tingkat</label>
                    <select name="tingkat" id="" class="form-control">
                        <option value="" selected>~~ Option ~~</option>
                        <option value="10" {{ $kelas->kelas->tingkat == 10 ? "selected" : "" }}>Tingkat Kelas 10</option>
                        <option value="11" {{ $kelas->kelas->tingkat == 11 ? "selected" : "" }}>Tingkat Kelas 11</option>
                        <option value="12" {{ $kelas->kelas->tingkat == 12 ? "selected" : "" }}>Tingkat Kelas 12</option>
                        <option value="13" {{ $kelas->kelas->tingkat == 13 ? "selected" : "" }}>Tingkat Kelas 13</option>
                        <option value="14" {{ $kelas->kelas->tingkat == 14 ? "selected" : "" }}>Tingkat Kelas 14</option>
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