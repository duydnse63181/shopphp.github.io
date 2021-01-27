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
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/bill')}}" class="nav-link active">
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
    <section class="content-header">
        <h1>
            Danh sách đơn hàng
        </h1>
    </section>
    <!-- Main content -->
    @if (Session::has('message'))
        <div class="alert alert-info"> {{ Session::get('message') }}</div>
    @endif
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="" >ID</th>
                        <th class="sorting_asc col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Tên người order</th>
                        <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Địa chỉ</th>
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Ngày đặt hàng</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Action</th>
                        <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Xóa</th></tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>{{ $customer->email }}</td>
                                @foreach($bills as $bill)
                                @if($bill->customer_id == $customer->id)
                                  @if($bill->status == 2)
                                    <td style="color:blue">Đã xử lý</td>
                                  @elseif($bill->status == 1)
                                    <td><p style="color:red">Chưa xử lý</p></td>
                                  @elseif($bill->status == null)
                                  <td><p style="color:red">Chưa xử lý</p></td>
                                  @endif
                                @endif
                                @endforeach
                                <td><a href="{{ url('/bill')}}/{{ $customer->id }}/edit">Detail</a></td>
                                <td>
                                    <form action="{{ url('/bill')}}/{{ $customer->id }}/" method="post" id="formDelete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
  </div>
@stop