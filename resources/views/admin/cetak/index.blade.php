@extends('admin.layouts.layouts')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h5>Cetak Raport</h5>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('cetak.satu') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="nis" placeholder="Nis" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <select name="type" id="" class="form-control">
                                <option value="">~~ Option ~~</option>
                                <option value="semester">Semester</option>
                                <option value="setengah">Setengah Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="semester" placeholder="semester" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.card-body -->
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h5>Cetak Lagger 1 Mata pelajaran</h5>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('cetak.dua') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-xl-3">
                        <div class="form-group">
                            <select name="matpel" id="" class="form-control">
                                <option value="">~~ Matpel ~~</option>
                                @foreach ($matpel as $item)
                                    <option value="{{ $item->id_matpel }}">{{ $item->matpel->nama }} ( {{ $item->guru->nama }} ) </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <select name="type" id="" class="form-control">
                                <option value="">~~ Option ~~</option>
                                <option value="semester">Semester</option>
                                <option value="setengah">Setengah Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="semester" placeholder="semester" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.card-body -->
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h5>Cetak Report Nilai</h5>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('cetak.tiga') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-xl-3">
                        <div class="form-group">
                            <select name="kelas" id="" class="form-control">
                                <option value="">~~ Kelas ~~</option>
                                @foreach ($list_kelas as $kelas)
                                    <option value="{{ $kelas->id_kelas }}">{{ $kelas->kelas->kelas }} ( {{ !is_null($kelas->guru) ? $kelas->guru->nama : "Tidak Ada Wali Kelas" }} )</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <select name="type" id="" class="form-control">
                                <option value="">~~ Option ~~</option>
                                <option value="semester">Semester</option>
                                <option value="setengah">Setengah Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-3">
                        <div class="form-group">
                            <input type="text" name="semester" placeholder="semester" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-xl-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection