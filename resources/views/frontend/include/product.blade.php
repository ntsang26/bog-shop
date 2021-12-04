@if (count($product) > 0)
<section class="product">
    <div class="container">
        <h2 class="product__title">
            Sản phẩm hot
        </h2>
        <div class="product__list">
            <?php $count = 0; ?>
            @foreach ($product as $item)
            <?php if($count == 8) break; ?>
            <a href="/prd-detail/{{$item->id}}-{{Str::slug($item->name, '-')}}.html" class="product__item">
                <div class="product__thumb">
                    <img src={!!asset("storage/product/".$item->thumbnail)!!} alt="" />
                </div>
                <div class="product__desc">
                    <span class="product__name">{!!$item->name!!}</span>
                    <span class="product__price">{!!number_format($item->price)!!}đ</span>
                </div>
                <div class="product__buy">
                    <button class="product__button">
                        <i class="fas fa-shopping-cart"></i>
                        Mua nhanh
                    </button>
                    <button class="product__button">
                        <i class="fas fa-eye"></i>
                        Xem chi tiết
                    </button>
                </div>
            </a>
            <?php $count++; ?>
            @endforeach
        </div>
    </div>
</section>

<section class="product">
    <div class="container">
        <h2 class="product__title">Sản phẩm mới</h2>
        <div class="product__list">
            <?php $count = 0; ?>
            @foreach ($product->reverse() as $item)
            <?php if($count == 8) break; ?>
            <a href="/prd-detail/{{$item->id}}-{{Str::slug($item->name, '-')}}.html" class="product__item">
                <div class="product__thumb">
                    <img src={!!asset("storage/product/".$item->thumbnail)!!} alt="" />
                </div>
                <div class="product__desc">
                    <span class="product__name">{!!$item->name!!}</span>
                    <span class="product__price">{!!number_format($item->price)!!}đ</span>
                </div>
                <div class="product__buy">
                    <button class="product__button">
                        <i class="fas fa-shopping-cart"></i>
                        Mua nhanh
                    </button>
                    <button class="product__button">
                        <i class="fas fa-eye"></i>
                        Xem chi tiết
                    </button>
                </div>
            </a>
            <?php $count++; ?>
            @endforeach
        </div>
    </div>
</section>
@endif