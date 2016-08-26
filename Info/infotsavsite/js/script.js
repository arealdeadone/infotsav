var fl=true;
var MSIE = false;

$(window).load(function() {
 $('nav>ul>li>ul,nav>ul>li>ul>li>ul, nav>ul').sprites({
			method:'vStretch'
		})
        
    
    $('.ex-1')
		.sprites({
			method:'gStretch',
			hover:'navs'
		})
		
	$('.ex-2')
		.sprites({
			method:'gStretch',
			hover:true
		})
		
	$('.ex-4')
		.sprites({
			method:'gStretch',
			hover:true
		})
		
	$('#footer_menu strong')
		.sprites({
			method:'gStretch',
			hover:true
		})

	$('.partners .img_act').css({opacity:0})
	
	$('.partners a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:1}, function(){$(this).css({opacity:'none'})})							
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0})							
	})
	
	$('.pic_poz .img_act').css({opacity:0})
	
	$('.pic_poz  a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:1}, function(){$(this).css({opacity:'none'})})							
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0})							
	})
	
	$('.pic_poz1 .img_act').css({opacity:0})
	
	$('.pic_poz1  a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:1}, function(){$(this).css({opacity:'none'})})							
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0})							
	})
	
	MSIE = $.browser.msie; 
	// hover
	if (!MSIE) {
		$('.buttons .img_act').css({opacity:'0'})
	} else {
		$('.buttons .img_act').css({display:'none'})
	}
	$('.prev1,.next1').hover(function(){
		if (!MSIE) {
			$(this).find('.img_act').stop().animate({opacity:'1'},600)
		}else {
			$(this).find('.img_act').css({'display':'block'});
		}
	}, function(){
		if (!MSIE) {
			$(this).find('.img_act').stop().animate({opacity:'0'},600)
		}else {
			$(this).find('.img_act').css({'display':'none'});
		}	
	})
	
	//gallery 
	if (!MSIE) {
		$('.buttons_page1 .img_act').css({opacity:'0'})
	} else {
		$('.buttons_page1 .img_act').css({display:'none'})
	}
	
	$("#gallery1").jCarouselLite({
			btnNext: ".buttons_page1 .next1",
		 	btnPrev: ".buttons_page1 .prev1",
			visible: 3,
			speed: 600,
       		mouseWheel:true,
			easing: 'easeOutCirc'
	});
	
	$('#gallery1 .img_act').css({opacity:0})
	
	
	$('#gallery1 li a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:0.7},600)
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0},600)
	})
	
	//gallery 2
	if (!MSIE) {
		$('.buttons_page2 .img_act').css({opacity:'0'})
	} else {
		$('.buttons_page2 .img_act').css({display:'none'})
	}
	
	$("#gallery2").jCarouselLite({
			btnNext: ".buttons_page2 .next1",
		 	btnPrev: ".buttons_page2 .prev1",
			visible: 3,
			speed: 600,
       		mouseWheel:true,
			easing: 'easeOutCirc'
	});
	
	$('#gallery2 .img_act').css({opacity:0})
	
	$('#gallery2 li a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:0.7},600)
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0},600)
	})
	
	//gallery 3
	if (!MSIE) {
		$('.buttons_page4 .img_act').css({opacity:'0'})
	} else {
		$('.buttons_page4 .img_act').css({display:'none'})
	}
	
	$("#gallery3").jCarouselLite({
			btnNext: ".buttons_page4 .next1",
		 	btnPrev: ".buttons_page4 .prev1",
			visible: 3,
			speed: 600,
       		mouseWheel:true,
			easing: 'easeOutCirc'
	});
	
	$('#gallery3 .img_act').css({opacity:0})
	
	$('#gallery3 li a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:0.7},600)
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0},600)
	})
	
	// for lightbox
	$("a[data-type^='prettyPhoto']").prettyPhoto({theme:'light_square'});
	
	$('.button1 span').css({opacity:0})
	
	$('.button1').hover(function(){
		$(this).find('span').stop().animate({opacity:1})
	}, function(){
		$(this).find('span').stop().animate({opacity:0})
	})
	
	$('figure a .img_act, .list1  a .img_act').css({opacity:0})
	
	$('figure a, .list1  a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:0.33})						 
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0})						 
	})
	
	
	$('#content > ul > li').each(function(){
		$(this).data({height:$(this).height()})						  
	})
	
	$('ul#menu').superfish({
      delay:       600,
      animation:   {height:'show'},
      speed:       600,
      autoArrows:  false,
      dropShadows: false
    });
	
 });
 
 function hideSplash(){
        if (!$.browser.msie){
            $('#caption').fadeOut(1000); $('#caption1').fadeOut(1000); $('.buttons .next1').fadeOut(1000); $('#caption1').fadeOut(1000); $('.buttons .prev1').fadeOut(1000);
        } else  {
            hideSplashQuick();
        }
 } 
  function hideSplashQuick(){
    $('#caption').css({'display':'none'});
        $('#caption1').css({'display':'none'});
        $('.buttons .next1').css({'display':'none'});
        $('#caption1').css({'display':'none'});
        $('.buttons .prev1').css({'display':'none'});
  }
  
    function showSplashQuick(){
    $('#caption').css({'display':'block'});
        $('#caption1').css({'display':'block'});
        $('.buttons .next1').css({'display':'block'});
        $('#caption1').css({'display':'block'});
        $('.buttons .prev1').css({'display':'block'});
  }
  
   function showSplash(){
   if (!$.browser.msie){
    $('#caption').fadeIn(4000)
        $('#caption1').fadeIn(4000);
        $('.buttons .next1').fadeIn(4000);
        $('#caption1').fadeIn(4000);
        $('.buttons .prev1').fadeIn(4000);
	}else {
		showSplashQuick();
	}
  }
 
$(window).load(function() {	
	//bg animate
	hideSplashQuick();
    if (location.hash == '#!/splash'){
        location.hash = '';
    }
	
	//content switch
	var content=$('#content'),
		nav=$('.menu'),
		footer_nav=$('.footer_menu');
		
	nav.navs({
		useHash:true,
		hover:'sprites'
	})

	nav.navs(function(n, _){
		content.tabs(n);
	})
	
	$('#bgStretch').bgStretch({
			align:'rightTop',
			navigs:$('#bg_pagination').navigs({})
		})
		.sImg({
			spinner:$('<div class="page_spinner"></div>').css({opacity:.7}).hide()
	})
	
	$('#caption li').each(function(num){
		$(this).data({num:num})
	})
	$('#caption li').css({left:550}).eq(0).css({left:0})
	
	$('#caption1 li').each(function(num){
		$(this).data({num:num})
	})
	$('#caption1 li').css({left:300}).eq(0).css({left:0})
	
	var img=0;
	var num=$('#bg_pagination li').length-1;
	
	
		
	$('.buttons .prev1').click(function(){
		img=img-1;
		if (img<0) img=img+num+1
		$.when($('#bgStretch img')).then(function(){
			$('#bg_pagination li a').eq(img).click();
			caption(img)
		})
        return false
	})
	$('.buttons .next1').click(function(){
		img=img+1;
		if (img>num) img=img-num-1
		$.when($('#bgStretch img')).then(function(){
			$('#bg_pagination li a').eq(img).click();
			caption(img)
		})
        return false
	})
	
	$('#ContactForm').forms({
		ownerEmail:'#'
	})
	
	$("footer>span>a").hover(function(){Cufon.replace('footer>span>a', { fontFamily: 'Aller'});},
	function(){Cufon.replace('footer>span>a', { fontFamily: 'Aller'});}
	
	)
	
})

function caption(img){
	$('#caption li').stop().animate({left:550}, function(){
		$('#caption li').eq(img).stop().animate({left:0})
	})
	
	$('#caption1 li').stop().animate({left:300}, function(){
		$('#caption1 li').eq(img).stop().animate({left:0})
	})
}


