@extends('admin.layout_master')

@section('main-header')
    <div class="row my-4">
        <div class="col-md-4">
            <h3 class="text-muted">Người dùng <small class="text-primary">List</small></h3>
        </div>
        <div class="col-md-8 text-right">
            <a href="{!! route('admin.user.getAddUserRegister') !!}" class="btn btn-primary text-white text-decoration-none">
                Thêm người dùng
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
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td scope="row">{!!$item->id!!}</td>
                    <td>{!!$item->full_name!!}</td>
                    <td>{!!$item->phone!!}</td>
                    <td>
                        <a href="{!!route('admin.user.getEditUserRegister', $item->id)!!}" class="text-primary">
                            Chỉnh sửa
                        </a>
                        <a href="{!!route('admin.user.getDeleteUserRegister', $item->id)!!}" class="ml-3 text-danger">
                            Xóa
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
                <th>Thao tác</th>
            </tr>
        </thead>
    </table>
@endsection