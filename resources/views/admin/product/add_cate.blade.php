@extends('admin.layout_master')

@section('main-header')
<div class="row my-4">
    <div class="col-md-4">
        <h3 class="text-muted">Danh mục <small class="text-primary">Thêm mới</small></h3>
    </div>
</div>
@endsection

@section('main-content')
    <div class="d-flex justify-content-center my-3">
        <form class="col-8" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục *</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="thumbnail">Hình ảnh danh mục *</label>
                <div class="uploade-zone">
                    <label>
                        <img src="{!!asset("/img/add_img.png")!!}" id="preview" alt="cate image" class="pt-2" height="200px">
                        <input type="file" class="form-control col-1" id="pre" name="thumbnail" hidden>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ url()->previous() }}" class="btn btn-danger">Hủy</a>
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

