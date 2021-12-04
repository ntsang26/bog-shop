@extends('admin.layout_master')

@section('main-header')
    <div class="row my-4">
        <div class="col-md-4">
            <h3 class="text-muted">Dòng sản phẩm <small class="text-primary">Danh sách</small></h3>
        </div>
        <div class="col-md-8 text-right">
            <a href="{!! route('admin.product.cate.getAddCate') !!}"
                class="btn btn-primary text-white text-decoration-none"
            >
                Thêm mới
            </a>
        </div>
    </div>
    <div>
        <form action="" method="get">
            <div class="input-group mb-3 col-3">
                <input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyword" id="keyword">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">Lọc</button>
                </div>
              </div>
        </form>
    </div>
@endsection

@section('main-content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col-1">#</th>
            <th scope="col-3">Tên danh mục</th>
            <th scope="col-5">Hình ảnh</th>
            <th scope="col-3">Thao tác</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($cate as $item)
                <tr>
                    <th scope="row">{!! $item->id !!}</th>
                    <td>{!! $item->name !!}</td>
                    <td>
                        <img src="{!!asset("/storage/category/".$item->thumbnail)!!}" alt="cate image" height="60px">
                    </td>
                    <td>
                        <a href="{!! route('admin.product.cate.getEditCate', $item->id) !!}">
                            Chỉnh sửa
                        </a>
                        <a class="ml-3 text-danger" href="{!! route('admin.product.cate.getDeleteCate', $item->id) !!}">
                            Xóa
                        </a>
                    </td>
                </tr>
            @endforeach
    </tbody>
    <thead>
        <tr>
            <th scope="col-1">#</th>
            <th scope="col-3">Tên danh mục</th>
            <th scope="col-5">Hình ảnh</th>
            <th scope="col-3">Thao tác</th>
        </tr>
    </thead>
    </table>
@endsection