<?php
	define('IMAGES_DIR', base_url('assets/admin/images'));
	define('IMG_DIR', base_url('assets/admin/img'));
	define('CSS_DIR', base_url('assets/admin/css'));
	define('JS_DIR', base_url('assets/admin/js'));
	define('FONTS_DIR', base_url('assets/admin/fonts'));
	define('LIB_YUI_DIR', base_url('assets/libraries/yui3-3.17.2'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administration</title>

<script type="text/javascript" src="<?php echo JS_DIR;?>/jquery_last_min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.input').focus(function(){
		$(this).addClass('focusInput');
	});
	
	$('.input').blur(function(){
		$(this).removeClass('focusInput');
	});
	
	
	var height = $(window).height()-$('#box').height()-100;
	
	$('#box').css('margin-top',height/2);
});

	

</script>
<style>
body{
	font-family:Helvetica, sans-serif;
	font-size:16px;
	color:#444;
	
	background: #c97 url(<?php echo CSS_DIR; ?>/cms_tpl/img/patternbg.png);
/*	background:#666 url(<?php echo CSS_DIR; ?>/cms_tpl/img/katun2.png);*/
}
.box{
	width:332px; 
	overflow:hidden; 
	border-radius: 2px; 
	margin:90px auto; 
	padding:0px; 
	background:#fff; 	
	-webkit-box-shadow :  0 0 6px rgba(0, 0, 0, 0.5);
	-moz-box-shadow :  0 0 6px rgba(0, 0, 0, 0.5);
	box-shadow :  0 0 6px rgba(0, 0, 0, 0.5);	
}
.input{
	font-family: Helvetica, sans-serif;
	font-size:18px;
	color:#999 !important;
	padding:5px;
	border:0px solid #888;
	background:#fff !important;
	box-shadow:none;
	outline:none;
	margin:0 0 0 45px ;
	height:35px;
	width:243px;
	border-left: 1px solid #ddd;
}
.inputdiv{
	border:1px solid #bbb;
	padding:none;
	width:300px;
	background:#eee;	
	-webkit-box-shadow :  0 0 5px rgba(0, 0, 0, 0.3);
	-moz-box-shadow :  0 0 5px rgba(0, 0, 0, 0.3);
	box-shadow :  0 0 5px rgba(0, 0, 0, 0.3);
	margin:20px auto 0 auto ;
}
.username{
	background:#eee url(<?php echo CSS_DIR; ?>/cms_tpl/img/user_log.png) 7px 9px no-repeat;	
}
.password{
	background:#eee url(<?php echo CSS_DIR; ?>/cms_tpl/img/pass_log.png) 7px 9px no-repeat;	
}
.focusInput{
	background	:  #fff;
}
.submit{
		border:0px solid #888;
		background:#F50;
		width:302px;
		color:#fff;
		font-size:20px;
		height:40px;
		margin:10px auto 30px auto;
		-webkit-box-shadow :  0 0 5px rgba(0, 0, 0, 0.7);
		-moz-box-shadow :  0 0 5px rgba(0, 0, 0, 0.7);
		box-shadow :  0 0 5px rgba(0, 0, 0, 0.7);
}
p{	margin:10px 0 10px 0;	}
#footerBar {
	background: #555 url(<?php echo CSS_DIR; ?>/cms_tpl/img/patternbg.png);
	position:fixed;
	width:100%;
	height:45px;
	bottom:0;
	left:0;
	text-align:center;
	line-height:45px;
	color:#999;
	z-index:11;
	font-size:12px;
	-webkit-box-shadow: black 0px 10px 10px -10px inset;
	-moz-box-shadow: black 0px 10px 10px -10px inset;
	box-shadow: black 0px 10px 10px -10px inset;
}
</style>
</head>

<body>
    <div class="box" id="box">
    
        <div style="margin:4px; border:1px solid #ccc; background:#ddd; padding:5px; text-align:center; background: #32415a url(<?php echo CSS_DIR; ?>/cms_tpl/img/patternbg.png);">
        
            <div style="font-family:Arial, Helvetica, sans-serif; font-size:34px; color:#fff; width:80%; margin:auto; text-align:center; padding:10px 20px 5px 20px; border-bottom:1px dashed #88a; ">User<b>Login</b></div>
            <div style="color:#ddd; padding:10px 0;">Internal user only</div>
            <?php echo form_open(base_url('index.php/admin/cek_login')); ?>
            <?php echo $this->warning; ?>
            <p>
            <div class="inputdiv username"><input class="input" type="text" name="username" value=""  placeholder="Username" /></div>
            </p>
                    
            <p>
            <div class="inputdiv password"><input class="input" type="password" name="password" value="" placeholder="Password" /></div>
            </p> 
            <input class="submit" type="submit" value="Sign in" /> 
            </form>
        </div>
    </div>
    <div id="footerBar">&copy; Copyright 2014 All Rights Reserved</div>

</body>
</html>