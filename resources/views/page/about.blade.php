@extends('layouts/user/layoutmaster')
@section('content')
<head>
   <title> {{ $setting->site_name ?? 'NULL' }} - Giới Thiệu	</title>
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
                    <li><strong><span>Giới thiệu</span></strong></li>
                 </ul>
              </div>
           </div>
        </div>
     </section>
    <section class="page">
        <div class="container">
           <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="page-title category-title">
                    <h1 class="title-head page-title"><a href="#">Giới thiệu</a></h1>
                 </div>
                 <div class="content-page rte">
                     <p>Wine House không chỉ là nơi bạn tìm thấy những chai rượu tuyệt vời mà còn là địa chỉ lý tưởng dành cho những tín đồ yêu thích thời trang. Với mục tiêu mang đến sự kết hợp hoàn hảo giữa phong cách và chất lượng, Wine House chuyên cung cấp các sản phẩm thời trang cao cấp, từ trang phục công sở thanh lịch đến các bộ trang phục dạo phố cá tính. Chúng tôi luôn hiểu rằng mỗi bộ quần áo không chỉ là một món đồ mặc, mà là một phần thể hiện cá tính và phong cách sống của mỗi người.</p>
                     <p style="text-align: center;"><img src="{{ asset('storage/banner/about.jpg') }}" style="width: 1200px; height: 1000px;"></p>
                     <h4>Định Hình Phong Cách - Tạo Dựng Cá Tính</h4>
                     <p>Chúng tôi tin rằng thời trang là một nghệ thuật, nơi bạn có thể tự do thể hiện bản thân qua từng bộ trang phục. Wine House mang đến những thiết kế thời trang đa dạng, từ những mẫu quần áo mang phong cách trẻ trung, năng động cho đến những bộ đồ thanh lịch, sang trọng phù hợp với mọi dịp. Chúng tôi luôn cập nhật các xu hướng mới nhất từ các sàn diễn thời trang thế giới, nhằm đem đến cho khách hàng những lựa chọn tuyệt vời nhất.</p>
                     <h4>Chất Lượng Vượt Trội - Màu Sắc và Phong Cách Đầy Đủ</h4>
                     <p>Tại Wine House, mỗi sản phẩm thời trang đều được lựa chọn kỹ lưỡng từ chất liệu đến thiết kế, nhằm mang lại sự thoải mái và tinh tế cho người mặc. Chúng tôi cam kết cung cấp các bộ trang phục không chỉ đẹp mắt mà còn bền bỉ và dễ dàng kết hợp với nhiều phụ kiện khác. Mỗi sản phẩm của chúng tôi đều phản ánh sự tỉ mỉ trong từng chi tiết, đảm bảo mang lại sự hài lòng cho khách hàng.
                     </p>
                     <h4>Mua Sắm Online Dễ Dàng - Dịch Vụ Chăm Sóc Khách Hàng Tận Tâm</h4>
                     <p>Khi mua hàng tại siêu thị rượu ngoại online của chúng tôi, quý khách sẽ được khám phá một thế giới phong phú về rượu, từ các loại rượu ngoại như: rượu mạnh Châu Âu, rượu vang, …đến các loại rượu trong nước. Chúng tôi cung cấp những chai rượu được nhập chính ngạch và từ chính hãng, mỗi chai rượu được chúng tôi cung cấp phải luôn có xuất xứ rõ ràng, đảm bảo chất lượng và luôn được bảo quản tốt để có thể đáp ứng về nhu cầu của quý khách một cách tốt nhất.</p>
                     <h4>Phong Cách Đậm Chất Cá Nhân – Sự Lựa Chọn Hoàn Hảo Cho Mọi Dịp</h4>
                     <p>Dù bạn đang tìm kiếm một bộ đồ đi làm, đi chơi hay một bộ trang phục cho những dịp đặc biệt, Wine House đều có những sản phẩm phù hợp. Với sự đa dạng trong phong cách và thiết kế, chúng tôi cam kết đáp ứng mọi nhu cầu và sở thích của khách hàng. <br>
                     Hãy đến với Wine House để khám phá thế giới thời trang đầy sáng tạo và phong cách!</p>
                 </div>
              </div>
           </div>
        </div>
     </section>
     @include('page/list_brands');
</div>
@endsection