@extends('admin.layouts.layouts')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <select name="" id="" class="form-control" onchange="window.location.href=`?kelas=${this.value}`">
                <option value="">~~ Option ~~</option>
                @foreach ($data as $item)
                    <option value="{{ $item['id_kelas'] }}" {{ $kelas == $item['id_kelas'] ? "selected" : "" }}>{{ $item ['kelas']['kelas'] }}</option>
                @endforeach
            </select>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@if (isset($kelas) && !is_null($kelas))
    
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Data Nilai</h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file"></i> Import siswa</a></li>
            </ul>
          </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Nis</th>
              <th>Nama</th>
              <th>Type</th>
              <th>Semester</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($list_kelas as $siswa)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $siswa->siswa->nis }}</td>
                        <td>{{ $siswa->siswa->nama }}</td>
                        <form action="{{ route('cas.create') }}" method="get">
                          @csrf
                            <input type="hidden" name="nis" value="{{ $siswa->siswa->nis }}">
                            <td>
                              <div class="form-group">
                                  <select requried name="type" id="" class="form-control">
                                      <option value="">~~ Option ~~</option>
                                      <option value="tengah">Setengah Semester</option>
                                      <option value="semester">Semester</option>
                                  </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                  <input type="number" class="form-control" requried name="semester">
                              </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>No.</th>
              <th>Nis</th>
              <th>Nama</th>
              <th>Type</th>
              <th>Semester</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('siswa.mapping') }}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="">File Upload Mapping</label>
          <input type="file" name="file" id="" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endif
@endsection