
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
                <a href="{{route('blog.admin_show')}}" class="nav-link active">
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


<div style="margin-left:20%">
                  <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th>ID</th>
                        <th>Img</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($list_json as $pro)
                      <tr>
                        <td>{{$pro->id}}</td>
                        <td style="width: 50px">  <?php
                          echo "$pro->img";
                        ?> </td>
                        <td>  <?php
                         echo "$pro->title";
                        ?> </td>
                        <td>  <?php
                          echo "$pro->content";
                        ?> </td>
                        <td><a href="{{route('blog.admin_delete', ['id' => $pro->id]) }}"><button type="button" class="btn btn-block btn-info">Delete</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

              </div>      
@endsection


