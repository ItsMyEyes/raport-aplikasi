@extends('admin.layouts.layouts')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update Users / Guru</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('matpel.update', $matpel->id_matpel) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="">Kelompok</label>
                    <select name="kelompok" id="" class="form-control">
                        <option value="">~~ Option ~~</option>
                        <option {{ $matpel->matpel->kelompok == "a" ? "selected" : "" }} value="a">A. Muatan Nasional</option>
                        <option {{ $matpel->matpel->kelompok == "b" ? "selected" : "" }} value="b">B. Muatan kewilayahan</option>
                        <option {{ $matpel->matpel->kelompok == "c1" ? "selected" : "" }} value="c1">C1. Dasar Bidang Keahlian</option>
                        <option {{ $matpel->matpel->kelompok == "c2" ? "selected" : "" }} value="c2">C2. Dasar Program Keahlian</option>
                        <option {{ $matpel->matpel->kelompok == "c3" ? "selected" : "" }} value="c3">C3. Kompetensi Keahlian </option>
                        <option {{ $matpel->matpel->kelompok == "d" ? "selected" : "" }} value="d">D. Muatan Lokal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $matpel->matpel->nama }}">
                </div>
                <div class="form-group">
                    <label for="">Kode Guru</label>
                    <input type="text" class="form-control" name="guru" value="{{ $matpel->id_guru }}">
                </div>
                <div class="form-group">
                    <label for="">KKM Pengetahuan</label>
                    <input type="text" class="form-control" name="kb_peng" value="{{ $matpel->kb_peng }}">
                </div>
                <div class="form-group">
                    <label for="">KKM Keterampilan</label>
                    <input type="text" class="form-control" name="kb_ket" value="{{ $matpel->kb_ket }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection