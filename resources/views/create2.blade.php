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
      <form action="{{ route('admin.peminjaman.store2') }}" method="POST" enctype="multipart/form-data">

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
                    <label for="user_id">User</label>
                    <select class="form-control" id="user_id" name="user_id">
                      <option value="">-- Select User --</option>
                      @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                      @endforeach
                    </select>
                    @error('user_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="laptop_id">Laptop</label>
                    <select class="form-control" id="laptop_id" name="laptop_id">
                      <option value="">-- Select Laptop --</option>
                      @foreach($laptops as $laptop)
                        <option value="{{ $laptop->id }}" {{ old('laptop_id') == $laptop->id ? 'selected' : '' }}>{{ $laptop->merk }} - {{ $laptop->tipe }}</option>
                      @endforeach
                    </select>
                    @error('laptop_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
                    @error('tanggal_pinjam')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                      <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>dipinjam</option>
                      <option value="dikembalikan" {{ old('status') == 'dikembalikan' ? 'selected' : '' }}>dikembalikan</option>
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