<?php
	define('IMAGES_DIR', base_url('assets/images'));
	define('IMG_DIR', base_url('assets/admin/img'));
	define('CSS_DIR', base_url('assets/admin/css'));
	define('CSS_2_DIR', base_url('assets/css'));
	define('JS_DIR', base_url('assets/admin/js'));
	define('JS_2_DIR', base_url('assets/js'));
	define('FONTS_DIR', base_url('assets/admin/fonts'));
?>
<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	
    <title>one stop travel service, tinggal klik dan gak repot</title>
    <!--<meta name="author" content="hellotraveler.co.id" />-->
    <meta name="distribution" content="Global" /> 
    <meta name="revisit-after" content="7 days" /> 
    <meta name="robots" content="all,index,follow" /> 
    <meta name="publisher_email" content="info@hellotraveler.co.id" />
    <!--<meta name="publisher_url" content="http://www.hellotraveler.co.id/" />-->
    <!--<meta name="copyrights" content="hellotraveler.co.id" />-->
    <meta name="robots" content="noodp" />
    <meta content="usaha agen tiket ,agen pesawat online,buka franchaise murah,tiket pesawat,hotel murah,booking hotel murah,sewa bus pariwisata,sewa mobil murah,tour travel,usaha dengan modal kecil" name="keywords"  />
    <meta content="gak repot punya usaha Bisnis tiket pesawat, transport, hotel dan tour mudah, murah, modal kecil, semua bisa semua ada." name="description"/>
    
	<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
	<!-- For all browsers -->
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/reset_59edcbff.css">
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/style_59edcbff.css">
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/colors_59edcbff.css">
	<link rel="stylesheet" media="print" href="<?php echo CSS_DIR;?>/web/print_59edcbff.css">
	<!-- For progressively larger displays -->
	<link rel="stylesheet" media="only all and (min-width: 480px)" href="<?php echo CSS_DIR;?>/web/480_59edcbff.css">
	<link rel="stylesheet" media="only all and (min-width: 768px)" href="<?php echo CSS_DIR;?>/web/768_59edcbff.css">
	<link rel="stylesheet" media="only all and (min-width: 992px)" href="<?php echo CSS_DIR;?>/web/992_59edcbff.css">
	<link rel="stylesheet" media="only all and (min-width: 1200px)" href="<?php echo CSS_DIR;?>/web/1200_59edcbff.css">
	<!-- For Retina displays -->
	<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="<?php echo CSS_DIR;?>/web/2x_59edcbff.css">
 	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/custom.css">
	<!-- Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

	<!-- Additional styles -->
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/styles/agenda_59edcbff.css">
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/styles/dashboard_59edcbff.css">
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/styles/form_59edcbff.css">
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/styles/modal_59edcbff.css">
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/styles/switches_59edcbff.css">
    <link rel="stylesheet" href="<?php echo JS_DIR;?>/web/libs/glDatePicker/developr_59edcbff.css">
    <link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/styles/table_59edcbff.css">
    
    <link rel="stylesheet" href="<?php echo JS_DIR;?>/web/libs/datatables/datatables.css">
    <!-- jQuery Form Validation 
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/styles/progress-slider_59edcbff.css">
    -->
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/validationEngine.jquery.css">

	<!-- JavaScript at bottom except for Modernizr -->
    <!--<script> var base_url = "http://www.hellotraveler.co.id/", page = "home";</script>-->
    <script src="<?php echo JS_DIR;?>/web/libs/jquery-1.7.2.min.js"></script>
	<script src="<?php echo JS_DIR;?>/web/libs/modernizr.custom.js"></script>
	

	<!-- For Modern Browsers -->
	<link rel="shortcut icon" href="<?php echo CSS_DIR;?>/web/img/favicons/favicon.png">
	<!--<link rel="shortcut icon" href="<?php echo CSS_DIR;?>/web/img/favicons/ht.ico">-->
	<!-- For retina screens -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo CSS_DIR;?>/web/img/favicons/apple-touch-icon-retina.png">
	<!-- For iPad 1-->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo CSS_DIR;?>/web/img/favicons/apple-touch-icon-ipad.png">
	<!-- For iPhone 3G, iPod Touch and Android -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo CSS_DIR;?>/web/img/favicons/apple-touch-icon.png">

	<!-- iOS web-app metas -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="<?php echo CSS_DIR;?>/web/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="<?php echo CSS_DIR;?>/web/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="<?php echo CSS_DIR;?>/web/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on">

	<!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
	<meta name="application-name" content="Developr Admin Skin">
	<meta name="msapplication-tooltip" content="Cross-platform admin template.">
	<!--<meta name="msapplication-starturl" content="http://www.hellotraveler.co.id/">-->
	<!-- These custom tasks are examples, you need to edit them to show actual pages -->
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_DIR;?>/web/styles/pager_custom.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_DIR;?>/web/styles/tooltipster.css" />
	<link rel="stylesheet" href="<?php echo CSS_DIR;?>/web/ui.progress-bar.css">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo CSS_DIR;?>/jquery-ui-timepicker-addon.css" />
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo CSS_DIR;?>/jquery-ui.css" />
	<script src="<?php echo JS_DIR;?>/web/progress.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="http://www.jquery4u.com/demos/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
	<script src="https://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>
	<script src="<?php echo JS_DIR;?>/jquery-ui.min.js"></script>
	<script src="<?php echo JS_DIR;?>/jquery.datePicker-2.1.2.js"></script>
	<script src="<?php echo JS_DIR;?>/jquery-ui-timepicker-addon.js"></script>
	
	<!-- Tambahanku -->
	<script src="<?php echo JS_2_DIR;?>/functions.js"></script>
	<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/style.css">
	<script src="http://yui.yahooapis.com/3.17.2/build/yui/yui-min.js"></script>
	<link rel="stylesheet" href="http://yui.yahooapis.com/3.17.2/build/cssgrids/cssgrids-min.css">

</head>
<body class="clearfix with-menu with-shortcuts reversed yui3-skin-sam">

	<!-- Prompt IE 6 users to install Chrome Frame -->
	<!--[if lt IE 7]><p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<!-- Title bar -->
	<header role="banner" id="title-bar">
		<h2>Hello <?php echo $this->session->userdata('user_name');?></h2>
	</header>

	<!-- Button to open/hide menu -->
	<a href="javascript:void(0);" id="open-menu"><span>Menu</span></a>

	<!-- Button to open/hide shortcuts -->
	<a href="javascript:void(0);" id="open-shortcuts"><span class="icon-thumbs"></span></a>
    