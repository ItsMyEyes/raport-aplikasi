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
                    <option value="{{ $item ['id_kelas'] }}" {{ $kelas == $item['id_kelas'] ? "selected" : "" }}>{{ $item ['kelas']['kelas'] }}</option>
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
            <h3 class="card-title p-3">Data User</h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="{{ route('siswa.create') }}?kelas={{$kelas}}"><i class="fa fa-plus"></i> Tambah Dan Mapping Siswa</a></li>
              <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file"></i> Mapping siswa</a></li>
            </ul>
          </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Kode Login</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($siswa as $sis)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $sis->id_siswa }}</td>
                        <td>{{ $sis->siswa->nama }}</td>
                        <td>{{ $sis->siswa->email }}</td>
                        <td>
                            <a href="{{ route('siswa.out', $sis->id_siswa) }}" class="btn btn-danger btn-sm"><i class="fa fa-sign-out-alt"></i></a>
                            <a href="{{ route('siswa.show', $sis->id_siswa) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>No.</th>
              <th>Kode Login</th>
              <th>Nama</th>
              <th>Email</th>
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
          <input type="hidden" name="kelas" value="{{ $kelas }}">
          <label for="">Nis</label>
          <input type="text" class="form-control" name="nis">
        </div>
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