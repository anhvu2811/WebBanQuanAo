@extends('layouts/user/layoutmaster')
@section('content')
<head>
   <title>{{ $setting->site_name ?? 'NULL' }} - Trang Chủ</title>
   <link rel="icon" href="{{ asset('public/images/favicon.ico') }}" type="image/x-icon">
   <style>
      .home-slider {
         width: 100%;
         max-height: 550px;
         overflow: hidden;
      }
      
      .swiper-wrapper {
         display: flex;
      }

      .swiper-slide {
         width: 100%;
         flex-shrink: 0;
         height: 100%;
      }

      .swiper-slide img {
         width: 100%;  
         height: auto; 
         object-fit: cover;
      }

      img.img-responsive {
         width: 100%;
         height: 100%;
         object-fit: cover;
      }

      .swiper-button-next::after, .swiper-button-prev::after {
         color: white;
         font-size: 10px; 
      }

      .swiper-button-next {
         right: 10px;
      }

      .swiper-button-prev {
         left: 10px;
      }

      .swiper-button-next::after, .swiper-button-prev::after {
         font-size: 20px;
      }

   </style>
</head>
<div>
    <section class="awe-section-1">
        <div class="home-slider swiper-container">
           <div class="swiper-wrapper">
               @foreach($bannerMain as $banner)
                  <div class="swiper-slide">
                  <a href="#" class="clearfix" title="">
                     <picture>
                        <source media="(min-width: 1200px)" srcset="{{ asset($banner && $banner->banner_url ? 'storage/' . $banner->banner_url : 'path/to/default-image.jpg') }}">
                        <source media="(min-width: 992px)" srcset="{{ asset($banner && $banner->banner_url ? 'storage/' . $banner->banner_url : 'path/to/default-image.jpg') }}">
                        <source media="(min-width: 569px)" srcset="{{ asset($banner && $banner->banner_url ? 'storage/' . $banner->banner_url : 'path/to/default-image.jpg') }}">
                        <source media="(max-width: 480px)" srcset="{{ asset($banner && $banner->banner_url ? 'storage/' . $banner->banner_url : 'path/to/default-image.jpg') }}">
                        <img width="1920" height="550" src="{{ asset($banner && $banner->banner_url ? 'storage/' . $banner->banner_url : 'path/to/default-image.jpg') }}" alt="" class="img-responsive center-block">
                     </picture>
                  </a>
                  </div>
               @endforeach
           </div>
           {{-- <div class="swiper-button-next"></div>
           <div class="swiper-button-prev"></div> --}}

           <div class="swiper-pagination"></div>
        </div>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
         <script>
            var swiper = new Swiper('.home-slider', {
               slidesPerView: 1, // Mỗi lần hiển thị 1 slide
               spaceBetween: 0,  // Khoảng cách giữa các slide
               autoplay: {
                  delay: 3500, // Thời gian tự động chuyển slide (2500ms = 2.5s)
                  disableOnInteraction: false // Slide sẽ tiếp tục chạy khi người dùng tương tác
               },
               loop: true, // Cho phép lặp lại các slide
               pagination: {
                  el: '.swiper-pagination', // Nếu bạn muốn có phân trang
                  clickable: true,           // Bấm vào để chuyển slide
               },
               navigation: {
                  nextEl: '.swiper-button-next', // Nút chuyển tiếp
                  prevEl: '.swiper-button-prev', // Nút quay lại
               }
            });
         </script>

    </section>
    <section class="awe-section-2">
        <div class="container">
           <div class="row">
               {{-- @foreach($bannerSub as $bannerSub)
                  <div class="col-sm-6">
                     <a href="#" class="img1 img_1 inline-block">
                        <picture>
                           <source media="(min-width: 1200px)" srcset="{{ asset($bannerSub ? 'storage/' . $bannerSub->banner_url : 'null') }}">
                           <source media="(min-width: 992px)" srcset="{{ asset($bannerSub ? 'storage/' . $bannerSub->banner_url : 'null') }}">
                           <source media="(min-width: 569px)" srcset="{{ asset($bannerSub ? 'storage/' . $bannerSub->banner_url : 'null') }}">
                           <source media="(max-width: 480px)" srcset="{{ asset($bannerSub ? 'storage/' . $bannerSub->banner_url : 'null') }}">
                           <img width="555" height="280" src="{{ asset($bannerSub ? 'storage/' . $bannerSub->banner_url : 'null') }}" alt="Winehourse" class="img-responsive center-block">
                        </picture>
                     </a>
                  </div>
               @endforeach --}}
           </div>
        </div>
    </section>
    <section class="awe-section-3">
        <div class="section section-deal products-view-grid">
           <div class="container">
              <div class="section-title a-center">
                 <h2>Được ưa thích nhất</h2>
                 <p></p>
              </div>
              <div class="section-content">
                 <div class="swiper_deal swiper-container products products-view-grid">
                    <div class="swiper-wrapper">
                        @foreach($hotTrendProducts as $hotTrendProduct)
                           <div class="swiper-slide">
                              <div class="product-box a-center">
                                 <div class="product-thumbnail"> 
                                    @if($hotTrendProduct->product->discount)
                                       <div class="sale-flash"> 
                                          {{ $hotTrendProduct->product->discount->discount_level }}% 
                                       </div>
                                    @endif
                                    <a href="/collections/{{ $hotTrendProduct->product->id }}" title="Rượu Remy Martin CLUB">
                                       <picture>
                                          <source media="(min-width: 1200px)" srcset="{{ asset('storage/' . $hotTrendProduct->product->images->first()->image_url) }}">
                                          <source media="(min-width: 992px)" srcset="{{ asset('storage/' . $hotTrendProduct->product->images->first()->image_url) }}">
                                          <source media="(min-width: 569px)" srcset="{{ asset('storage/' . $hotTrendProduct->product->images->first()->image_url) }}">
                                          <source media="(max-width: 480px)" srcset="{{ asset('storage/' . $hotTrendProduct->product->images->first()->image_url) }}">
                                          <source media="(max-width: 375px)" srcset="{{ asset('storage/' . $hotTrendProduct->product->images->first()->image_url) }}">
                                          <img width="240" height="240" data-src="{{ asset('storage/' . $hotTrendProduct->product->images->first()->image_url) }}" alt="{{ ($hotTrendProduct->product->name) }}" class="lazyload img-responsive center-block">
                                       </picture>
                                    </a>
                                    {{-- <div class="product-action clearfix">
                                       <form action="{{ route('cart.add') }}" method="post" class="variants form-nut-grid" data-id="product-actions-507866" enctype="multipart/form-data">
                                          @csrf
                                          <div>
                                             <input type="hidden" name="product_id" value="{{ $hotTrendProduct->product->id }}">
                                             <input type="hidden" name="quantity" value="1" min="1" max="10">
                                                @if($hotTrendProduct->product->discount) 
                                                   <input type="hidden" name="price" value="{{ $hotTrendProduct->product->discount->new_price }}">
                                                @else
                                                   <input type="hidden" name="price" value="{{ $hotTrendProduct->product->price }}">
                                                @endif
                                             <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                                <span>
                                                   <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                   Mua hàng
                                                </span>
                                             </button>
                                          </div>
                                       </form>
                                    </div> --}}
                                 </div>
                                 <div class="product-info">
                                    <h3 class="product-name"><a href="/ruou-remy-martin-club" title="Rượu Remy Martin CLUB">{{ ($hotTrendProduct->product->name) }}</a></h3>
                                    <div class="price-box clearfix">
                                       @if($hotTrendProduct->product->discount)
                                          <div class="special-price inline-block">
                                             <span class="price product-price">{{ number_format($hotTrendProduct->product->discount->new_price, 0, ',', '.') }}₫</span>
                                          </div>
                                          <div class="old-price inline-block">															 
                                             <span class="price product-price-old">
                                                {{ number_format($hotTrendProduct->product->price, 0, ',', '.') }}₫
                                             </span>
                                          </div>
                                       @else
                                          <div class="special-price inline-block">
                                             <span class="price product-price">{{ number_format($hotTrendProduct->product->price, 0, ',', '.') }}₫</span>
                                          </div>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <script>
           var swiper = new Swiper('.swiper_deal', {
               slidesPerView: 1,
               spaceBetween: 30,
               slidesPerGroup: 1,
               loop: false,
               breakpoints: {
                   300: {
                       slidesPerView: 2,
                       spaceBetween: 30,
                       slidesPerGroup: 1,
                   },
                   640: {
                       slidesPerView: 2,
                       spaceBetween: 30,
                       slidesPerGroup: 1,
                   },
                   768: {
                       slidesPerView: 2,
                       spaceBetween: 30
                   },
                   1024: {
                       slidesPerView: 3,
                       spaceBetween: 30
                   },
                   1200: {
                       slidesPerView: 4,
                       spaceBetween: 30
                   }
               }
           });
        </script>
    </section>
    <section class="awe-section-4">
        <div class="banner2 hidden-sm hidden-xs">
           <div class="container">
              <div class="row row-8Gutter">
                 <div class="col-md-8">
                    <div class="row row-8Gutter">
                       <div class="col-md-6">
                          <div class="banner-item img1">
                             <div class="info">
                                <span>Quần áo</span>
                             </div>
                             <a href="#" class="inline-block">
                             <img class="imageload lazyload" src="{{ asset('storage/spotlight/spotlight_1.jpg') }}" alt="Winehourse">
                             </a>
                             <div class="ov1"></div>
                             <div class="ov2"></div>
                             <div class="ov3"></div>
                             <div class="ov4"></div>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="banner-item img1">
                             <div class="info">
                                <span>Quần áo</span>
                             </div>
                             <a href="#" class="inline-block">
                             <img class="imageload lazyload" src="{{ asset('storage/spotlight/spotlight_2.jpg') }}" alt="Winehourse">
                             </a>
                             <div class="ov1"></div>
                             <div class="ov2"></div>
                             <div class="ov3"></div>
                             <div class="ov4"></div>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="banner-item img1">
                             <div class="info">
                                <span>Quần áo</span>
                             </div>
                             <a href="#" class="inline-block">
                             <img class="imageload lazyload" src="{{ asset('storage/spotlight/spotlight_4.jpg') }}" alt="Winehourse">
                             </a>
                             <div class="ov1"></div>
                             <div class="ov2"></div>
                             <div class="ov3"></div>
                             <div class="ov4"></div>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="banner-item img1">
                             <div class="info">
                                <span>Quần áo</span>
                             </div>
                             <a href="#" class="inline-block">
                             <img class="imageload lazyload" src="{{ asset('storage/spotlight/spotlight_3.jpg') }}" alt="Winehourse">
                             </a>
                             <div class="ov1"></div>
                             <div class="ov2"></div>
                             <div class="ov3"></div>
                             <div class="ov4"></div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="banner-item img1">
                       <div class="info">
                          <span>Quần áo</span>
                       </div>
                       <a href="#" class="inline-block">
                       <img class="imageload lazyload" src="{{ asset('storage/spotlight/spotlight_5.jpg') }}" alt="Winehourse">
                       </a>
                       <div class="ov1"></div>
                       <div class="ov2"></div>
                       <div class="ov3"></div>
                       <div class="ov4"></div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </section>
    <section class="awe-section-5">
        <div class="section section-collection-products products-view-grid">
           <div class="container">
              <div class="row">
                 <div class="col-md-12 col-sm-12">
                    <div class="section-title a-center">
                       <h2>Sản phẩm bán chạy</h2>
                    </div>
                    <div class="section-content">
                       <div class="swiper_col_1 swiper-container products products-view-grid">
                          <div class="swiper-wrapper">
                             <div class="swiper-slide">
                                <div class="product-box a-center">
                                   <div class="product-thumbnail">
                                      <div class="sale-flash"> 
                                         8% 
                                      </div>
                                      <a href="/ruou-remy-martin-club" title="Rượu Remy Martin CLUB">
                                         <picture>
                                            <source media="(min-width: 1200px)" srcset="images/ruou24_1.jpg">
                                            <source media="(min-width: 992px)" srcset="images/ruou24_1.jpg">
                                            <source media="(min-width: 569px)" srcset="images/ruou24_1.jpg">
                                            <source media="(max-width: 480px)" srcset="images/ruou24.jpg">
                                            <source media="(max-width: 375px)" srcset="images/ruou24.jpg">
                                            <img width="240" height="240" data-src="https://bizweb.dktcdn.net/100/022/044/products/ruou24.jpg?v=1445851659983" alt="Rượu Remy Martin CLUB" class="lazyload img-responsive center-block">
                                         </picture>
                                      </a>
                                      {{-- <div class="product-action clearfix">
                                         <form action="{{ route('cart.add') }}" method="post" class="variants form-nut-grid" data-id="product-actions-507866" enctype="multipart/form-data">
                                             @csrf
                                             <div>
                                               <input type="hidden" name="variantId" value="811090">
                                               <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                                  <span>
                                                     <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                     Mua hàng
                                                  </span>
                                               </button>
                                            </div>
                                         </form>
                                      </div> --}}
                                   </div>
                                   <div class="product-info">
                                      <h3 class="product-name"><a href="/ruou-remy-martin-club" title="Rượu Remy Martin CLUB">Rượu Remy Martin CLUB</a></h3>
                                      <div class="price-box clearfix">
                                         <div class="special-price inline-block">
                                            <span class="price product-price">1.230.000₫</span>
                                         </div>
                                         <div class="old-price inline-block">															 
                                            <span class="price product-price-old">
                                            1.340.000₫			
                                            </span>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <script>
           var swiper = new Swiper('.swiper_col_1', {
               slidesPerView: 1,
               spaceBetween: 30,
               slidesPerGroup: 1,
               loop: false,
               breakpoints: {
                   300: {
                       slidesPerView: 2,
                       spaceBetween: 30,
                       slidesPerGroup: 1,
                   },
                   640: {
                       slidesPerView: 2,
                       spaceBetween: 30,
                       slidesPerGroup: 1,
                   },
                   768: {
                       slidesPerView: 2,
                       spaceBetween: 30
                   },
                   1024: {
                       slidesPerView: 3,
                       spaceBetween: 30
                   },
                   1200: {
                       slidesPerView: 5,
                       spaceBetween: 30
                   }
               }
           });
        </script>
    </section>
    <section class="awe-section-6">
        <div class="section section-collection-products products-view-grid">
           <div class="container">
              <div class="row">
                 <div class="col-md-12 col-sm-12">
                    <div class="section-title a-center">
                       <h2>Hot nhất hôm nay</h2>
                    </div>
                    <div class="section-content">
                       <div class="swiper_col_2 swiper-container products products-view-grid">
                          <div class="swiper-wrapper">
                              @foreach($listLatestProducts as $product)
                                 <div class="swiper-slide">
                                    <div class="product-box a-center">
                                       <div class="product-thumbnail">
                                          @if($product->discount)
                                             <div class="sale-flash"> 
                                                {{ $product->discount->discount_level }}% 
                                             </div>
                                          @endif
                                          <a href="/collections/{{ $product->id }}" title="Rượu Remy Martin CLUB">
                                             <picture>
                                                <source media="(min-width: 1200px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                                <source media="(min-width: 992px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                                <source media="(min-width: 569px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                                <source media="(max-width: 480px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                                <source media="(max-width: 375px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                                <img width="240" height="240" data-src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}" class="lazyload img-responsive center-block">
                                             </picture>
                                          </a>
                                          {{-- <div class="product-action clearfix">
                                             <form action="{{ route('cart.add') }}" method="post" class="variants form-nut-grid" data-id="product-actions-507866" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                   <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                   <input type="hidden" name="quantity" value="1" min="1" max="10">
                                                   @if($product->discount) 
                                                      <input type="hidden" name="price" value="{{ $product->discount->new_price }}">
                                                   @else
                                                      <input type="hidden" name="price" value="{{ $product->price }}">
                                                   @endif
                                                   <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                                      <span>
                                                         <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                         Mua hàng
                                                      </span>
                                                   </button>
                                                </div>
                                             </form>
                                          </div> --}}
                                       </div>
                                       <div class="product-info">
                                          <h3 class="product-name"><a href="/ruou-remy-martin-club" title="Rượu Remy Martin CLUB">{{ $product->name }}</a></h3>
                                          <div class="price-box clearfix">
                                             @if($product->discount)
                                                <div class="special-price inline-block">
                                                   <span class="price product-price">{{ number_format($product->discount->new_price, 0, ',', '.') }}₫</span>
                                                </div>
                                                <div class="old-price inline-block">															 
                                                   <span class="price product-price-old">
                                                      {{ number_format($product->price, 0, ',', '.') }}₫
                                                   </span>
                                                </div>
                                             @else
                                                <div class="special-price inline-block">
                                                   <span class="price product-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                                </div>
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              @endforeach
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <script>
           var swiper = new Swiper('.swiper_col_2', {
               slidesPerView: 1,
               spaceBetween: 30,
               slidesPerGroup: 1,
               loop: false,
               breakpoints: {
                   300: {
                       slidesPerView: 2,
                       spaceBetween: 30,
                       slidesPerGroup: 1,
                   },
                   640: {
                       slidesPerView: 2,
                       spaceBetween: 30,
                       slidesPerGroup: 1,
                   },
                   768: {
                       slidesPerView: 2,
                       spaceBetween: 30
                   },
                   1024: {
                       slidesPerView: 3,
                       spaceBetween: 30
                   },
                   1200: {
                       slidesPerView: 5,
                       spaceBetween: 30
                   }
               }
           });
        </script>
    </section>
    @include('page/list_brands');
</div>
@endsection

