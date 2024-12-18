@extends('layouts/user/resources')
<footer class="footer">
    <div class="footer-top">
       <div class="container">
          <div class="row">
             <div class="col-md-8 col-sm-6 col-xs-12">
                <h5>GỬI EMAIL</h5>
                <form action="//dkt.us13.list-manage.com/subscribe/post?u=0bafe4be7e17843051883e746&amp;id=3bdd6e9e3b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                   <button class="btn btn-primary subscribe" name="subscribe" id="subscribe">Gửi ngay</button>
                   <input type="email" value="" placeholder="Email của bạn" name="EMAIL" id="mail" aria-label="general.newsletter_form.newsletter_email">
                </form>
             </div>
             <div class=" col-md-4 col-sm-6 col-xs-12 ">
                <h5 class="hidden-xs hidden-md hidden-sm">THEO DÕI CHÚNG TÔI</h5>
                <ul class="inline-list social-icons">
                   <li>
                      <a class="icon-fallback-text" href="#">
                      <span class="fa fa-twitter" aria-hidden="true"></span>
                      <span class="fallback-text">Twitter</span>
                      </a>
                   </li>
                   <li>
                      <a class="icon-fallback-text" href="#">
                      <span class="fa fa-facebook" aria-hidden="true"></span>
                      <span class="fallback-text">Facebook</span>
                      </a>
                   </li>
                   <li>
                      <a class="icon-fallback-text" href="#">
                      <span class="fa fa-pinterest" aria-hidden="true"></span>
                      <span class="fallback-text">Pinterest</span>
                      </a>
                   </li>
                   <li>
                      <a class="icon-fallback-text" href="#" rel="publisher">
                      <span class="fa fa-google-plus" aria-hidden="true"></span>
                      <span class="fallback-text">Google</span>
                      </a>
                   </li>
                   <li>
                      <a class="icon-fallback-text" href="#">
                      <span class="fa fa-instagram" aria-hidden="true"></span>
                      <span class="fallback-text">Instagram</span>
                      </a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </div>
    <div class="site-footer">
       <div class="container">
          <div class="footer-inner padding-top-25 padding-bottom-25">
             <div class="row">
                <div class="col-xs-12 col-sm-4 col-lg-2">
                   <div class="footer-widget">
                      <h4><span>Thông tin</span></h4>
                      <ul class="list-menu">
                         <li><a href="/"><i class="fa fa-caret-right"></i> Trang chủ</a></li>
                         <li><a href="/gioi-thieu"><i class="fa fa-caret-right"></i> Giới thiệu</a></li>
                         <li><a href="/collections/all"><i class="fa fa-caret-right"></i> Sản phẩm</a></li>
                         <li><a href="/tin-tuc"><i class="fa fa-caret-right"></i> Tin tức</a></li>
                      </ul>
                   </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-6">
                   <div class="footer-widget">
                      <h4><span>Các bài viết đã đăng</span></h4>
                      <ul class="list-menu list-blogs">
                         <li><a href="/whiskey-la-vang-ngoc-va-luc-bao">Whiskey là vàng ngọc và lục bảo</a></li>
                         <li><a href="/10-bi-quye-t-giu-p-uo-ng-ruo-u-to-t-hon-va-ba-o-ve-su-c-kho-e-khi-uo-ng-ruo-u">10 bí quyết giúp uống rượu để bảo vệ sức khỏe</a></li>
                         <li><a href="/vong-doi-cua-ruou-vang">Vòng đời của sản phẩm rượu vang</a></li>
                         <li><a href="/21-cong-dung-bat-ngo-cua-vodka">21 công dụng bất ngờ của Vodka</a></li>
                      </ul>
                   </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4">
                   <div class="footer-widget">
                      <h4><span>Liên hệ</span></h4>
                      <ul class="list-menu list-showroom">
                         <li class="clearfix">
                            <i class="block_icon fa fa-map-marker"></i> 
                            <p>
                              {{ $setting->location ?? 'NULL' }} 
                            </p>
                         </li>
                         <li class="clearfix"><i class="block_icon fa fa-envelope"></i>
                            <a href="mailto:support@sapo.vn">{{ $setting->email ?? 'NULL' }}</a>
                         </li>
                         <li class="clearfix"><i class="block_icon fa fa-phone"></i>
                            <a href="tel:18006750">{{ $setting->hotline ?? 'NULL' }}</a>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="copyright clearfix">
       <div class="container">
          <div class="inner clearfix">
             <div class="row">
                <div class="col-sm-8 a-left">
                   <span>© Bản quyền thuộc về <b>Awesome Team</b> <span class="fix-xs-footer">|</span> Cung cấp bởi 
                   <a href="https://www.sapo.vn/?utm_campaign=cpn:kho_theme-plm:footer&amp;utm_source=Tu_nhien&amp;utm_medium=referral&amp;utm_content=fm:text_link-km:-sz:&amp;utm_term=&amp;campaign=kho_theme-sapo" rel="nofollow" title="Sapo" target="_blank">Sapo</a>
                   </span>
                </div>
                <div class="col-sm-4 a-left hidden-xs">
                   <img src="{{ asset('images/payment.png') }}" alt="payment">
                </div>
             </div>
          </div>
          <div class="back-to-top"><i class="fa  fa-arrow-circle-up"></i></div>
       </div>
    </div>
 </footer>