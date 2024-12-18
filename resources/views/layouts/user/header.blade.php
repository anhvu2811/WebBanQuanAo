@extends('layouts/user/resources')
<header class="header">
    <div class="topbar">
       <div class="container">
          <div class="row">
             <div class="col-sm-6 col-md-7 a-left">
                <span class="header-contact-item"><i class="fa fa-map-marker"></i> 
                {{ $setting->location ?? 'NULL' }}
                </span>
                <span class="header-contact-item hidden-sm"><i class="fa fa-mobile"></i>
                <a href="tel:19006750" style="color: #fff;">{{ $setting->hotline ?? 'NULL' }}</a>
                </span>
                <span class="header-contact-item hidden-sm hidden-xs hidden-md"><i class="fa fa-clock"></i>
                  {{ $setting->time_active ?? 'NULL'}}
                </span>
             </div>
             <div class="col-sm-6 col-md-5 col-xs-12">
                <ul class="list-inline f-right">
                   {{-- <li><i class="fa fa-unlock-alt"></i> <a href="/account/register">Đăng ký</a></li> --}}
                   @if(session('user'))
                     <li><i class="fa fa-user"></i> {{ session('user')->name }}</li>
                     <li>
                        <form action="{{ route('logout')}}" method="post">
                           @csrf
                           <button type="submit">Đăng xuất</button>
                        </form>
                     </li>
                   @else
                     <li><i class="fa fa-user"></i> <a href="/account/login">Đăng nhập</a></li>
                   @endif
                   <li class="search">
                      <a href="javascript:;"><i class="fa fa-search"></i></a>
                      <div class="header_search search_form">
                         <form class="input-group search-bar search_form" action="/search" method="get" role="search">		
                            <input type="search" name="query" value="" placeholder="Tìm kiếm sản phẩm... " class="input-group-field st-default-search-input search-text" autocomplete="off">
                            <span class="input-group-btn">
                            <button class="btn icon-fallback-text">
                            <i class="fa fa-search"></i>
                            </button>
                            </span>
                         </form>
                      </div>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </div>
    <nav>
       <ul id="nav" class="nav container">
          <li class="menu-bar hidden-md hidden-lg">
             <img src="{{ asset('images/menu-bar.png') }}" alt="menu bar">
          </li>
          <li class="nav-item hidden-sm hidden-xs active"><a class="nav-link" href="/">Trang chủ</a></li>
          <li class="nav-item hidden-sm hidden-xs "><a class="nav-link" href="/about">Giới thiệu</a></li>
          <li class="nav-item logo inline-block">
             <a href="/" class="logo-wrapper ">					
             <img src="{{ asset('images/logo.png') }}" alt="logo ">					
             </a>
          </li>
          <li class="nav-item hidden-sm hidden-xs ">
             <a href="/collections/all" class="nav-link">Sản phẩm</a>
          </li>
          <li class="nav-item hidden-sm hidden-xs "><a class="nav-link" href="/news">Tin tức</a></li>
          <li class="top-cart-contain f-right">
             <div class="mini-cart text-xs-center">
                <div class="heading-cart">
                   <a class="cart-icon" href="/cart">
                     <i class="fa fa-shopping-bag"></i>
                     @if(session('cart') && count(session('cart')) > 0)
                        <span class="cartCount count_item_pr" id="cart-total">{{ count(session('cart')) }}</span>
                     @endif
                   </a>
                </div>
                <div class="top-cart-content">
                   <ul id="cart-sidebar" class="mini-products-list count_li">
                      <li class="list-item">
                         <ul></ul>
                      </li>
                      <li class="action">
                         <ul>
                            <li class="li-fix-1">
                               <div class="top-subtotal">
                                  Tổng tiền thanh toán: 
                                  @if(session('cart'))
                                    @php
                                       $total = 0;
                                    @endphp
                                    @foreach(session('cart') as $cart)
                                       @php
                                          $itemTotal = $cart['quantity'] * $cart['price'];
                                          $total += $itemTotal;
                                       @endphp
                                    @endforeach
                                    <span class="price">{{ number_format($total , 0, ',', '.') }}₫</span>
                                  @endif
                               </div>
                            </li>
                            <li class="li-fix-2" style="">
                               <div class="actions">
                                  <a href="{{ route('cart.index') }}" class="btn btn-primary">
                                  <span>Giỏ hàng</span>
                                  </a>
                                  <a href="{{ route('cart.checkout') }}" class="btn btn-checkout btn-gray">
                                  <span>Thanh toán</span>
                                  </a>
                               </div>
                            </li>
                         </ul>
                      </li>
                   </ul>
                </div>
             </div>
          </li>
       </ul>
    </nav>
    <nav>
       <ul id="nav-mobile" class="nav hidden-md hidden-lg container">
          <li class="nav-item active"><a class="nav-link" href="/">Trang chủ</a></li>
          <li class="nav-item "><a class="nav-link" href="/about">Giới thiệu</a></li>
          <li class="nav-item ">
             <a href="/collections/all" class="nav-link">Sản phẩm</a>
          </li>
          <li class="nav-item "><a class="nav-link" href="/news">Tin tức</a></li>
       </ul>
    </nav>
 </header>