@extends('admin.layout_master')

@section('main-header')
    <div class="row my-4">
        <div class="col-md-4">
            <h3 class="text-muted">Quản trị viên <small class="text-primary">List</small></h3>
        </div>
        <div class="col-md-8 text-right">
            <a href="{!! route('admin.user.getAddUserManager') !!}" class="btn btn-primary text-white text-decoration-none">
                Thêm quản trị viên
            </a>
        </div>
    </div>
@endsection

@section('main-content')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên người dùng</th>
                <th>Điện thoại</th>
                <th>Cấp bậc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td scope="row">{!!$item->id!!}</td>
                    <td>{!!$item->user_name!!}</td>
                    <td>{!!$item->phone!!}</td>
                    <td>{!! $item->roleUser->role_des!!}</td>
                    <td>
                        <a href="#" class="text-primary">
                            Chỉnh sửa
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên người dùng</th>
                <th>Điện thoại</th>
                <th>Cấp bậc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
    </table>
@endsection