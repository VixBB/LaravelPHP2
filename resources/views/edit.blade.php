@extends('layout.admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
      <form action="{{ route('admin.user.update', ['id' => $data->id]) }} " method="POST">
            @csrf
            @method('PUT')
              <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $data->name}}" placeholder="Enter email">
                  </div>
                  @error('name')
                    <small> {{$message}} </small>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $data->email}}" placeholder="Enter nama">
                  </div>
                   @error('email')
                    <small>{{$message}}</small>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                  </div>
                   @error('password')
                    <small>{{$message}}</small>
                  @enderror
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" value="{{ $data->nis ?? '' }}" placeholder="Enter NIS">
                    @error('nis')
                    <small>{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $data->nisn ?? '' }}" placeholder="Enter NISN">
                    @error('nisn')
                    <small>{{$message}}</small>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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