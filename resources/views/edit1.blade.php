@extends('layout.admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Laptop</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Laptop</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="{{ route('admin.laptop.update1', $data->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Edit Laptop</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    @if($data->gambar)
                      <div>
                        <img src="{{ secure_asset('storage/gambar-laptop/' . $data->gambar) }}" alt="Gambar Laptop" style="max-width: 200px; max-height: 150px;">
                      </div>
                    @endif
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @error('gambar')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="merk">Merk</label>
                    <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk', $data->merk) }}" placeholder="Enter Merk">
                    @error('merk')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                   
                  <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <input type="text" class="form-control" id="tipe" name="tipe" value="{{ old('tipe', $data->tipe) }}" placeholder="Tipe contoh(TUF)">
                    @error('tipe')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="cpu">cpu</label>
                    <input type="text" class="form-control" id="cpu" name="cpu" value="{{ old('cpu', $data->cpu) }}" placeholder="cpu contoh(TUF)">
                    @error('cpu')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="gpu">gpu</label>
                    <input type="text" class="form-control" id="gpu" name="gpu" value="{{ old('gpu', $data->gpu) }}" placeholder="gpu contoh(TUF)">
                    @error('gpu')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="ram">ram</label>
                    <input type="text" class="form-control" id="ram" name="ram" value="{{ old('ram', $data->ram) }}" placeholder="ram contoh(TUF)">
                    @error('ram')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="storage">storage</label>
                    <input type="text" class="form-control" id="storage" name="storage" value="{{ old('storage', $data->storage) }}" placeholder="storage contoh(TUF)">
                    @error('storage')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="port">port</label>
                    <input type="text" class="form-control" id="port" name="port" value="{{ old('port', $data->port) }}" placeholder="port contoh(TUF)">
                    @error('port')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="deskripsi">deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $data->deskripsi) }}" placeholder="Enter deskripsi">
                    @error('deskripsi')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                      <option value="tersedia" {{ old('status', $data->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                      <option value="dipinjam" {{ old('status', $data->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                    @error('status')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
        </form>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
