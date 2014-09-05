<?php
	define('IMAGES_DIR', base_url('assets/images'));
	define('IMG_DIR', base_url('assets/img'));
	define('CSS_DIR', base_url('assets/css'));
	define('JS_DIR', base_url('assets/js'));
	define('FONTS_DIR', base_url('assets/fonts'));
	define('LIB_YUI_DIR', base_url('assets/libraries/yui3-3.17.2'));
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<meta charset="utf-8">
<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
<title>Hellotraveler | one stop travelling solution</title>
<meta name="description" content="Verendus - A HTML5 / CSS3 Multipurpose Business Template">
<meta name="keywords" content="Bootstrap, Verendus, HTML5, CSS3, Business, Multipurpose, Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo CSS_DIR;?>/bootstrap.css">
<link rel="stylesheet" href="<?php echo CSS_DIR;?>/font-awesome.css">
<link rel="stylesheet" href="<?php echo CSS_DIR;?>/animate.css">
<link rel="stylesheet" href="<?php echo CSS_DIR;?>/flexslider.css">
<link rel="stylesheet" href="<?php echo CSS_DIR;?>/style.css">
<link rel="stylesheet" href="<?php echo CSS_DIR;?>/custom.css">

<!--[if IE 8]>
            <link rel="stylesheet" type="text/css" media="all" href="<?php echo CSS_DIR;?>/ie8.css" />    
        <![endif]-->

<script src="<?php echo JS_DIR;?>/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
<script src="<?php echo JS_DIR;?>/vendor/jquery-1.8.3.min.js"></script>
<!--<script src="<?php echo JS_DIR;?>/jquery.datePicker-2.1.2"></script>-->
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="<?php echo JS_DIR;?>/functions.js"></script>
<!--<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>-->
<!--<link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<!--<link href='http://www.local.com/bebasterbang/theme/css/datepicker/datepicker.css' rel='stylesheet' type='text/css'>-->

<style>
.post-share .social-icons-pinterest-icon a, 
		.post-share .social-icons-linkedin-icon a, 
		.post-share .social-icons-googleplus-icon a, 
		.post-share .social-icons-facebook-icon a, 
		.post-share .social-icons-tumblr-icon a,
		.post-share .social-icons-twitter-icon a { 
			background: transparent url(<?php echo IMG_DIR;?>/sprite-social-media-sidebar.png) no-repeat;
		}
	.carousel-control {background: #000 url('<?php echo IMG_DIR;?>/slider-nav.png') no-repeat top left;}
	.flex-direction-nav a {background: #000 url('<?php echo IMG_DIR;?>/slider-nav.png') no-repeat top left;}
	.flex-direction-nav a {
		background: rgba(0, 0, 0, 0.2) url('<?php echo IMG_DIR;?>/slider-nav.png') no-repeat top left;
	}
	.header-background {
		background: transparent url('<?php echo IMG_DIR;?>/backgrounds/bg1.jpg') no-repeat center top;
	}
	#s {background: #333 url('<?php echo IMG_DIR;?>/menu-search-icon.png') no-repeat 96% 50%;}
	.divider, .divider-top, .divider-text {background: transparent url('<?php echo IMG_DIR;?>/stripes.png') repeat-x left 50%; }
	pre {background: url("<?php echo IMG_DIR;?>/code.png") repeat top left;}
	blockquote {background: transparent url('<?php echo IMG_DIR;?>/blockquote-bg.png') no-repeat left 50%;}
	blockquote.blockquote-left {background: transparent url('<?php echo IMG_DIR;?>/blockquote-bg.png') no-repeat right 50%;}
	.error-page .searchform #s {background: transparent url('<?php echo IMG_DIR;?>/searchform-bg.png') no-repeat 98% 0;}
	.post {background: transparent url('<?php echo IMG_DIR;?>/stripes.png') repeat-x left bottom;}
	.preloader { background:url(<?php echo IMG_DIR;?>/ajax-loader.gif) center center no-repeat #ffffff;}
	.post-thumb div h2 {background: transparent url('<?php echo IMG_DIR;?>/stripes-transparent.png') repeat-x bottom left;}
	.format-quote .post-content {background: transparent url('<?php echo IMG_DIR;?>/blockquote-bg.png') no-repeat left top;}
	.shortcode-blogpost-small .blogpost-overlay {
		background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-overlay-60x60.png') no-repeat right top;
	}

	.shortcode-blogpost-medium .blogpost-overlay {
		background: transparent url('<?php echo IMG_DIR;?>/blogpost-overlay-80x80.png') no-repeat right top;
	}

	.shortcode-blogpost-large .blogpost-overlay {
		background: transparent url('<?php echo IMG_DIR;?>/blogpost-overlay-100x100.png') no-repeat right top;
	}
	.shortcode-blogpost-small .blogpost-overlay:hover {background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-hover-icon-60x60.png') no-repeat right top;}
	.shortcode-blogpost-medium .blogpost-overlay:hover {background: transparent url('<?php echo IMG_DIR;?>/blogpost-hover-icon-80x80.png') no-repeat right top;}
	.shortcode-blogpost-large .blogpost-overlay:hover {background: transparent url('<?php echo IMG_DIR;?>/blogpost-hover-icon-100x100.png') no-repeat right top;}
	.widgets-light .widget-search #searchform input {background: transparent url('<?php echo IMG_DIR;?>/searchform-bg.png') no-repeat 96% 0;}
	.social-icons-pinterest-icon a, .social-icons-linkedin-icon a, .social-icons-github-icon a, .social-icons-googleplus-icon a, 
		.social-icons-flickr-icon a, .social-icons-digg-icon a, .social-icons-skype-icon a, .social-icons-youtube-icon a, 
		.social-icons-forrst-icon a, .social-icons-facebook-icon a, .social-icons-vimeo-icon a, .social-icons-dribbble-icon a, 
		.social-icons-stumbleupon-icon a, .social-icons-tumblr-icon a, .social-icons-wordpress-icon a, .social-icons-rss-icon a, 
		.social-icons-twitter-icon a { 
			background: transparent url(<?php echo IMG_DIR;?>/sprite-social-media-sidebar.png) no-repeat;
		}
	.portfolio-meta, .portfolio-content {background: transparent url(<?php echo IMG_DIR;?>/stripes.png) repeat-x left bottom;}
	.portfolio-title-wrap {background: transparent url(<?php echo IMG_DIR;?>/stripes.png) repeat-x left bottom;}
	.global-filter, .global-filter span.filter-bg {
		background: transparent url(<?php echo IMG_DIR;?>/stripes.png) repeat-x left top;
	}
	.person-content { background: transparent url(<?php echo IMG_DIR;?>/stripes.png) repeat-x left top;}
	.person-social {background: transparent url(<?php echo IMG_DIR;?>/stripes.png) repeat-x left top;}
	.tabbed-loader {background: transparent url(<?php echo IMG_DIR;?>/ajax-loader.gif) no-repeat top left;}
	[class^="sprite-"], [class*=" sprite-"]{background: url(<?php echo IMG_DIR;?>/sprite-glyphicons.png) no-repeat top left;}
	.twitter-overlay {background: transparent url('<?php echo IMG_DIR;?>/widget-twitter-overlay-32x32.png') no-repeat right top;}
	.flickr-overlay {background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-overlay-60x60.png') no-repeat right top;}
	.flickr-overlay:hover {
				background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-hover-icon-60x60.png') no-repeat right top;
			}
	.social-light .social-icons-pinterest-icon a, .social-light .social-icons-linkedin-icon a, .social-light .social-icons-github-icon a, .social-light .social-icons-googleplus-icon a, 
		.social-light .social-icons-flickr-icon a, .social-light .social-icons-digg-icon a, .social-light .social-icons-skype-icon a, .social-light .social-icons-youtube-icon a, 
		.social-light .social-icons-forrst-icon a, .social-light .social-icons-facebook-icon a, .social-light .social-icons-vimeo-icon a, .social-light .social-icons-dribbble-icon a, 
		.social-light .social-icons-stumbleupon-icon a, .social-light .social-icons-tumblr-icon a, .social-light .social-icons-wordpress-icon a, .social-light .social-icons-rss-icon a, 
		.social-light .social-icons-twitter-icon a { 
			background: transparent url(<?php echo IMG_DIR;?>/sprite-social-media.png) no-repeat;
		}
	
	.social-light .social-icons-facebook-icon a { background-position: -270px 0 }
			.social-light .social-icons-facebook-icon div { background-color: #39599f; }
		.social-light .social-icons-pinterest-icon a { background-position: 0 0; }
			.social-light .social-icons-pinterest-icon div { background-color: #cb2027; }
 		.social-light .social-icons-linkedin-icon a { background-position: -360px 0; }
 			.social-light .social-icons-linkedin-icon div { background-color: #0181b2; }
		.social-light .social-icons-github-icon a { background-position: -390px 0; }
			.social-light .social-icons-github-icon div { background-color: #ffffff; }
		.social-light .social-icons-googleplus-icon a { background-position: -480px 0; }
			.social-light .social-icons-googleplus-icon div { background-color: #4b4b4b; }
		.social-light .social-icons-flickr-icon a { background-position: -420px 0; }
			.social-light .social-icons-flickr-icon div { background-color: #ffffff; }
		.social-light .social-icons-digg-icon a { background-position: -450px 0;  } 
			.social-light .social-icons-digg-icon div { background-color: #b2b2b2; }
		.social-light .social-icons-skype-icon a { background-position: -30px 0; }
			.social-light .social-icons-skype-icon div { background-color: #00c6ff; }
		.social-light .social-icons-youtube-icon a { background-position: -330px 0; }
			.social-light .social-icons-youtube-icon div { background-color: #e70031; }
		.social-light .social-icons-forrst-icon a { background-position: -300px 0; } 
			.social-light .social-icons-forrst-icon div { background-color: #1c8328; }
		.social-light .social-icons-vimeo-icon a { background-position: -240px 0; }
			.social-light .social-icons-vimeo-icon div { background-color: #7edde8; }
		.social-light .social-icons-dribbble-icon a { background-position: -210px 0; } 
			.social-light .social-icons-dribbble-icon div { background-color: #ea4c89; }
		.social-light .social-icons-stumbleupon-icon a { background-position: -60px 0; }
			.social-light .social-icons-stumbleupon-icon div { background-color: #ed472a; }
		.social-light .social-icons-tumblr-icon a { background-position: -90px 0; }
			.social-light .social-icons-tumblr-icon div { background-color: #3a5976; }
		.social-light .social-icons-wordpress-icon a { background-position: -120px 0; }
			.social-light .social-icons-wordpress-icon div { background-color: #21759b; }
		.social-light .social-icons-rss-icon a { background-position: -150px 0; } 
			.social-light .social-icons-rss-icon div { background-color: #f8bc2e; }
		.social-light .social-icons-twitter-icon a { background-position: -180px 0; }
			.social-light .social-icons-twitter-icon div { background-color: #459ac3; }

		.social-light .social-icons-flickr-icon a:hover { background-position: -510px 0; }
		.social-light .social-icons-github-icon a:hover { background-position: -540px 0; }
		
	.social-icons-facebook-icon a { background-position: -270px 0 }
	.social-icons-pinterest-icon a { background-position: 0 0; }
	.social-icons-linkedin-icon a { background-position: -360px 0; }
	.social-icons-github-icon a { background-position: -390px 0; }
	.social-icons-googleplus-icon a { background-position: -480px 0; }
	.social-icons-flickr-icon a { background-position: -420px 0; }
	.social-icons-digg-icon a { background-position: -450px 0;  } 
	.social-icons-skype-icon a { background-position: -30px 0; }
	.social-icons-youtube-icon a { background-position: -330px 0; }
	.social-icons-forrst-icon a { background-position: -300px 0; } 
	.social-icons-vimeo-icon a { background-position: -240px 0; }
	.social-icons-dribbble-icon a { background-position: -210px 0; } 
	.social-icons-stumbleupon-icon a { background-position: -60px 0; }
	.social-icons-tumblr-icon a { background-position: -90px 0; }
	.social-icons-wordpress-icon a { background-position: -120px 0; }
	.social-icons-rss-icon a { background-position: -150px 0; } 
	.social-icons-twitter-icon a { background-position: -180px 0; }
	.social-icons-github-icon a:hover { background-position: -390px 0; } 
	.social-icons-flickr-icon a:hover { background-position: -420px 0; }	
	
	.widget-blogpost-overlay {background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-overlay-60x60.png') no-repeat right top;}
	.widget-blogpost-overlay:hover {
				background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-hover-icon-60x60.png') no-repeat right top;
			}
	.flickr-overlay {background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-overlay-70x70.png') no-repeat right top;}
	.flickr-overlay:hover {
				background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-hover-icon-70x70.png') no-repeat right top;
			}
	.widget-blogpost-overlay {background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-overlay-70x70.png') no-repeat right top;}
	.widget-blogpost-overlay:hover {
				background: transparent url('<?php echo IMG_DIR;?>/widget-flickr-hover-icon-70x70.png') no-repeat right top;
			}
	
</style>

</head>
<body>

<!--[if lt IE 8]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

<div class="topbar row-fluid"> <!-- Top Bar -->
  <div class="header-menu">
    <div> <!-- Main Menu -->
      <div class="container">
        <div class="row-fluid">
          <nav class="nav-menu">
            <div class="menu-mobile-wrapper"> <!-- Menu Mobile Wrapper --> 
              <a id="menu-mobile-trigger"></a> </div>
            <span class="menu-slider hidden-phone"></span> <!-- Menu Slider -->
            <ul id="header-menu" class="menu">
              <li class="active current-menu-item"> <a href="<?php echo base_url();?>">Home</a> </li>
              <li> <a href="<?php echo base_url();?>index.php/webfront/promo">Promo</a></li>
              <li> <a href="<?php echo base_url();?>index.php/webfront/hotel">Hotel</a> </li>
              <li> <a href="<?php echo base_url();?>index.php/webfront/paketwisata">Paket Wisata</a> </li>
              <li> <a href="<?php echo base_url();?>index.php/webfront/tentang">Tentang Kami</a></li>
              <li> <a href="<?php echo base_url();?>index.php/webfront/agen">Keagenan</a></li>
              <li> <a href="<?php echo base_url();?>index.php/webfront/registrasi">Registrasi agen</a></li>
              <li> <a href="<?php echo base_url('');?>index.php/admin">Login</a></li>
			  <li><a href="<?php echo base_url();?>index.php/webfront/kontak">Kontak</a> </li>
            </ul>
          </nav>
          <!-- Menu Search Form 
                                <div class="searchform"> 
                                    <form method="get" id="searchform" action="#" class="clearfix">
                                        <input type="text" name="s" id="s" value="Search.." onfocus="if(this.value=='Search..')this.value='';" onblur="if(this.value=='')this.value='Search..';" />
                                     </form>
                                </div>  --> 
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Close Top Bar -->

<div id="wrapper" class="boxed"> <!-- Page Wrapper: Boxed class for boxed layout - Fullwidth class for fullwidth page -->
  
  <div class="header-background"> <!-- Header Background -->
    <div id="header-container" class="clearfix"> <!-- Header Container, contains logo and contact button -->
      <header class="clearfix">
        <div class="container">
          <div class="row-fluid">
            <div class="span4 logo"> <a href="<?php echo base_url();?>"> <img src="<?php echo IMG_DIR;?>//verendus-logo.png" alt="Verendus Logo" title="Verendus Logo" /> </a> </div>
            <div class="header-contact button"> <a href="#">
              <ul class="clearfix">
                <li class="phone-number"> <a href="<?php echo base_url();?>index.php/webfront/kontak"><i class="icon-phone"></i> +62(21) - 86603475 </li>
                <li class="mailto-email"> <i class="icon-envelope"></i>info@hellotraveler.co.id </li></a>
              </ul>
              </a> </div>
          </div>
        </div>
      </header>
    </div>