@extends('admin.layout_master')

@section('main-header')
<div class="row my-4">
    <div class="col-md-4">
        <h3 class="text-muted">Sản phẩm <small class="text-primary">Danh sách</small></h3>
    </div>
    <div class="col-md-8 text-right">
        <a href="{!! route('admin.product.add') !!}" class="btn btn-success text-white text-decoration-none">
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
            <th scope="col">#</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $item)
        <tr>
            <th scope="row">{!!$item->id!!}</th>
            <td>
                <img src="{{asset("storage/product/".$item->thumbnail)}}" alt="img product" height="60">
            </td>
            <td>{!!$item->name!!}</td>
            <td>{!!$item->category->name!!}</td>
            <td>
                <a href="{!! route('admin.product.edit', $item->id) !!}">
                    Chỉnh sửa
                </a>
                <a class="ml-3 text-danger" href="{!! route('admin.product.delete', $item->id) !!}">
                    Xóa
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
</table>
{{$product->links()}}
@endsection