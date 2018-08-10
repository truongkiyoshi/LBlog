@extends('layouts.admin')
@section('title','Manage User')
@section('content')
	<div class="box">
	    <div class="box-header with-border">
	        <h3 class="box-title">Manage User</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	    	<button type="button" class="btn btn-success"><a href="{{url('admin/manage-user/add')}}"><font color='white'>Add User</font></a></button><br>
	    	@if (session('deldone'))
			<div class="alert alert-success">
			      <p>{{session('deldone')}}</p>
			</div>
			@endif
			@if (session('success'))
			<div class="alert alert-success">
			      <p>{{ session('success') }}</p>
			</div>
            @endif
	        <table class="table table-bordered">
	            <tbody>
	                <tr>
	                    <th style="width: 50px">ID</th>
	                    <th style="width: 300px">Name</th>
	                    <th style="width: 350px">Email</th>
	                    <th style="width: 75px">Level</th>
	                    <th>Chức năng</th>
	                </tr>
	                @foreach ($data as $user)
		                <tr>
		                	<td>{{$user->id}}</td>
		                	<td>{{$user->name}}</td>
		                	<td>{{$user->email}}</td>
		                	<td>
		                		@if ($user->level == 1)
		                			<font color="red">Admin</font>
		                		@else
		                			<font>User</font>
		                		@endif
		                	</td>
		                	<td>
		                		<button type="button" class="btn btn-warning"><a href="{{url('admin/manage-user/edit/'.$user->id)}}"><font color="white">Sửa</font></a></button>
		                		<button type="button" class="btn btn-danger"><a href="{{url('admin/manage-user/delete/'.$user->id)}}"><font color="white">Xóa</font></a></button>
		                	</td>
		                </tr>
	                @endforeach
	            </tbody>
	        </table>
	    </div>
	    <!-- /.box-body -->
	    <div class="box-footer clearfix">
	        {!! $data->links() !!}
	    </div>
	</div>
@endsection