<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="header__top__left">
                    <ul>
                        <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                        <li>Free Shipping for all Order of $99</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header__top__right">
                    <div class="header__top__right__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    </div>
                    <div class="header__top__right__language">
                        <img src="img/language.png" alt="">
                        <div>English</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#">Spanis</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                    <div class="header__top__right__auth ">
                        <span class="header__menu">
                            <ul>
                            <li><a href="{{ (auth()->user()) ? route('user.view.home') : route('user.view.login') }}">{{ (auth()->user()) ? auth()->user()->name : 'Login' }}</a>
                                <ul class="header__menu__dropdown">
                                    <li class="text-left"><a href="./shop-details.html">Account</a></li>
                                    <li class="text-left"><a href="{{ route('user.view.shopping-cart') }}">Shoping Cart</a></li>
                                    <li class="text-left"><a href="{{ route('user.logout') }}">{{ (auth()->user()) ? 'Logout' : 'Login' }}</a></li>
                                </ul>
                            </li>
                        </ul>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
