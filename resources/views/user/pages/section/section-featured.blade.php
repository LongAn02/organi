<div class="row">
    <div class="col-lg-12">
        <div class="section-title">
            <h2>Featured Product</h2>
        </div>
        <div class="featured__controls">
            <ul>
                <li class="active category" data-filter="*" data-id="0">All</li>
                @foreach($categories as $category)
                    <li class="category" data-filter="*" data-id="{{ $category['id'] }}">{{ ucfirst($category['name']) }}</li>
                @endforeach
                <li data-filter=".vegetables">None</li>
            </ul>
        </div>
    </div>
</div>
<div class="row featured__filter">
    @include('user.ajax.featured-product')
</div>

@section('ajax-categories-section-featured')
    <script>
        $(function (){
            $(document).on('click', '.category', function () {
                $(this).addClass('active mixitup-control-active');
                const id = $(this).data('id');
                $.ajax({
                    url : `{{ route('user.category.product.home') }}`,
                    type : "POST",
                    data : {id},
                    success : function (data){
                        if(data.success == 1) {
                            $('.featured__filter').html(data.view);
                        } else {
                            console.log('erro');
                        }
                    }
                });
            })
        })
    </script>
@endsection
