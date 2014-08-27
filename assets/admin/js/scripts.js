include("js/jquery.backgroundpos.js");
include("js/jquery.easing.js");
include("js/jquery.mousewheel.js");
include("js/jquery.fancybox-1.3.4.pack.js");
include("js/uScroll.js");
include("js/googleMap.js");
include("js/superfish.js");
include("js/switcher.js");
include("js/forms.js");
include("js/MathUtils.js");
include("js/gallery.js");

function include(url) {
    document.write('<script src="' + url + '"></script>');
}
var MSIE = false, MSIE9 = false,
    content, mh, h;

function addAllListeners() {
    $('.soc_icons>li>a').hover(
        function(){
        	$('img',this).stop().animate({'top':'-6px'},300,'easeOutExpo');  
        },
        function(){
            $('img',this).stop().animate({'top':'0'},500,'easeOutCubic');   
        }
    );
    $('.readMore').hover(
        function(){
            $(this).stop().animate({'backgroundPosition':'center bottom'},300,'easeOutExpo');
        },
        function(){
            $(this).stop().animate({'backgroundPosition':'center top'},500,'easeOutCubic');
        }
    );
    $('.closeBtn').hover(
        function(){
        	$('span',this).stop().animate({'backgroundPosition': 'right center'},300,'easeOutExpo');  
        },
        function(){
            $('span',this).stop().animate({'backgroundPosition': 'left center'},500,'easeOutExpo');   
        }
    );
    $('.list1>li>a').hover(
        function(){
            if (!MSIE) {
        	   $('strong',this).stop().animate({'opacity': '0'},300,'easeOutExpo');  
            } else {
                $('strong',this).stop().hide();  
            }
        },
        function(){
            if (!MSIE) {
        	   $('strong',this).stop().animate({'opacity': '1'},500,'easeOutCubic');  
            } else {
                $('strong',this).stop().show()
            } 
        }
    );
    var val1 = $('#splashGallery>li>div>div').height(),
        val2 = $('#splashGallery>li>div>div>a>span').css('marginLeft');
    $('#splashGallery>li>div>div>a').hover(
        function(){
            if (!MSIE9)
    	       $(this).find('span').stop().animate({'marginLeft':'25px'},300,'easeOutExpo').end()
            if (!MSIE)
                $(this).parent().stop().animate({'height': '80px'},200,'easeOutExpo').css('overflow','visible')
                  
        },
        function(){
            if (!MSIE9)
    	       $(this).find('span').stop().animate({'marginLeft':val2},500,'easeOutExpo').end()
            if (!MSIE)
                $(this).parent().stop().animate({'height': val1},500).css('overflow','visible')
                
        }
    );  
}

$(document).ready(ON_READY);
$(window).load(ON_LOAD);

function ON_READY() {
    /*SUPERFISH MENU*/  
    $('.menu #menu').superfish({
	   delay: 800,
	   animation: {
	       height: 'show'
	   },
       speed: 'slow',
       autoArrows: false,
       dropShadows: false
    });
}

function ON_LOAD(){
    MSIE = ($.browser.msie) && ($.browser.version <= 8);
    MSIE9 = ($.browser.msie) && ($.browser.version == 9);
    $('.spinner').fadeOut()
    
    $("#galleryHolder").gallerySplash({'autoPlayState':false});
    
	$('.list1>li>a').attr('rel','appendix')
    $('.list1>li>a').fancybox({
        'transitionIn': 'elastic',
    	'speedIn': 500,
    	'speedOut': 300,
        'centerOnScroll': true,
        'overlayColor': '#000'
    });

    $('.scroll, .scroll2')
	.uScroll({			
		mousewheel:true,
        lay:'outside'
	})
    
    //content switch
    content = $('#content');
    content.tabs({
        show:0,
        preFu:function(_){
            _.li.css({'display':'none'})
        },
        actFu:function(_){      
            if(_.curr){                
                _.curr
                    .css({'display':'block','left':'-2000px'}).stop(true).show().delay(200)
                    .animate({'left':'0px'},{duration:600,easing:'easeOutExpo'});
            }
            if(_.prev){
  		        _.prev
                    .show().stop(true).animate({'left':'2000px'},{duration:450,easing:'easeInOutExpo',complete:function(){
                            if (_.prev){
                                _.prev.css({'display':'none'});
                            }
                        }
		              });
            }            
  		}
    });
    var defColor = $('#menu>li>a').eq(0).css('color'); 
    var nav = $('.menu');
    nav.navs({
		useHash:true,
        defHash: '#!/home',
        hoverIn:function(li){
            $('>strong',li).stop().animate({'height':'100%'},300,'easeOutExpo');
        },
        hoverOut:function(li){
            if ((!li.hasClass('with_ul')) || (!li.hasClass('sfHover'))) {
                $('>strong',li).stop().animate({'height':'0'},500,'easeOutCubic');
            }
        }
    })
    .navs(function(n,_){	
   	    $('#content').tabs(n);
        if (_.prevHash == '#!/page_mail') { 
            $('#form1 a').each(function (ind, el){
                if ($(this).attr('data-type') == 'reset') { $(this).trigger('click') }   
            })
        }
   	});    
    
    setTimeout(function(){  $('body').css({'overflow':'visible'}); },300);    
    addAllListeners();
    
    $(window).trigger('resize');
    mh = parseInt($('body').css('minHeight'));
}

$(window).resize(function (){
    if (content) {
        var currH = (content.height()+200);
        content
            .stop().animate({'top':(windowH()-currH)*.5},500,'easeOutCubic')
            .css('overflow','visible')
    }
});