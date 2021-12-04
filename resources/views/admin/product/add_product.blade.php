@extends('admin.layout_master')

@section('main-header')
<div class="row my-4">
    <div class="col-md-4">
        <h3 class="text-muted">Sản phẩm<small class="text-primary">Thêm mới</small></h3>
    </div>
    <div class="col-md-8 text-right">
        <a href="{!! route('admin.product.cate.getList') !!}" class="btn btn-primary text-white text-decoration-none">
            Danh mục
        </a>
    </div>
</div>
@endsection

@section('main-content')
<div class="d-flex justify-content-center my-3">
    <form class="col-8" method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="sale_off">Danh mục</label>
            <select class="custom-select" name="category_id" id="category_id">
                @foreach ($cate as $item)
                    @if ($item->status == 1)
                        <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm</label>
            <div class="input-group">
                <input type="text" class="form-control" name="price" id="price">
                <div class="input-group-append">
                    <span class="input-group-text">VNĐ</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="thumbnail">Hình ảnh sản phẩm</label>
            <div class="uploade-zone">
                <label>
                    <img src="{!!asset("img/add_img.png")!!}" id="preview" alt="cate image" class="pt-2">
                    <input type="file" class="form-control col-1" id="pre" name="thumbnail" hidden>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="form-group">
            <label for="sale_off">Khuyến mãi</label>
            <select class="custom-select" name="sale_off">
                <option value="0">Có</option>
                <option value="1">Không</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
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

        $('#price').inputmask({
            alias: 'numeric',
            groupSeparator: ',',
            autoGroup: true,
            digits: 0,
            digitsOptional: false,
            prefix: '',
            rightAlign:true,
            autoUnmask: true,
            removeMaskOnSubmit:true
        });
</script>
@endsection