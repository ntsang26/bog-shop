@extends('frontend.layout_master')

@section('main-header')
@include('frontend.include.header')
@endsection

@section('main-content')
<section class="product-detail">
    <div class="container">
        <div class="detail__header">
            <ul class="detail__list">
                <li class="detail__item">
                    <a href="{!!route('home')!!}">
                        <i class="fas fa-home"></i>
                        Trang chủ
                    </a>
                </li>
                <li class="detail__item">
                    {!!$prd->category->name!!}
                </li>
                <li class="detail__item">
                    {!!$prd->name!!}
                </li>
            </ul>
        </div>
        <div class="detail__content">
            <img src="{!!asset('storage/product/'.$prd->thumbnail)!!}" alt="" class="detail__image">
            <div class="detail__info">
                <div class="detail__title">
                    <h3 class="detail__title--name">
                        {!!$prd->name!!}
                    </h3>
                    <p class="detail__title--code">
                        Mã sản phẩm: <span>{!!$prd->prd_code!!}</span>
                    </p>
                    <span class="detail__title--stocking">Còn hàng</span>
                </div>
                <div class="detail__pay">
                    <h3 class="detail__pay--price">
                        {!!number_format($prd->price)!!}đ
                    </h3>
                    <div class="detail__pay--select-model">
                        <p>Loại máy <span>Chọn Màu Và Loại Máy Khi Đặt Hàng</span></p>
                        <div class="detail__pay--model">
                            @foreach ($category as $item)
                                <h4 class="detail__pay--model-item">{!!$item->name!!}</h4>
                            @endforeach
                        </div>
                    </div>
                    <div class="detail__pay--count">
                        <button onclick="onMinus()">-</button>
                        <input type="text" id="count" value="0">
                        <button onclick="onPlus()">+</button>
                    </div>
                    <div class="detail__pay--button">
                        <button>Thêm vào giỏ hàng</button>
                        <button>Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('main-footer')
    @include('frontend.include.footer')
@endsection

@section('main-script')
    <script>
        function onMinus() {
            let count = document.getElementById('count')
            return count = count - 1
        }
    </script>
@endsection