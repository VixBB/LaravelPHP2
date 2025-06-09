@extends('layout.admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
      <form action="{{ route('admin.laptop.store1') }}" method="POST" enctype="multipart/form-data">

            @csrf
              <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Laptop</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @error('gambar')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
            
                  <div class="form-group">
                    <label for="merk">Merk</label>
                    <input type="text" class="form-control" id="merk" name="merk" placeholder="Enter Merk" value="{{ old('merk') }}">
                    @error('merk')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                   
                  <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <input type="text" class="form-control" id="tipe"  name="tipe" placeholder="Tipe contoh(TUF)" value="{{ old('tipe') }}">
                    @error('tipe')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="cpu">CPU</label>
                    <textarea class="form-control" id="cpu" name="cpu" placeholder="Deskripsi">{{ old('cpu') }}</textarea>
                    @error('cpu')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="gpu">GPU</label>
                    <textarea class="form-control" id="gpu" name="gpu" placeholder="gpu">{{ old('gpu') }}</textarea>
                    @error('gpu')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="ram">RAM</label>
                    <textarea class="form-control" id="ram" name="ram" placeholder="ram">{{ old('ram') }}</textarea>
                    @error('ram')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="storage">STORAGE</label>
                    <textarea class="form-control" id="storage" name="storage" placeholder="storage">{{ old('storage') }}</textarea>
                    @error('storage')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="port">PORT</label>
                    <textarea class="form-control" id="port" name="port" placeholder="port">{{ old('port') }}</textarea>
                    @error('port')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="deskripsi">deskripsi</label>
                    <input type="file" class="form-control" id="deskripsi" name="deskripsi">
                    @error('deskripsi')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                      <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                      <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                    @error('status')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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