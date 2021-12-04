@extends('admin.layout_master')

@section('main-header')
<div class="row my-4">
    <div class="col-md-4">
        <h3 class="text-muted">Quản trị viên <small class="text-primary">Thêm mới</small></h3>
    </div>
</div>
@endsection

@section('main-content')
    <div class="d-flex justify-content-center my-3">
        <form class="col-8" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_name">Tên đăng nhập *</label>
                <input type="text" class="form-control" name="user_name">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="role">Cấp bậc</label>
                <?php 
                    $role = \Spatie\Permission\Models\Permission::all();
                ?>
                <select class="form-control" name="role" id="role">
                    @foreach ($role as $item)
                        <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-danger">Hủy</button>
        </form>
    </div>
@endsection