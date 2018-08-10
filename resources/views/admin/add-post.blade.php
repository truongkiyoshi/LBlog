@extends('layouts.admin')
@section('title','Add Post')
@section('content')
	<div class="row">
		<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Thêm bài viết</h3>
      </div>
      <div class="box-body">
        <form action="" method="POST">
          @csrf
                <div class="form-group">
                  @if (session('success'))
          <div class="alert alert-success">
                <p>{{ session('success') }}</p>
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
          <div class="form-group">
                  <label>Tiêu đề bài viết</label>
                  <input type="text" class="form-control" placeholder="Enter title..." name="txtTitle" value="{{old('txtTitle')}}">
          </div>
          <div class="form-group">
                   <label>Nội dung</label>
                   <textarea name="txtContent" class="form-control " id="ckeditor">{{old('txtContent')}}</textarea>
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-primary">ĐĂNG BÀI</button>
          </div>
        </form>
      </div>
    </div>
	</div>
@endsection