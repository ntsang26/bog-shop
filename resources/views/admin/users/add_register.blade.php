@extends('admin.layout_master')

@section('main-header')
<div class="row my-4">
    <div class="col-md-4">
        <h3 class="text-muted">Người dùng <small class="text-primary">Thêm mới</small></h3>
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
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="full_name">Họ và tên *</label>
                <input type="text" class="form-control" name="full_name">
            </div>
            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label>
                <div class="uploade-zone">
                    <label>
                        <img src="{!!asset("img/add-image.png")!!}" id="preview" alt="cate image" class="pt-2">
                        <input type="file" class="form-control col-1" id="pre" name="avatar" hidden>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-danger">Hủy</button>
        </form>
    </div>
@endsection

@section('main-script')
    <script>
          function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pre").change(function(){
        readURL(this);
    });
    </script>
@endsection