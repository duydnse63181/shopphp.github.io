@extends('admin.master_admin')

@section('content')
<?php //Hiển thị thông báo thành công?>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif




<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img style="width:50%" src="{{URL::asset('img/Logo.png')}}" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin DN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('img/product/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @if(Auth::check())
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        @else
        <a href="#" class="d-block"></a>
        @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('homead')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.add_inpux')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/bill')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bill</p>
                </a>
              </li>
              @if(Auth::check())
                @if( Auth::user()->level == 1)
              <li class="nav-item">
                <a href="{{url('/user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
                @else
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User-LOCK</p>
                </a>
                </li>
                @endif
              @endif
              <li class="nav-item">
                <a href="{{route('blog.admin_show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('blog.admin_add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blog</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

           <div class="card-body">
                <form role="form" action="{{route('admin.user_updatehandle')}}" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="ID" class="form-control" placeholder="Enter ..." value="{{$user->id}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" class="form-control" placeholder="Enter ..." value="{{$user->name}}">  
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="Email" class="form-control" placeholder="Enter ..."value="{{$user->email}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="Password" class="form-control" placeholder="Enter ..." value="{{$user->password}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="Level" class="form-control" placeholder="Enter ..." value="{{$user->level}}">
                      </div>
                    </div>
    
                    <div class="btn-submit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
              </div>
@endsection