@extends('admin.master_admin')
@section('content')
<style> 
.card{
  margin-left:20%;
}
</style>
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
    <section class="content-header">
        <h1>
            Chi tiết đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bill</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="card">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="col-md-4">Thông tin khách hàng</th>
                                    <th class="col-md-6"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Thông tin người đặt hàng</td>
                                    <td>{{ $customerInfo->name }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td>{{ $customerInfo->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $customerInfo->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $customerInfo->address }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $customerInfo->email }}</td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>{{ $customerInfo->bill_note }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting col-md-1" >STT</th>
                                <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                <th class="sorting col-md-2">Số lượng</th>
                                <th class="sorting col-md-2">Giá tiền</th>
                            </thead>
                            <tbody>
                            @foreach($billInfo as $key => $bill)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $bill->product_name }}</td>
                                    <td>{{ $bill->quantily }}</td>
                                    <td>{{ number_format($bill->price) }} VNĐ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"><b>Tổng tiền</b></td>
                                <td colspan="1"><b class="text-red">{{ number_format($customerInfo->bill_total) }} VNĐ</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                <form action="{{ url('/bill') }}/{{ $customerInfo->bill_id }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-inline">
                            <label>Trạng thái giao hàng: </label>
                            <select name="status" class="form-control input-inline" style="width: 200px">
                                <option value="1">Chưa giao</option>
                                <option value="2">Đang giao</option>
                                <option value="2">Đã giao</option>
                            </select>

                            <input type="submit" value="Xử lý" class="btn btn-primary">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection