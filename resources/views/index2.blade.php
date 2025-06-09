@extends('layout.admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laptop Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laptop List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{ route('admin.laptop.create1') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laptop List</h3>

                <div class="card-tools">
                  <form action="{{ route('admin.index2') }}" method="GET">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request->get('search') }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Merk</th>
                      <th>Tipe</th>
                      <th>CPU</th>
                      <th>GPU</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $d)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        @if($d->gambar)
                          <img src="{{ secure_asset('storage/gambar-laptop/' .$d->gambar) }}" width="100" alt="Gambar Laptop">
                        @else
                          No Image
                        @endif
                      </td>
                      <td>{{ $d->merk }}</td>
                      <td>{{ $d->tipe }}</td>
                      <td>{{ $d->cpu }}</td>
                      <td>{{ $d->gpu }}</td>
                      <td>{{ ucfirst($d->status) }}</td>
                      <td>
                        <a href="{{ route('admin.laptop.edit1', ['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-hapus{{ $d->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus data ini?? <br>
                              Laptop: <b>{{ $d->merk }}</b> <br>
                              tipe: <b>{{ $d->tipe}}</b>
                            </p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <form action="{{ route('admin.laptop.delete1', ['id' => $d->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Hapus Data</button>
                            </form>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
