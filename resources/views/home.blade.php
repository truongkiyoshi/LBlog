@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bạn đã đăng nhập thành công! Truy cập AdminCP bằng cách vào đây: <a href="{{URL::asset('admin')}}">AdminCP</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection