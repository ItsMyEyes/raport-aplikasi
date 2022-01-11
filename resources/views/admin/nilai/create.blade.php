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
            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_siswa" value="{{$siswa->nis}}">
                <input type="hidden" name="id_matpel" value="{{$matpel->id_matpel}}">
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="semester" value="{{ $semester }}">
                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input type="text" value="{{$siswa->nama}}" readonly id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mata pelajaran</label>
                    <input type="text" value="{{$matpel->matpel->nama}}" readonly id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nilai Pengetahuan 1</label>
                    <input type="number" required name="p1" value="{{ isset($dataNilai) && !is_null($dataNilai) ? $dataNilai->p1 : "" }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nilai Pengetahuan 2</label>
                    <input type="number" required name="p2" value="{{ isset($dataNilai) && !is_null($dataNilai) ? $dataNilai->p2 : "" }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nilai Pengetahuan 3</label>
                    <input type="number" required name="p3" value="{{ isset($dataNilai) && !is_null($dataNilai) ? $dataNilai->p3 : "" }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nilai Keterampilan 1</label>
                    <input type="number" required name="k1" value="{{ isset($dataNilai) && !is_null($dataNilai) ? $dataNilai->k1 : "" }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nilai Keterampilan 2</label>
                    <input type="number" required name="k2" value="{{ isset($dataNilai) && !is_null($dataNilai) ? $dataNilai->k2 : "" }}" maxlength="2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nilai Keterampilan 3</label>
                    <input type="number" required name="k3" value="{{ isset($dataNilai) && !is_null($dataNilai) ? $dataNilai->k3 : "" }}" maxlength="2" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection