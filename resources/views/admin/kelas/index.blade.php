@extends('admin.layouts.layouts')
@section('title','Dashboard')
@section('breadcrumb','Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Data User</h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="{{ route('kelas.create') }}"><i class="fa fa-plus"></i> Add</a></li>
            </ul>
          </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Name kelas</th>
              <th>Tingkat</th>
              <th>Nama Wali Kelas</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $value['kelas']['kelas'] }}</td>
                        <td>{{ $value['guru']['nama'] }}</td>
                        <td>{{ $value['kelas']['tingkat'] }}</td>
                        <td>
                            <a href="{{ route('kelas.update', $value['id_kelas']) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('kelas.delete', $value['id_kelas']) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>No.</th>
              <th>Name kelas</th>
              <th>Tingkat</th>
              <th>Nama Wali Kelas</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

@endsection