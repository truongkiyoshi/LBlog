@extends('layouts.admin')
@section('title','Manage Post')
@section('content')
	<div class="box">
	    <div class="box-header with-border">
	        <h3 class="box-title">Manage Post</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	    	<button type="button" class="btn btn-success"><a href="{{url('admin/manage-post/add')}}"><font color='white'>Add Post</font></a></button><br>
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
	                    <th style="width: 250px">Title</th>
	                    <th style="width: 350px">Describe</th>
	                    <th style="width: 100px">Date</th>
	                    <td style="width: 100px">Author</td>
	                    <th>Chức năng</th>
	                </tr>
	                @foreach ($data as $post)
		                <tr>
		                	<td>{{$post->id}}</td>
		                	<td>{{$post->title}}</td>
		                	<td>{{substr( strip_tags($post->content), 0, 150)}}</td>
		                	<td>{{$post->date_post}}</td>
		                	<td>
		                		{{
		                			DB::table('users')	->select('name')
														->where('id','=',$post->user_id)
														->get('name')[0]->name
		                		}}
		                	</td>
		                	<td>
		                		<button type="button" class="btn btn-warning"><a href="{{url('admin/manage-post/edit/'.$post->id)}}"><font color="white">Sửa</font></a></button>
		                		<button type="button" class="btn btn-danger"><a href="{{url('admin/manage-post/delete/'.$post->id)}}"><font color="white">Xóa</font></a></button>
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