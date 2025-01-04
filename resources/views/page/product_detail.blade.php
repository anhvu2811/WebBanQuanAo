@extends('layouts/user/layoutmaster')
@section('content')
<head>
   <title> {{ $setting->site_name ?? 'NULL' }} - Chi Tiết Sản Phẩm </title>
   <style>
      .btn-size.selected {
         background-color: #e8b34f;
         color: white !important;;
      }

      .btn-size {
         background-color: #f8f9fa;
         color: #333;
      }
   </style>
</head>
<div>
      <section class="product">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 details-product">
                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 relative product-image-block ">
                        <div class="large-image featured-image">
                           <a href="{{ asset('storage/' . $product->images->first()->image_url) }}" data-rel="prettyPhoto[product-gallery]">
                           <img id="zoom_01" src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}">
                           </a>							
                           <div class="hidden">
                              <div class="item">
                                 <a href="https://bizweb.dktcdn.net/thumb/compact/100/022/044/products/ruou16-c6ec3060-8d74-485c-a972-2d77a6233372.jpg?v=1446197510767" data-image="https://bizweb.dktcdn.net/100/022/044/products/ruou16-c6ec3060-8d74-485c-a972-2d77a6233372.jpg?v=1446197510767" data-zoom-image="https://bizweb.dktcdn.net/100/022/044/products/ruou16-c6ec3060-8d74-485c-a972-2d77a6233372.jpg?v=1446197510767" data-rel="prettyPhoto[product-gallery]">										
                                 </a>
                              </div>
                              <div class="item">
                                 <a href="https://bizweb.dktcdn.net/thumb/compact/100/022/044/products/ruou33-17d97223-6bf5-47ca-b268-3efc3bdef186.jpg?v=1446197581247" data-image="https://bizweb.dktcdn.net/100/022/044/products/ruou33-17d97223-6bf5-47ca-b268-3efc3bdef186.jpg?v=1446197581247" data-zoom-image="https://bizweb.dktcdn.net/100/022/044/products/ruou33-17d97223-6bf5-47ca-b268-3efc3bdef186.jpg?v=1446197581247" data-rel="prettyPhoto[product-gallery]">										
                                 </a>
                              </div>
                              <div class="item">
                                 <a href="https://bizweb.dktcdn.net/thumb/compact/100/022/044/products/ruou34-0f5a93f2-55e3-4bc7-8c25-40b7b2e51927.jpg?v=1446197581250" data-image="https://bizweb.dktcdn.net/100/022/044/products/ruou34-0f5a93f2-55e3-4bc7-8c25-40b7b2e51927.jpg?v=1446197581250" data-zoom-image="https://bizweb.dktcdn.net/100/022/044/products/ruou34-0f5a93f2-55e3-4bc7-8c25-40b7b2e51927.jpg?v=1446197581250" data-rel="prettyPhoto[product-gallery]">										
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div id="gallery_01" class="swiper-container more-views" data-margin="10" data-items="5" data-direction="vertical"> 
                           <div class="swiper-wrapper">
                              @foreach($product->productImages as $image)
                                 <div class="swiper-slide">
                                    <a href="{{ asset('storage/' . $image->image_url )}}" class="thumb-link" title="" rel="{{ asset('storage/' . $image->image_url )}}">
                                    <img src="{{ asset('storage/' . $image->image_url )}}" alt="{{ $product->name }}">
                                    </a>
                                 </div>
                              @endforeach
                           </div>
                        </div>
                        <div class="more-views">
                           <div class="swiper-button-next"></div>
                           <div class="swiper-button-prev"></div>
                        </div>
                        {{-- <div class="owl-carousel owl-theme thumbnail-product hidden" data-md-items="3" data-sm-items="3" data-xs-items="3" data-smxs-items="3" data-margin="20">
                           <div class="item">
                              <a href="javascript:void(0);" data-image="https://bizweb.dktcdn.net/thumb/compact/100/022/044/products/ruou16-c6ec3060-8d74-485c-a972-2d77a6233372.jpg?v=1446197510767" data-zoom-image="//bizweb.dktcdn.net/thumb/1024x1024/100/022/044/products/ruou16-c6ec3060-8d74-485c-a972-2d77a6233372.jpg?v=1446197510767">
                              <img src="images/ruou16-c6ec3060-8d74-485c-a972-2d77a6233372_2.jpg" alt="Rượu Wine  Cheese">
                              </a>
                           </div>
                           <div class="item">
                              <a href="javascript:void(0);" data-image="https://bizweb.dktcdn.net/100/022/044/products/ruou33-17d97223-6bf5-47ca-b268-3efc3bdef186.jpg?v=1446197581247" data-zoom-image="//bizweb.dktcdn.net/thumb/1024x1024/100/022/044/products/ruou33-17d97223-6bf5-47ca-b268-3efc3bdef186.jpg?v=1446197581247">
                              <img src="images/ruou33-17d97223-6bf5-47ca-b268-3efc3bdef186_1.jpg" alt="Rượu Wine  Cheese">
                              </a>
                           </div>
                           <div class="item">
                              <a href="javascript:void(0);" data-image="https://bizweb.dktcdn.net/100/022/044/products/ruou34-0f5a93f2-55e3-4bc7-8c25-40b7b2e51927.jpg?v=1446197581250" data-zoom-image="//bizweb.dktcdn.net/thumb/1024x1024/100/022/044/products/ruou34-0f5a93f2-55e3-4bc7-8c25-40b7b2e51927.jpg?v=1446197581250">
                              <img src="images/ruou34-0f5a93f2-55e3-4bc7-8c25-40b7b2e51927_1.jpg" alt="Rượu Wine  Cheese">
                              </a>
                           </div>
                        </div> --}}
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 details-pro">
                        <h1 class="title-head" itemprop="name">{{ $product->name }}</h1>
                        <div class="price-box" style="margin-top: 20px;">
                           @if($product->discount)
                              <div class="special-price inline-block">
                                 <span class="price product-price">{{ number_format($product->discount->new_price, 0, ',', '.') }}₫</span>
                              </div>
                              <div class="old-price inline-block">															 
                                 <span class="price product-price-old" style="text-decoration: line-through; color: #999;">
                                    {{ number_format($product->price, 0, ',', '.') }}₫
                                 </span>
                              </div>
                           @else
                              <div class="special-price inline-block">
                                 <span class="price product-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                              </div>
                           @endif
                        </div>
                        <div class="product_description margin-bottom-20">
                           <label>Mô tả: </label>
                           <div class="rte description">
                                 {{ $product->description ?? 'NULL' }}
                           </div>
                        </div>
                        <div class="product_description margin-bottom-20">
                           <label>Chất liệu: </label>
                           <div class="rte description">
                              {{ $product->material ?? 'NULL' }}
                           </div>
                        </div>
                        <div class="detail-header-info hidden">
                           Tình trạng: 
                           <span class="inventory_quantity">Hết hàng</span>
                           <span class="line">|</span>
                           Mã SP: 
                           <span class="masp"></span>
                        </div>
                        <div class="form-product">
                           <form enctype="multipart/form-data" id="add-to-cart-form" action="{{ route('cart.add') }}" method="post" class="form-inline">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $product->id }}">
                              @if($product->discount) 
                                 <input type="hidden" name="price" value="{{ $product->discount->new_price }}">
                              @else
                                 <input type="hidden" name="price" value="{{ $product->price }}">
                              @endif
                              <input type="hidden" name="size_id" id="size_id" value="">
                              <div class="form-group form-groupx form-detail-action" style="margin-top: 20px;">
                                 <label>Size: </label>
                                 @foreach($product->productSize as $productSize)
                                    @if($productSize->size)
                                       <div class="btn-group" role="group" aria-label="Size Selection">
                                          <button type="button" class="btn btn-size" data-size="{{ $productSize->size->id }}" style="padding: 8px 15px; margin-right: 10px;">
                                             {{ $productSize->size->name }} 
                                          </button>
                                       </div>
                                    @else
                                       <p>No size available for this product size.</p>
                                    @endif
                                 @endforeach
                              </div>
                              <div class="form-group form-groupx form-detail-action" style="margin-top: 20px;">
                                 <label>Số lượng: </label>
                                 <div class="custom custom-btn-number">
                                    <input type="number" class="input-text qty" data-field="quantity" title="Só lượng" value="1" maxlength="12" id="qty" name="quantity">
                                 </div>
                                 <button type="submit" class="btn btn-lg btn-primary btn-cart btn-cart2 add_to_cart btn_buy add_to_cart" title="Cho vào giỏ hàng">
                                    <span>Mua hàng</span>
                                 </button>				
                              </div>
                           </form>
                        </div>
                        <div class="social-sharing">
                           <div class="addthis_native_toolbox"></div>
                        </div>
                     </div>
                  </div>
               </div>
            
               <div class="col-xs-12">
                  <div class="row margin-top-40 xs-margin-top-15">
                     <div class="col-xs-12 col-md-12 col-lg-12">
                        <!-- Nav tabs -->
                        <div class="product-tab e-tabs not-dqtab">
                           <ul class="tabs tabs-title clearfix">
                              <li class="tab-link" data-tab="tab-1">
                                 <h3><span>Mô tả</span></h3>
                              </li>
                              <li class="tab-link" data-tab="tab-2">
                                 <h3><span>Hướng dẫn mua hàng</span></h3>
                              </li>
                           </ul>
                           <div id="tab-1" class="tab-content">
                              <div class="rte">
                                 <p>Ý nghĩa và mục đích tặng quà chẳng phải bao giờ và ở nơi nào cũng giống nhau. Có những món quà chỉ thuần túy mang ý nghĩa tinh thần. Có những món quà khiến ta vui sướng, có những món quà làm ta ấm lòng... Có những món quà chỉ khiến ta lưu tâm trong chốc lát nhưng cũng có những món quà ta mang theo suốt cả cuộc đời.Drink Shop tự hào là nơi cung cấp những cácà dòng sản phẩm quà tặng tếtà nhưà giỏ quà tết , qùa tết cao cấp , quà tết ý nghĩa , quàà biếu sếp, hộp quà tết ...à chất lượng hàng đầu Việt Nam . Với phương châm "Trao đi yêu thương để nhận lấy yêu thương" . Drink Shopà luôn được khách hàng trên toàn quốc tín nhiệm và yêu mến</p>
                                 <p style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 14px; line-height: normal; text-align: center;"><img alt="" src="{{ asset('storage/banner/about.jpg') }}" style="width: 500px; height: 500px;"></p>
                                 <p>Quà biếu tặng dịp Tết mang nét truyền thống văn hóa cả người Việt bởi nó còn gửi gắm trong đó tình cảm và thành ý của người tặng. Giỏ quà Tết là món quà chứa đựng những thông điệu đơn giản nhưng chân thành. Hiểu được điều đó, chúng tôi đã ra mắt những mẫu giỏ quà Tết sang trọng, độc đáo và ý nghĩa chắc chắn sẽ đem lại sự hài lòng cho quý khách hàng.</p>
                                 <p>Được tính toán theo nhu cầu cũng như giá trị của từng sản phẩm, giỏ quà bao gồm đầy đủ các loại thực phẩm thiết yếu cho ngày Tết: trà, cà phê, mứt, rượu, bánh kẹo…Tất cả các sản phẩm đều được chọn từ các thương hiệu nổi tiếng, uy tín, đảm bảo an toàn vệ sinh thực phẩm mang lại sự yên tâm và hài lòng cho người được nhận.</p>
                                 <p style="color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif; font-size: 14px; line-height: normal; text-align: center;"></p>
                              </div>
                           </div>
                           <div id="tab-2" class="tab-content">
                              Bước 1: Tìm sản phẩm cần mua
                              Bạn có thể truy cập website  để tìm và chọn sản phẩm muốn mua bằng nhiều cách:
                              <br>
                              + Sử dụng ô tìm kiếm phía trên, gõ tên sản phẩm muốn mua (có thể tìm đích danh 1 sản phẩm, tìm theo hãng...). Website sẽ cung cấp cho bạn những gợi ý chính xác để lựa chọn:
                              <br>
                              Bước 2: Đặt mua sản phẩm
                              Sau khi chọn được sản phẩm ưng ý muốn mua, bạn tiến hành đặt hàng bằng cách:
                              <br>
                              + Chọn vào nút MUA NGAY nếu bạn muốn thanh toán luôn toàn bộ giá tiền sản phẩm
                              <br>
                              + Điền đầy đủ các thông tin mua hàng theo các bước trên website, sau đó chọn hình thức nhận hàng là giao hàng tận nơi hay đến siêu thị lấy hàng, chọn hình thức thanh toán là trả khi nhận hàng hay thanh toán online (bằng thẻ ATM, VISA hay MasterCard) và hoàn tất đặt hàng.
                              <br>
                              +Lưu ý:
                              <br>
                              1. Chúng tôi chỉ chấp nhận những đơn đặt hàng khi cung cấp đủ thông tin chính xác về địa chỉ, số điện thoại. Sau khi bạn đặt hàng, chúng tôi sẽ liên lạc lại để kiểm tra thông tin và thỏa thuận thêm những điều có liên quan.
                              <br>
                              2. Một số trường hợp nhạy cảm: giá trị đơn hàng quá lớn &amp; thời gian giao hàng vào buổi tối địa chỉ giao hàng trong ngõ hoặc có thể dẫn đến nguy hiểm. Chúng tôi sẽ chủ động liên lạc với quý khách để thống nhất lại thời gian giao hàng cụ thể.		
                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- <div class="related-product margin-top-10">
                     <div class="section-title a-center">
                        <h2><a href="/frontpage">Sản phẩm cùng loại</a></h2>
                     </div>
                     <div class="products  owl-carousel owl-theme products-view-grid" data-md-items="6" data-sm-items="3" data-xs-items="2" data-margin="30">
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/gio-wine-and-cheese" title="Giỏ Wine and Cheese">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/gio-wine-and-cheese_1.jpg">
                                    <source media="(min-width: 992px)" srcset="images/gio-wine-and-cheese_1.jpg">
                                    <source media="(min-width: 569px)" srcset="images/gio-wine-and-cheese_2.jpg">
                                    <source media="(max-width: 480px)" srcset="images/gio-wine-and-cheese.jpg">
                                    <source media="(max-width: 375px)" srcset="images/gio-wine-and-cheese.jpg">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/gio-wine-and-cheese.jpg?v=1444808783367" alt="Giỏ Wine and Cheese" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-412411" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="667075">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/gio-wine-and-cheese" title="Giỏ Wine and Cheese">Giỏ Wine and Cheese</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">4.000.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/ruou-black-tie-affair" title="Rượu Black Tie Affair">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/ruou-black-tie-affair_2.jpg">
                                    <source media="(min-width: 992px)" srcset="images/ruou-black-tie-affair_2.jpg">
                                    <source media="(min-width: 569px)" srcset="images/ruou-black-tie-affair_1.jpg">
                                    <source media="(max-width: 480px)" srcset="images/ruou-black-tie-affair.jpg">
                                    <source media="(max-width: 375px)" srcset="images/ruou-black-tie-affair.jpg">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/ruou-black-tie-affair.jpg?v=1444808783813" alt="Rượu Black Tie Affair" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-412413" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="667077">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/ruou-black-tie-affair" title="Rượu Black Tie Affair">Rượu Black Tie Affair</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">1.400.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/gio-italian-wine-tasting" title="Giỏ Italian Wine Tasting">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/53401551104439gio_17_1%5B1%5D_2.jpg">
                                    <source media="(min-width: 992px)" srcset="images/53401551104439gio_17_1%5B1%5D_2.jpg">
                                    <source media="(min-width: 569px)" srcset="images/53401551104439gio_17_1%5B1%5D_1.jpg">
                                    <source media="(max-width: 480px)" srcset="images/53401551104439gio_17_1%5B1%5D.jpg">
                                    <source media="(max-width: 375px)" srcset="images/53401551104439gio_17_1%5B1%5D.jpg">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/53401551104439gio_17_1[1].jpg?v=1444808782660" alt="Giỏ Italian Wine Tasting" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-412420" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="667076">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/gio-italian-wine-tasting" title="Giỏ Italian Wine Tasting">Giỏ Italian Wine Tasting</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">1.000.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/ruou-bubbles-and-truffles-gift-box" title="Rượu Bubbles And Truffles">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/1719608marianavineyard13chardonnay_600x800_2334870%5B1%5D_2.jpg">
                                    <source media="(min-width: 992px)" srcset="images/1719608marianavineyard13chardonnay_600x800_2334870%5B1%5D_2.jpg">
                                    <source media="(min-width: 569px)" srcset="images/1719608marianavineyard13chardonnay_600x800_2334870%5B1%5D_1.jpg">
                                    <source media="(max-width: 480px)" srcset="images/1719608marianavineyard13chardonnay_600x800_2334870%5B1%5D.jpg">
                                    <source media="(max-width: 375px)" srcset="images/1719608marianavineyard13chardonnay_600x800_2334870%5B1%5D.jpg">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/1719608marianavineyard13chardonnay_600x800_2334870[1].jpg?v=1444808783437" alt="Rượu Bubbles And Truffles" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-412417" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="667078">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/ruou-bubbles-and-truffles-gift-box" title="Rượu Bubbles And Truffles">Rượu Bubbles And Truffles</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">500.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/ruou-johnnie-walker-black-label-1000ml" title="Rượu Johnnie Walker">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/60-6cf50d41-2718-4270-ab20-da96c7f01325.jpg">
                                    <source media="(min-width: 992px)" srcset="images/60-6cf50d41-2718-4270-ab20-da96c7f01325.jpg">
                                    <source media="(min-width: 569px)" srcset="images/60-6cf50d41-2718-4270-ab20-da96c7f01325_2.jpg">
                                    <source media="(max-width: 480px)" srcset="images/60-6cf50d41-2718-4270-ab20-da96c7f01325_1.jpg">
                                    <source media="(max-width: 375px)" srcset="images/60-6cf50d41-2718-4270-ab20-da96c7f01325_1.jpg">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/60-6cf50d41-2718-4270-ab20-da96c7f01325.jpg?v=1445851426303" alt="Rượu Johnnie Walker" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-507820" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="811022">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/ruou-johnnie-walker-black-label-1000ml" title="Rượu Johnnie Walker">Rượu Johnnie Walker</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">870.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/ruou-hennessy-x-o-3-liter" title="Rượu Hennessy X.O 3 liter">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/xo3_2.jpg">
                                    <source media="(min-width: 992px)" srcset="images/xo3_2.jpg">
                                    <source media="(min-width: 569px)" srcset="images/xo3.jpg">
                                    <source media="(max-width: 480px)" srcset="images/xo3_1.jpg">
                                    <source media="(max-width: 375px)" srcset="images/xo3_1.jpg">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/xo3.jpg?v=1445851304120" alt="Rượu Hennessy X.O 3 liter" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-507777" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="810972">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/ruou-hennessy-x-o-3-liter" title="Rượu Hennessy X.O 3 liter">Rượu Hennessy X.O 3 liter</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">1.200.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/ruou-luxury-altair-red" title="Rượu Luxury Altair Red">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/3_2.png">
                                    <source media="(min-width: 992px)" srcset="images/3_2.png">
                                    <source media="(min-width: 569px)" srcset="images/3_1.png">
                                    <source media="(max-width: 480px)" srcset="images/3.png">
                                    <source media="(max-width: 375px)" srcset="images/3.png">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/3.png?v=1445851165587" alt="Rượu Luxury Altair Red" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-507754" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="810943">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/ruou-luxury-altair-red" title="Rượu Luxury Altair Red">Rượu Luxury Altair Red</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">2.338.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <div class="sale-flash"> 
                                 16% 
                              </div>
                              <a href="/ruou-johnnie-walker-blue-label" title="Rượu Johnnie Walker Blue">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/31_2.png">
                                    <source media="(min-width: 992px)" srcset="images/31_2.png">
                                    <source media="(min-width: 569px)" srcset="images/31_1.png">
                                    <source media="(max-width: 480px)" srcset="images/31.png">
                                    <source media="(max-width: 375px)" srcset="images/31.png">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/31.png?v=1445850758393" alt="Rượu Johnnie Walker Blue" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-507723" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="810814">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/ruou-johnnie-walker-blue-label" title="Rượu Johnnie Walker Blue">Rượu Johnnie Walker Blue</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">729.000₫</span>
                                 </div>
                                 <div class="old-price inline-block">															 
                                    <span class="price product-price-old">
                                    870.000₫			
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="product-box a-center">
                           <div class="product-thumbnail">
                              <a href="/ruou-california-muscat" title="Rượu California Muscat">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="images/19_2.png">
                                    <source media="(min-width: 992px)" srcset="images/19_2.png">
                                    <source media="(min-width: 569px)" srcset="images/19.png">
                                    <source media="(max-width: 480px)" srcset="images/19_1.png">
                                    <source media="(max-width: 375px)" srcset="images/19_1.png">
                                    <img width="240" height="240" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/022/044/products/19.png?v=1445850433743" alt="Rượu California Muscat" class="lazyload img-responsive center-block">
                                 </picture>
                              </a>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-507682" enctype="multipart/form-data">
                                    <div>
                                       <input type="hidden" name="variantId" value="810755">
                                       <button class="btn-buy btn-cart btn btn-primary left-to add_to_cart " title="Cho vào giỏ hàng">
                                          <span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             Mua hàng
                                          </span>
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="product-info">
                              <h3 class="product-name"><a href="/ruou-california-muscat" title="Rượu California Muscat">Rượu California Muscat</a></h3>
                              <div class="price-box clearfix">
                                 <div class="special-price inline-block">
                                    <span class="price product-price">2.000.000₫</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> --}}
               </div>
            </div>
         </div>
      </section>
     <script src="{{ asset('js/jquery.responsivetabs.min.js') }}" type="text/javascript"></script>
     <script>  
        var selectCallback = function(variant, selector) {
            if (variant) {
        
                var form = jQuery('#' + selector.domIdPrefix).closest('form');
        
                for (var i=0,length=variant.options.length; i<length; i++) {
        
                    var radioButton = form.find('.swatch[data-option-index="' + i + '"] :radio[value="' + variant.options[i] +'"]');
        
                    if (radioButton.size()) {
                        radioButton.get(0).checked = true;
                    }
                }
            }
            var addToCart = jQuery('.form-product .btn-cart'),
                masp = jQuery('.masp'),
                form = jQuery('.form-product .form-groupx'),
                productPrice = jQuery('.details-pro .special-price .product-price'),
                qty = jQuery('.details-pro .inventory_quantity'),
                comparePrice = jQuery('.details-pro .old-price .product-price-old');
        
        
            if (variant && variant.available) {
                if(variant.inventory_management == "bizweb"){
                    qty.html('<span>Chỉ còn ' + variant.inventory_quantity +' sản phẩm</span>');
                }else{
                    qty.html('<span>Còn hàng</span>');
                }
                addToCart.text('Thêm vào giỏ hàng').removeAttr('disabled');									
                if(variant.price == 0){
                    productPrice.html('Liên hệ');	
                    comparePrice.hide();
                    form.addClass('hidden');
                }else{
                    form.removeClass('hidden');
                    productPrice.html(Bizweb.formatMoney(variant.price, "₫"));
                                                         // Also update and show the product's compare price if necessary
                                                         if ( variant.compare_at_price > variant.price ) {
                                      comparePrice.html(Bizweb.formatMoney(variant.compare_at_price, "₫")).show();
                                      } else {
                                      comparePrice.hide();   
                }       										
            }
        
        } else {	
            qty.html('<span>Hết hàng</span>');
            addToCart.text('Hết hàng').attr('disabled', 'disabled');
            if(variant){
                if(variant.price != 0){
                    form.removeClass('hidden');
                    productPrice.html(Bizweb.formatMoney(variant.price, "₫"));
                                                         // Also update and show the product's compare price if necessary
                                                         if ( variant.compare_at_price > variant.price ) {
                                      comparePrice.html(Bizweb.formatMoney(variant.compare_at_price, "₫")).show();
                                      } else {
                                      comparePrice.hide();   
                }     
            }else{
                productPrice.html('Liên hệ');	
                comparePrice.hide();
                form.addClass('hidden');									
            }
        }else{
            productPrice.html('Liên hệ');	
            comparePrice.hide();
            form.addClass('hidden');	
        }
        
        }
        /*begin variant image*/
        if (variant && variant.image) {  
            var originalImage = jQuery(".large-image img"); 
            var newImage = variant.image;
            var element = originalImage[0];
            Bizweb.Image.switchImage(newImage, element, function (newImageSizedSrc, newImage, element) {
                jQuery(element).parents('a').attr('href', newImageSizedSrc);
                jQuery(element).attr('src', newImageSizedSrc);
            });
        }
        
        /*end of variant image*/
        };
        jQuery(function($) {
            $('.selector-wrapper').hide();
             
            $('.selector-wrapper').css({
                'text-align':'left',
                'margin-bottom':'15px'
            });
        });
        
        jQuery('.swatch :radio').change(function() {
            var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
            var optionValue = jQuery(this).val();
            jQuery(this)
                .closest('form')
                .find('.single-option-selector')
                .eq(optionIndex)
                .val(optionValue)
                .trigger('change');
        });
        
        
        
        $(window).on("load resize",function(e){
        
            if($(window).width() > 1199){
                var he = $('.large-image.featured-image').height() - 100;
        
                $('#gallery_01').height(he);
                if(he < 400){
                    var items = 2;
                }else{
                    var items = 5;
                }
                $("#gallery_01.swiper-container").each( function(){
                    var config = {
                        spaceBetween: 0,
                        slidesPerView: items,
                        direction: $(this).data('direction'),
                        paginationClickable: true,
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        grabCursor: true ,
                        calculateHeight:true,
                        height:he
                    };		
                    var swiper = new Swiper(this, config);
        
                });
        
                $('.more-views .swiper-slide img').each(function(e){
                    var t1 = (this.naturalHeight/this.naturalWidth);
        
                    if(t1<1){
                        $(this).parents('.swiper-slide').addClass('bethua');
                    }
                })
            }else{
                $("#gallery_01.swiper-container").each( function(){
                    var config = {
                        spaceBetween: 15,
                        slidesPerView: 4,
                        direction: 'horizontal',
                        paginationClickable: true,
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        grabCursor: true ,
                        calculateHeight:true,
                        height:he
                    };		
                    var swiper = new Swiper(this, config);
        
                });
            }
            $('.thumb-link').click(function(e){
                e.preventDefault();
                var hr = $(this).attr('href');
                $('#zoom_01').attr('src',hr);
            })
        });

         document.addEventListener("DOMContentLoaded", function() {
            const sizeButtons = document.querySelectorAll('.btn-size');
            const sizeInput = document.getElementById('size_id');
            
            sizeButtons.forEach(button => {
               button.addEventListener('click', function() {
                     sizeButtons.forEach(b => b.classList.remove('selected'));
                     this.classList.add('selected');
                     
                     const selectedSize = this.getAttribute('data-size');
                     
                     if (sizeInput) {
                        sizeInput.value = selectedSize;
                     } else {
                        console.error('Không tìm thấy phần tử #size_id');
                     }
               });
            });

            const form = document.getElementById('add-to-cart-form');
            if (form) {
               form.addEventListener('submit', function(event) {
                     if (!sizeInput || !sizeInput.value) {
                        event.preventDefault();
                        alert("Vui lòng chọn kích thước!");
                     }
               });
            }
         });


     </script>

    @include('page/list_brands');
</div>
@endsection