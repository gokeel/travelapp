
$(function() {

    // Responsive nav
    selectnav('navigation', {
        label: 'NAVIGATE...',
        autoselect: false,
        nested: true,
        indent: '__'
    });

	$('ul.nav li.dropdown').hover(function() {
		$(this).find('.dropdown-menu').stop(true, true).show();
		$(this).addClass('open');
	}, function() {
		$(this).find('.dropdown-menu').stop(true, true).hide();
		$(this).removeClass('open');
	});
	
	$('.dropdown-menu li').hover(function() {
		$(this).find('.sub-menu').stop(true, true).show();
		$(this).addClass('open');
	}, function() {
		$(this).find('.sub-menu').stop(true, true).hide();
		$(this).removeClass('open');
	});
	
	
  // Carousel Hover
	$('.carousel_box li div').mouseenter(function(){
		//$(this).find('img').animate({opacity:0.6},400);
		$(this).find('.box span').animate({opacity:1},400);
	}).mouseleave(function(){
		//$(this).find('img').animate({opacity:1},400);
		$(this).find('.box span').animate({opacity:0},400);
	});
	
  // Loading Screen 
	$('.loading-demo').click(function(){
		setTimeout("unloading();",1500); 		
	});
	
	 // Tooltip Hover
	$('a[rel=e-tooltip]').tooltip({ 'placement':'left' });
	$('a[rel=w-tooltip]').tooltip({ 'placement':'right' });
	$('.stip a ,a[rel=s-tooltip]').tooltip({ 'placement':'bottom' });
	$('.tip a ,a[rel=tooltip], .tip div').tooltip();	
	
    // Popover Hover
    $("a[rel=popover]").popover({ placement :'bottom' });
    $("a[rel=popover-top]").popover({ placement :'top'});
	$("a[rel=popover-left]").popover({ placement :'left'});
	$("a[rel=popover-right]").popover({ placement :'right'});
	
	// Member grid
	$( '#ri-grid' ).gridrotator( {
		w1024			: {
			rows	: 2,
			columns	: 20
		},
		w768			: {
			rows	: 2,
			columns	: 15
		},
		w480			: {
			rows	: 2,
			columns	: 7
		},
		w320			: {
			rows	: 2,
			columns	: 6
		},
		w240			: {
			rows	: 2,
			columns	: 3
		},
		// step: number of items that are replaced at the same time
		// random || [some number]
		// note: for performance issues, the number "can't" be > options.maxStep
		step			: 'random',
		maxStep			: 7,
		// prevent user to click the items
		preventClick	: true,
		// animation type
		// showHide || fadeInOut || slideLeft || 
		// slideRight || slideTop || slideBottom || 
		// rotateLeft || rotateRight || rotateTop || 
		// rotateBottom || scale || rotate3d || 
		// rotateLeftScale || rotateRightScale || 
		// rotateTopScale || rotateBottomScale || random
		animType		: 'random',
		// animation speed
		animSpeed		: 500,
		// animation easings
		animEasingOut	: 'linear',
		animEasingIn	: 'linear',
		// the item(s) will be replaced every 3 seconds
		// note: for performance issues, the time "can't" be < 300 ms
		interval		: 3000
	} );
	
	//Flickr Initialization
	jQuery('ul#flickr-badge').jflickrfeed({
		limit: 6,
		qstrings: {
			id: '11821713@N00'
		},
		itemTemplate: '<li><a href="http://www.flickr.com/photos/11821713@N00"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
	});
	
	// Ads Corner 
/*      $('body').peelback({
        adImage  : 'images/peel-ad.png',
        peelImage  : 'images/peel-image.png',
        clickURL : 'http://www.reddevildesign.org/',
        smallSize: 50,
        bigSize: 500,
        gaTrack  : true,
        gaLabel  : '#1 Stegosaurus',
        autoAnimate: true
      });*/
	
	// fancybox
	$("a.zoom").fancybox();
	$("a[rel=slidegroup]").fancybox({
		'titlePosition' 	: 'over',
		'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
		    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
		}
	});
	
	// slider
	$('.flexslider').flexslider();
	$('.flexslider-thumbnails').flexslider({
		animation: "slide",
		controlNav: "thumbnails"				   
	  });
	$('.aslider').flexslider({
		animation: "slide",
		controlNav: false, 
		directionNav: false 
		});
    $(".carousel_box_slide").flexslider({
		animation: "slide",
		controlNav: false, 
		slideshowSpeed: 100000
	});
	//$('.carousel_box_slide').jcarousel();
	
	/* theme changer */
	$('.open-close-demo').click(function() {
			  if ($(this).parent().css('left') == '-148px') {
				  $(this).parent().animate({
					  "left": "0"
				  }, 300);
			  } else {
				  $(this).parent().animate({
					  "left": "-148px"
				  }, 300);
			  }
	});
	$(".color-themes").click( function() {
			var colors=$(this).attr('id');
			chooseStyle(colors, 60);
	 });
	$(".pat").click(function(){
		$("body").removeClass('bg-img');
		if( $('#alpha-style').is(':checked')){
				$('#alpha-style').attr("checked",false);
				$('.bg-alpha').hide();
			}
	});

    $("#pat1").click(function(){
        $("body").css({'background':'url(../../theme/images/bg.png) repeat fixed'});
        return false;
    });
    
    $("#pat2").click(function(){
		 $("body").css({'background':'url('+baseurl()+'images/switcher/2.png) repeat fixed'});
        return false;
    });

    $("#pat3").click(function(){
		 $("body").css({'background':'url('+baseurl()+'images/switcher/3.png) repeat fixed'});
        return false;
    });
	
    $("#pat4").click(function(){
		 $("body").css({'background':'url(images/switcher/4.png) repeat fixed'});
        return false;
    });
    $("#pat5").click(function(){
		 $("body").css({'background':'url(images/switcher/5.png) repeat fixed'});
        return false;
    });
    $("#pat6").click(function(){
		 $("body").css({'background':'url(images/switcher/6.png) repeat fixed'});
        return false;
    });
    $("#pat7").click(function(){
		 $("body").css({'background':'url(images/switcher/7.png) repeat fixed'});
        return false;
    });
    $("#pat8").click(function(){
		 $("body").css({'background':'url(images/switcher/8.png) repeat fixed','-webkit-background-size': 'none','-moz-background-size': 'none','-o-background-size': 'none','background-size': 'none'});
        return false;
    });


	  // Check browser fixbug
	  var mybrowser=navigator.userAgent;
	  if(mybrowser.indexOf('MSIE')>0){ 
	 	  }
	  if(mybrowser.indexOf('Firefox')>0){
		  }	
	  if(mybrowser.indexOf('Presto')>0){
		  }
	  if(mybrowser.indexOf('Chrome')>0){
		  }		
	  if(mybrowser.indexOf('Safari')>0){
		  }		

});	

	// window on load 
    $(window).load(function(){
		// Initialize portfolio isotope 
        var $container          = $('.project-feed');
        var $filter             = $('.project-feed-filter');
        $container.isotope({
            filter              : '*',
            layoutMode          : 'fitRows',
            animationOptions    : {
            duration            : 750,
            easing              : 'linear'
            }
        }); 
        $filter.find('a').click(function() {
            var selector = $(this).attr('data-filter');
            $filter.find('a').removeClass('active');
            $(this).addClass('active');
            $container.isotope({ 
                filter             : selector,
                animationOptions   : {
                animationDuration  : 750,
                easing             : 'linear',
                queue              : false,
                }
            });
            return false;
        }); 

    });
	
	// Function
	// Contact Submiting form
	function Contact_form(form, options){
		// text on load you change , 0: No Overlay , 1 loading with  Overlay 
		 loading('Sending',1); 
		 var data=form.serialize();		
		$.ajax({
			url: "contact.php",
			data: data,
			success: function(data){	
				  if(data.check==0){ // if Ajax respone data.check =0 or not complete
					  $('#preloader').fadeOut(400,function(){ $(this).remove(); });		
					  			alert("No complete");
					   return false;
				  }
				  if(data.check==1){ // if Ajax respone data.check =1 or Complete
					 $('.notifications').slideDown(function(){
								setTimeout("$('.notifications').slideUp();",7000); 								
							}); // Show  notifications box
					 $('#contactform').get(0).reset();  //  reset form
						unloading();	 //  remove loading
				  }
			},
			cache: false,type: "POST",dataType: 'json'
		});
	}
	// Loading
	  function loading(name,overlay) { 
			$('body').append('<div id="overlay"></div><div id="preloader">'+name+'..</div>');
					if(overlay==1){
					  $('#overlay').css('opacity',0.4).fadeIn(400,function(){  $('#preloader').fadeIn(400);	});
					  return  false;
			   }
			$('#preloader').fadeIn();	  
	   }
	   // Unloading
	  function unloading() { 
			$('#preloader').fadeOut(400,function(){ $('#overlay').fadeOut(); $.fancybox.close(); }).remove();
	   }