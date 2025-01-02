@extends('layouts/user/layoutmaster')
@section('content')
<head>
   <title> {{ $setting->site_name ?? 'NULL' }} - Tất Cả Sản Phẩm </title>
</head>
<div>
    <section class="bread-crumb">
        <div class="container">
           <div class="row">
              <div class="col-xs-12 a-left">
                 <ul class="breadcrumb">
                    <li class="home">
                       <a href="/"><span>Trang chủ</span></a>						
                       <span class="br-line">|</span>
                    </li>
                    <li><strong><span> Tất cả sản phẩm</span></strong></li>
                 </ul>
              </div>
           </div>
        </div>
     </section>
     <div class="container border-bottom-col">
        <div class="row">
           <section class="main_container collection col-lg-10 col-lg-push-2">
              <div class="category-products products">
                 <div class="sortPagiBar">
                    <div class="row">
                       <div class="col-xs-5 col-sm-6 fix-xss-12">
                          <h1 class=" title-head margin-top-0 margin-bottom-0">Tất cả sản phẩm</h1>
                       </div>
                       <div class="col-xs-7 col-sm-6 text-xs-left text-sm-right fix-xss-12">
                          <div>
                             <div id="sort-by">
                                <ul>
                                   <li>
                                      <span class="fixtt">Thứ tự</span>
                                      <ul>
                                         <li><a href="?sortby=default">Mặc định</a></li>
                                         <li><a href="?sortby=alpha-asc">A → Z</a></li>
                                         <li><a href="?sortby=alpha-desc">Z → A</a></li>
                                         <li><a href="?sortby=price-asc">Giá tăng dần</a></li>
                                         <li><a href="?sortby=price-desc">Giá giảm dần</a></li>
                                         <li><a href="?sortby=created-desc">Hàng mới nhất</a></li>
                                         <li><a href="?sortby=created-asc">Hàng cũ nhất</a></li>
                                      </ul>
                                   </li>
                                   <script>
                                      $(document).ready(function() {
                                          function getQueryVariable(variable)
                                          {
                                              var query = window.location.search.substring(1);
                                              var vars = query.split("&");
                                              for (var i=0;i<vars.length;i++) {
                                                  var pair = vars[i].split("=");
                                                  if(pair[0] == variable){return pair[1];}
                                              }
                                              return(false);
                                          }
                                          var check = getQueryVariable("sortby");
                                          
                                          switch(check){
                                              case "default":
                                                  $('.fixtt').text('Mặc định');		
                                                  break;
                                              case "alpha-asc":
                                                  $('.fixtt').text('Tên A - Z');		
                                                  break;
                                              case "alpha-desc":
                                                  $('.fixtt').text('Tên Z - A');		
                                                  break;
                                              case "price-asc":
                                                  $('.fixtt').text('Giá tăng dần');		
                                                  break;
                                              case "price-desc":
                                                  $('.fixtt').text('Giá giảm dần');		
                                                  break;
                                              case "created-asc":
                                                  $('.fixtt').text('Hàng cũ nhất');		
                                                  break;
                                              case "created-desc":
                                                  $('.fixtt').text('Hàng mới nhất');		
                                                  break;
                                          }
                                      });
                                   </script>
                                </ul>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 @if(session()->has('success'))
                     <div class="alert alert-success">
                        {{ session()->get('success') }}
                     </div>
                  @endif
                 <section class="products-view products-view-grid">
                     @if(count($products) == 0)
                        <p style="text-align: center; font-style: italic; color: gray;">No products found</p>
                     @else
                        <div class="row">
                           @foreach($products as $product)
                              <div class="col-xs-6 col-sm-4 col-md-4 col-lg-5-fix">
                                 <div class="product-box a-center">
                                    <div class="product-thumbnail">
                                       @if($product->discount)
                                          <div class="sale-flash"> 
                                             {{ $product->discount->discount_level }}% 
                                          </div>
                                       @endif
                                       <a href="/collections/{{ $product->id }}" title="{{ $product->name }}">
                                          <picture>
                                             <source media="(min-width: 1200px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                             <source media="(min-width: 992px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                             <source media="(min-width: 569px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                             <source media="(max-width: 480px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">
                                             <source media="(max-width: 375px)" srcset="{{ asset('storage/' . $product->images->first()->image_url) }}">

                                             <img width="240" height="240" data-src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}" class="lazyload img-responsive center-block">
                                          </picture>
                                       </a>
                                       <div class="product-action clearfix">
                                          <form action="{{ route('cart.add') }}" method="post" class="variants form-nut-grid" data-id="product-actions-{{ $product->id }}" enctype="multipart/form-data">
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
                                       </div>
                                    </div>
                                    <div class="product-info">
                                       <h3 class="product-name"><a href="/collections/{{ $product->id }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
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
                        <div class="text-xs-center">
                        <nav class="clearfix a-center">
                              <ul class="pagination clearfix">
                                    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                              </ul>
                        </nav>
                        </div>
                     @endif
                 </section>
              </div>
           </section>
           <aside class="sidebar left left-content col-lg-2 col-lg-pull-10">
              <aside class="aside-item sidebar-category collection-category">
                 <div class="aside-title">
                    <h2 class="title-head margin-top-0"><span>Sản phẩm Nam</span></h2>
                 </div>
                 <div class="aside-content">
                    <nav class="nav-category navbar-toggleable-md">
                       <ul class="nav navbar-pills">
                           @if($maleCate)
                              @foreach($maleCate as $category)
                                 <li class="nav-item">
                                    <i class="fa fa-caret-right"></i>
                                    <a class="nav-link" href="{{ route('product.productByCategory', ['gender' => 'male', 'categoryName' => $category->name]) }}">
                                       {{ $category->name }} <small>({{ $category->product_count }})</small>
                                    </a>
                                 </li>
                           @endforeach
                           @endif
                       </ul>
                    </nav>
                 </div>
              </aside>
              <aside class="aside-item sidebar-category collection-category">
                 <div class="aside-title">
                    <h2 class="title-head margin-top-0"><span>Sản phẩm Nữ</span></h2>
                 </div>
                 <div class="aside-content">
                    <nav class="nav-category navbar-toggleable-md">
                       <ul class="nav navbar-pills">
                           @if($famaleCate)
                              @foreach($famaleCate as $category)
                                 <li class="nav-item">
                                    <i class="fa fa-caret-right"></i>
                                    <a class="nav-link" href="{{ route('product.productByCategory', ['gender' => 'famale', 'categoryName' => $category->name]) }}">
                                       {{ $category->name }} <small>({{ $category->product_count }})</small>
                                 </a>
                                 </li>
                              @endforeach
                           @endif
                       </ul>
                    </nav>
                 </div>
              </aside>
           </aside>
        </div>
     </div>
     @include('page/list_brands');
</div>
@endsection
