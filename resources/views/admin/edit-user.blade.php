@extends('layouts.admin')
@section('title','Edit User')
@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('admin/manage-user/edit/'.$id)}}" method="post">
              <div class="box-body">
              	 @csrf
              	<div class="form-group">
                  @if (session('success'))
                  <div class="alert alert-success">
                        <p>{{session('success')}}</p>
                  </div>
                  @endif
              		@if ($errors->any())
        					    <div class="alert alert-danger">
        					    	<b>Lỗi!! Bạn vui vòng kiểm tra lại:</b>
        					        <ul>
        					            @foreach ($errors->all() as $error)
        					                <li>{{ $error }}</li>
        					            @endforeach
        					        </ul>
        					    </div>
        					@endif
              	</div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Họ và tên</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên" name="username" value="{{old('username',$getUserById['name'])}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ email" name="email" value="{{old('email',$getUserById['email'])}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mật khẩu</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu" name="pass1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu" name="pass2">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="cbadmin" value="1" {{old('cbadmin',$getUserById['level']) ? "checked" : ''}} > Admin
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
              </div>
            </form>
          </div>
		</div>
	</div>
@endsection