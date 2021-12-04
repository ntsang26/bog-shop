<section class="category">
    <div class="banner">
        <img src="plugin/frontend/img/banner.png" alt="" class="banner__image" />
    </div>
    <div class="container">
        <ul class="category__list">
            @foreach ($category as $item)
            <li class="category__item">
                <a href="#" class="category__link">
                    <img src="{{asset("storage/category/".$item->thumbnail)}}" alt="" class="category__thumb" />
                    <span>{!!$item->name!!}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>