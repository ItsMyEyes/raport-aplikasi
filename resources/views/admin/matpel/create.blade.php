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
            <form action="{{ route('matpel.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Kelompok</label>
                    <select name="kelompok" id="" class="form-control">
                        <option value="">~~ Option ~~</option>
                        <option value="a">A. Muatan Nasional</option>
                        <option value="b">B. Muatan kewilayahan</option>
                        <option value="c1">C1. Dasar Bidang Keahlian</option>
                        <option value="c2">C2. Dasar Program Keahlian</option>
                        <option value="c3">C3. Kompetensi Keahlian </option>
                        <option value="d">D. Muatan Lokal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="">Kode Guru</label>
                    <input type="text" class="form-control" name="guru">
                </div>
                <div class="form-group">
                    <label for="">KKM Pengetahuan</label>
                    <input type="text" class="form-control" name="kb_peng">
                </div>
                <div class="form-group">
                    <label for="">KKM Keterampilan</label>
                    <input type="text" class="form-control" name="kb_ket">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection