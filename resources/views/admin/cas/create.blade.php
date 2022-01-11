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
            <form action="{{ route('cas.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_siswa" value="{{$siswa->nis}}">
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="semester" value="{{ $semester }}">
                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input type="text" value="{{$siswa->nama}}" readonly id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Sakit</label>
                    <input type="text" required name="sakit" value="{{ !is_null($b) ? $b->sakit : '' }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Ijin</label>
                    <input type="text" required name="ijin" value="{{ !is_null($b) ? $b->ijin : '' }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alpa</label>
                    <input type="text" required name="alpa" value="{{ !is_null($b) ? $b->alpa : '' }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Catatan</label>
                    <input type="text" required name="catatan" value="{{ !is_null($b) ? $b->catatan : '' }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Sikap</label>
                    <input type="text" required name="sikap" value="{{ !is_null($b) ? $b->sikap : '' }}" maxlength="2" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection