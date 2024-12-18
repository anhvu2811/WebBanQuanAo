<div class="section-brand">
    <div class="container">
       <div class="rowBrand swiper_brand swiper-container">
          <div class="swiper-wrapper">
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand1.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand2.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand3.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand4.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand5.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand6.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand7.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand8.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand9.jpg') }}" alt="Winehourse">
                </a>
             </div>
             <div class="brand-item swiper-slide">
                <a href="#"><img width="161" height="119" src="{{ asset('storage/brand/brand10.jpg') }}" alt="Winehourse">
                </a>
             </div>
          </div>
       </div>
    </div>
</div>
<script>
    var swiper = new Swiper('.swiper_brand', {
        slidesPerView: 7,
        spaceBetween: 10,
        slidesPerGroup: 1,
        loop: false,
        breakpoints: {
            300: {
                slidesPerView: 2,
                spaceBetween: 10,
                slidesPerGroup: 1,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
                slidesPerGroup: 1,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10
            },
            1024: {
                slidesPerView: 7,
                spaceBetween: 10
            },
            1200: {
                slidesPerView: 7,
                spaceBetween: 10
            }
        }
    });
</script>