<header class="header">
    <div class="header__info">
        <h3 class="header__phone">
            <i class="fas fa-phone-alt"></i>
            <span>0984.36.02.29</span>
        </h3>
        <ul class="header__list">
            <li class="header__item">
                <i class="fas fa-user"></i>
                Tài khoản
            </li>
            <li class="header__item">
                <i class="fas fa-shopping-cart"></i>
                Giỏ hàng <span class="text-danger">(0)</span>
            </li>
        </ul>
    </div>
    <div class="header__menu">
        <a href="/" class="header__logo">BOG<span>Shop</span>.</a>

        <div class="header__mobi">
            <div class="header__search">
                <img src="{{asset("plugin/frontend/img/search.png")}}" alt="">
            </div>
            <i class="fas fa-bars header__bars" id="toggle"></i>
        </div>
        <ul class="header__menu--list" id="menu">
            <h3>MENU <i class="fas fa-times" id="close"></i></h3>
            @foreach ($category as $item)
            <li class="header__menu--item">
                <a href="#" class="header__menu--link">{!!$item->name!!}</a>
            </li>
            @endforeach
        </ul>
        <div class="header__form">
            <input type="text" class="header__input" placeholder="Tìm kiếm..." />
            <button class="header__button">
                <img src="{{asset("plugin/frontend/img/search.svg")}}" alt="" class="header__image" />
            </button>
        </div>
    </div>
</header>

<script>
    var toggle = document.getElementById("toggle")
    var menu = document.getElementById("menu")
    var closeToggle = document.getElementById("close")
    toggle.addEventListener("click", () => {
        menu.classList.add("show")
    })
    closeToggle.addEventListener("click", () => {
        menu.classList.remove("show")
    })
    // window.addEventListener('click', function(e){   
    //     if (menu.contains(e.target)){
    //         menu.classList.add("show")

    //     } else{
    //         menu.classList.remove("show")

    //     }
    // });
</script>