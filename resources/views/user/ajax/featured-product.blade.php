@foreach($featuredProducts as $featuredProduct)
    <div class="col-lg-3 col-md-4 col-sm-6 mix category-block">
        <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/user/img/product'.$featuredProduct['img']) }}">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li class="add-product-to-cart" data-id="{{ $featuredProduct['id'] }}"><a href="#" style="pointer-events: none"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="featured__item__text">
                <h6><a href="#">{{ $featuredProduct['name'] }}</a></h6>
                <h5>${{ $featuredProduct['price'] }}</h5>
            </div>
        </div>
    </div>
@endforeach
