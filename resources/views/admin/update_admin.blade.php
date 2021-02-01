@extends('admin.master_admin')

@section('content')
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

           <div class="card-body">
                <form role="form" action="{{route('admin.website_updatehandle')}}" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="ID" class="form-control" placeholder="Enter ..." value="{{$item->id}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" class="form-control" placeholder="Enter ..." value="{{$item->name}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IMAGE</label>
                        <input type="text" name="Image" class="form-control" placeholder="Enter ..." value="{{$item->photo}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IMAGE 1</label>
                        <input type="text" name="Image1" class="form-control" placeholder="Enter ..." value="{{$item->photo1}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IMAGE 2</label>
                        <input type="text" name="Image2" class="form-control" placeholder="Enter ..." value="{{$item->photo2}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IMAGE 3</label>
                        <input type="text" name="Image3" class="form-control" placeholder="Enter ..." value="{{$item->photo3}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IMAGE 4</label>
                        <input type="text" name="Image4" class="form-control" placeholder="Enter ..." value="{{$item->photo4}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IMAGE 5</label>
                        <input type="text" name="Image5" class="form-control" placeholder="Enter ..." value="{{$item->photo5}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Catogoris ID</label>
                        <select name="Catogoris_id" class="form-control input-inline" style="width: 200px" value="{{$item->catogoris_id}}" >
                                <option value="1">Girl</option>
                                <option value="2">Boy</option>
                                <option value="3">Men</option>
                                <option value="4">Women</option>
                            </select>
                      </div>
                    </div>

                    <div class="card-body pad">
                      <div class="mb-3">
                      <label>Description</label>
                        <textarea class="textarea"  name="Description" placeholder="Enter..." type="input"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{$item->description}}"></textarea>
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="Price" class="form-control" placeholder="Enter ..." value="{{$item->price}}">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Is hot</label>
                        <select name="Is_hot" class="form-control input-inline" style="width: 200px" value="{{$item->is_hot}}">
                                <option value="1">yes</option>
                                <option value="0">no</option>
                            </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Is New </label>
                            <select name="Is_new" class="form-control input-inline" style="width: 200px" value="{{$item->is_new}}">
                                <option value="1">yes</option>
                                <option value="0">no</option>
                            </select>
                    </div>

                    

                    <div class="btn-submit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

              </div>

@endsection