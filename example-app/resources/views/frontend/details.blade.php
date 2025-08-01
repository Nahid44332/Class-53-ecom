@extends('frontend.master')
@section('content')
<section class="product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="product-details-wrapper">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="product-images-slider-outer">
                                <div class="slider slider-content">
                                   @foreach ($product->galleryImage as $image)
                                        <div>
                                            <img src="{{asset('/backend/images/galleryImage/'.$image->image)}}" alt="slider images">
                                        </div>
                                   @endforeach
                                </div>
                                <div class="slider slider-thumb">
                                   @foreach ($product->galleryImage as $image)
                                        <div>
                                            <img src="{{asset('/backend/images/galleryImage/'.$image->image)}}" alt="slider images">
                                        </div>
                                   @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="product-details-content">
                                <h3 class="product-name">
                                    {{$product->name}}
                                </h3>
                                <div class="product-price">
                                   @if ($product->discount_price != null)
                                    <div class="product__item-discount-price">
                                        <del>{{ $product->regular_price }} Tk.</del>
                                    </div>
                                    <div class="product__item-regular-price">
                                        <span>{{ $product->discount_price }} Tk.</span>
                                    </div>
                                @else
                                    <div class="product__item-regular-price">
                                        <span>{{ $product->regular_price }} Tk.</span>
                                    </div>
                                @endif
                                </div>
                                <form action="{{url('/product-details/add-to-card/'.$product->id)}}" method="POST">
                                    @csrf
                                <div class="product-details-select-items-wrap">
                                    @foreach ($product->color as $singleColor)
                                        <div class="product-details-select-item-outer">
                                        <input type="radio" name="color" id="color" value="{{$singleColor->color_name}}" class="category-item-radio">
                                        <label for="color" class="category-item-label">
                                            {{$singleColor->color_name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="product-details-select-items-wrap">
                                    @foreach ($product->size as $singleSize)
                                        <div class="product-details-select-item-outer">
                                            <input type="radio" name="size" value="{{$singleSize->size_name}}" class="category-item-radio">
                                            <label for="size" class="category-item-label">{{$singleSize->size_name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                    <div class="purchase-info-outer">
                                        <div class="product-incremnt-decrement-outer" style="display: block">
                                            <a title="Decrement" class="decrement-btn" style="margin-top: -10px;">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                            <input type="number" readonly name="qty" placeholder="Qty" value="1" min="1" id="qty" style="height: 35px">
                                            <a title="Increment" class="increment-btn" style="margin-top: -10px;">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <button type="submit" name="action" value="addToCart" id="addToCart" class="cart-btn-inner">
                                                <i class="fas fa-shopping-cart"></i>
                                                Add to Cart
                                            </button>
                                            <button type="submit" name="action" value="buyNow" id="buyNow" class="cart-btn-inner">
                                                <i class="fas fa-truck"></i>
                                                Quick Order
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <button type="button" class="product-details-hot-line">
                                    <i class="fas fa-phone-alt"></i>
                                    For Call : 0123456854
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-details-info">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                                    Description
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review" aria-selected="true">
                                    Review
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-policy-tab" data-bs-toggle="pill" data-bs-target="#pills-policy" type="button" role="tab" aria-controls="pills-policy" aria-selected="true">
                                    Product Policy
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                               {!!$product->description!!}
                            </div>
                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="review-item-wrapper">
                                    <div class="review-item-left">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="review-item-right">
                                        <h4 class="review-author-name">
                                            Saidul Islam 
                                            <span class=" d-inline bg-danger badge-sm badge text-white">Verified</span>
                                        </h4>
                                        <p class="review-item-message">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis minus, ut unde laudantium accusamus odio nam officia aperiam excepturi quis nesciunt eveniet eligendi.
                                        </p>
                                        <span class="review-item-rating-stars">
                                            <i class="fa-star fas"></i>
                                            <i class="fa-star fas"></i>
                                            <i class="fa-star fas"></i>
                                            <i class="fa-star fas"></i>
                                            <i class="fa-star fas"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-policy" role="tabpanel" aria-labelledby="pills-policy-tab">
                               {!!$product->product_policy!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="product-details-sidebar">
                    <div class="product-details-categoris">
                        <h3 class="product-details-title">
                            Category
                        </h3>
                        @foreach ($categories as $category)
                            <a href="#" class="category-item-outer">
                                <img src="{{asset('backend/images/category/'.$category->image)}}" alt="category image">
                                {{$category->name}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script>
        let qtyInput = document.getElementById('qty');
        let minusbtn = document.querySelector('.decrement-btn');
        let plusbtn = document.querySelector('.increment-btn');

        minusbtn.addEventListener('click', function(){
            if(parseInt(qtyInput.value) > 1)
            qtyInput.value = parseInt(qtyInput.value) - 1;
        });
        plusbtn.addEventListener('click', function(){
            qtyInput.value = parseInt(qtyInput.value) + 1;
        });
    </script>
@endpush