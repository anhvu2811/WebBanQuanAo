window.awe = window.awe || {};
awe.init = function () {
	awe.showPopup();
	awe.hidePopup();	
};
function convertToSlug(text) {
	return text.toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
}  window.convertToSlug=convertToSlug;

function convertVietnamese(str) { 
	str= str.toLowerCase();
	str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
	str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
	str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
	str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
	str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
	str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
	str= str.replace(/đ/g,"d"); 
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	str= str.replace(/-+-/g,"-");
	str= str.replace(/^\-+|\-+$/g,""); 

	return str; 
} window.convertVietnamese=convertVietnamese;

function resizeimage() { 

} window.resizeimage=resizeimage;

/********************************************************
# Sidebar category
********************************************************/
// $('.nav-category .fa-angle-down').click(function(e){
// 	$(this).parent().toggleClass('active');
// });
/********************************************************
# Offcanvas menu
********************************************************/

jQuery(document).ready(function ($) {
	$('#nav-mobile .fa').click(function(e){		
		e.preventDefault();
		$(this).parent().parent().toggleClass('open');
		$(this).toggleClass('fa-angle-down fa-angle-up');
	});
	$('.menu-bar').click(function(e){
		e.preventDefault();
		$('#nav-mobile').toggleClass('open');
	});
});
/********************************************************
# Footer
********************************************************/
$('.site-footer h3').click(function() {
	$(this).parent().find('.list-menu').toggleClass('active'); 	
	$(this).toggleClass('active'); 	
}); 
$('.aside.aside-mini-products-list .aside-title h3').click(function() {
	$(this).parents('.aside-mini-products-list').find('#collection-filters-container').toggleClass('active'); 	
}); 

/**/
/********************************************************
# toggle-menu
********************************************************/

$('.toggle-menu .caret').click(function() {
	$(this).closest('li').find('> .sub-menu').slideToggle("fast");
	$(this).closest('li').toggleClass("open");
	return false;              
}); 
$('.off-canvas-toggle').click(function(){
	$('body').toggleClass('show-off-canvas');
	$('.off-canvas-menu').toggleClass('open');
})
$('body').click(function(event) {
	if (!$(event.target).closest('.off-canvas-menu').length) {
		$('body').removeClass('show-off-canvas');
	};
});

/********************************************************
# accordion
********************************************************/
$('.accordion .nav-link').click(function(e){
	e.preventDefault;

	$(this).parent().toggleClass('active');
})
/********************************************************
# Dropdown
********************************************************/
$('.dropdown-toggle').click(function() {
	$(this).parent().toggleClass('open'); 	
}); 
$('#dropdownMenu1').click(function() {
	var ofh= $(this).parent().find('.dropdown-menu').width();

	var mm = $('.menu-mobile'). offset().left;

	$('.site-header-inner button.btn-close').css('left',ofh - mm +'px');
}); 
$('.btn-close').click(function() {
	$(this).parents('.dropdown').toggleClass('open');
}); 
$('body').click(function(event) {
	if (!$(event.target).closest('.dropdown').length) {
		$('.dropdown').removeClass('open');
	};
});

$('body').click(function(event) {
	if (!$(event.target).closest('.collection-selector').length) {
		$('.list_search').css('display','none');
	};
});

/********************************************************
# Tab
********************************************************/
$(".e-tabs").each( function(){
	$(this).find('.tabs-title li:first-child').addClass('current');
	$(this).find('.tab-content').first().addClass('current');

	$(this).find('.tabs-title li').click(function(){
		var tab_id = $(this).attr('data-tab');

		var url = $(this).attr('data-url');
		$(this).closest('.e-tabs').find('.tab-viewall').attr('href',url);

		$(this).closest('.e-tabs').find('.tabs-title li').removeClass('current');
		$(this).closest('.e-tabs').find('.tab-content').removeClass('current');

		$(this).addClass('current');
		$(this).closest('.e-tabs').find("#"+tab_id).addClass('current');
	});    
});

/********************************************************
# SHOW NOITICE
********************************************************/
awe.showNoitice = function (selector) {   
	$(selector).animate({right: '0'}, 500);
	setTimeout(function() {
		$(selector).animate({right: '-300px'}, 500);
	}, 3500);
};

/********************************************************
# SHOW LOADING
********************************************************/
awe.showLoading = function (selector) {    
	var loading = $('.loader').html();
	$(selector).addClass("loading").append(loading);  
}

/********************************************************
# HIDE LOADING
********************************************************/
awe.hideLoading = function (selector) {  
	$(selector).removeClass("loading"); 
	$(selector + ' .loading-icon').remove();
}


/********************************************************
# SHOW POPUP
********************************************************/
awe.showPopup = function (selector) {
	$(selector).addClass('active');
};

/********************************************************
# HIDE POPUP
********************************************************/
awe.hidePopup = function (selector) {
	$(selector).removeClass('active');
}


/************************************************/
$(document).on('click','.overlay, .close-popup, .btn-continue, .fancybox-close', function() {   
	awe.hidePopup('.awe-popup'); 
	setTimeout(function(){
		$('.loading').removeClass('loaded-content');
	},500);
	return false;
})

$(document).on('keydown','#qty, #quantity-detail, .number-sidebar',function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
$(document).on('click','.qtyplus',function(e){
	e.preventDefault();   
	fieldName = $(this).attr('data-field'); 
	var currentVal = parseInt($('input[data-field='+fieldName+']').val());
	if (!isNaN(currentVal)) { 
		$('input[data-field='+fieldName+']').val(currentVal + 1);
	} else {
		$('input[data-field='+fieldName+']').val(0);
	}
});

$(document).on('click','.qtyminus',function(e){
	e.preventDefault(); 
	fieldName = $(this).attr('data-field');
	var currentVal = parseInt($('input[data-field='+fieldName+']').val());
	if (!isNaN(currentVal) && currentVal > 1) {          
		$('input[data-field='+fieldName+']').val(currentVal - 1);
	} else {
		$('input[data-field='+fieldName+']').val(1);
	}
});


jQuery(document).ready(function ($) {

	function getMobileOperatingSystem() {
		var userAgent = navigator.userAgent || navigator.vendor || window.opera;

		// Windows Phone must come first because its UA also contains "Android"
		if (/windows phone/i.test(userAgent)) {

		}

		if (/android/i.test(userAgent)) {

		}

		// iOS detection from: http://stackoverflow.com/a/9039885/177710
		if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
			$('body').addClass('ios');
		}

		return "unknown";
	}
	getMobileOperatingSystem();

	$('.owl-carousel:not(.not-dqowl)').each( function(){
		var xs_item = $(this).attr('data-xs-items');
		var md_item = $(this).attr('data-md-items');
		var sm_item = $(this).attr('data-sm-items');	
		var margin=$(this).attr('data-margin');
		var dot=$(this).attr('data-dot');
		if (typeof margin !== typeof undefined && margin !== false) {    
		} else{
			margin = 30;
		}
		if (typeof xs_item !== typeof undefined && xs_item !== false) {    
		} else{
			xs_item = 1;
		}
		if (typeof sm_item !== typeof undefined && sm_item !== false) {    

		} else{
			sm_item = 3;
		}	

		if (typeof md_item !== typeof undefined && md_item !== false) {    
		} else{
			md_item = 3;
		}
		if (typeof dot !== typeof undefined && dot !== true) {   
			dot= true;
		} else{
			dot = false;
		}

		$(this).owlCarousel({
			loop:false,
			margin:Number(margin),
			responsiveClass:true,
			dots:dot,

			responsive:{
				0:{
					items:Number(xs_item),
					autoHeight: true,
					nav:true
				},
				600:{
					items:Number(sm_item),
					autoHeight: true,
					nav:false
				},
				1000:{
					items:Number(md_item),
					nav:true,

					loop:false
				}
			}
		})
	})

	/* Back to top */
	if ($('.back-to-top').length) {
		var scrollTrigger = 100, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('.back-to-top').addClass('show');
				} else {
					$('.back-to-top').removeClass('show');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('.back-to-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
});

document.addEventListener("DOMContentLoaded", function() {
	var elements = document.getElementsByTagName("INPUT");
	for (var i = 0; i < elements.length; i++) {
		elements[i].oninvalid = function(e) {						
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				console.log(e.srcElement);
				if(e.srcElement.type=="email"){
					e.target.setCustomValidity("Email không đúng định dạng");
				}else{
					e.target.setCustomValidity("Không được bỏ trống");
				}


			}
		};
		elements[i].oninput = function(e) {
			e.target.setCustomValidity("");
		};
	}
})
document.addEventListener("DOMContentLoaded", function() {
	var elements = document.getElementsByTagName("textarea");
	for (var i = 0; i < elements.length; i++) {
		elements[i].oninvalid = function(e) {						
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				console.log(e.srcElement);
				if(e.srcElement.type=="email"){
					e.target.setCustomValidity("Email không đúng định dạng");
				}else{
					e.target.setCustomValidity("Không được bỏ trống");
				}


			}
		};
		elements[i].oninput = function(e) {
			e.target.setCustomValidity("");
		};
	}
})

$('html').on('touchstart', function(e) {
	$('#sort-by ul ul').removeClass('active');
})
$(".navbar-flyout").on('touchstart',function(e) {
	e.stopPropagation();
});

$('#sort-by>ul>li').click(function(e){
	$('#sort-by ul ul').toggleClass('active');
})