@extends('layouts.admin')
@section('title','Setting Site')
@section('content')
	<div class="row">
		<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Cấu hình website</h3>
      </div>
      <div class="box-body">
        <form action="" method="POST" enctype="multipart/form-data">
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
                  <label>Tiêu đề website</label>
                  <input type="text" class="form-control" placeholder="Enter title..." name="txtTitle" value="{{old('txtTitle',$data['title'])}}">
          </div>
          <div class="form-group">
            <label>Avatar</label><br>
            <img src="{{URL::asset($data['avatar'])}}" alt="avatar" width="100" height="100"><hr>
            <label for="exampleInputFile">Upload Avatar</label>
            <input type="file" id="exampleInputFile" name='fileAvatar'>
            <p class="help-block">Chọn file ảnh để thay đổi ảnh đại diện</p>
          </div>
          <div class="form-group">
                   <label>Mô tả</label>
                   <textarea name="txtDes" class="form-control " id="ckeditor">{{old('txtDes',$data['des'])}}</textarea>
          </div>
          <div class="form-group">
                  <label>Địa chỉ (Footer)</label>
                  <input type="text" class="form-control" placeholder="Enter address..." name="txtAddress" value="{{old('txtAddress',$data['address'])}}">
          </div>
          <div class="form-group">
                  <label>Phone (Footer)</label>
                  <input type="text" class="form-control" placeholder="Enter phone..." name="txtPhone" value="{{old('txtPhone',$data['phone'])}}">
          </div>
          <div class="form-group">
                  <label>Email (Footer)</label>
                  <input type="email" class="form-control" placeholder="Enter email..." name="txtEmail" value="{{old('txtEmail',$data['email'])}}">
          </div>
          <div class="form-group">
                  <label>Twitter (Navi)</label>
                  <input type="text" class="form-control" placeholder="Enter link twitter..." name="txtTwitter" value="{{old('txtTwitter',$data['twitter'])}}">
          </div>
          <div class="form-group">
                  <label>Github (Navi)</label>
                  <input type="text" class="form-control" placeholder="Enter link github..." name="txtGithub" value="{{old('txtGithub',$data['github'])}}">
          </div>
          <div class="form-group">
                  <label>Facebook (Navi)</label>
                  <input type="text" class="form-control" placeholder="Enter link facebook..." name="txtFacebook" value="{{old('txtFacebook',$data['facebook'])}}">
          </div>
          <div class="form-group">
                  <label>Envelope (Navi)</label>
                  <input type="text" class="form-control" placeholder="Enter envelope..." name="txtEnvelope" value="{{old('txtEnvelope',$data['envelope'])}}">
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-primary">SỬA THÔNG TIN</button>
          </div>
        </form>
      </div>
    </div>
	</div>
@endsection