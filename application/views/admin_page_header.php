<?php
	define('IMAGES_DIR', base_url('assets/images'));
	define('IMG_DIR', base_url('assets/admin/img'));
	define('CSS_DIR', base_url('assets/admin/css'));
	define('CSS_2_DIR', base_url('assets/css'));
	define('JS_DIR', base_url('assets/admin/js'));
	define('JS_2_DIR', base_url('assets/js'));
	define('FONTS_DIR', base_url('assets/admin/fonts'));
	define('LIB_YUI_DIR', base_url('assets/libraries/yui3-3.17.2'));
	
	if ($this->session->userdata('user_level')=='agent')
		redirect(base_url('index.php/agent/home'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Halaman Administrasi</title>

<script type="text/javascript">

    var base_url = '<?php echo base_url(); ?>';

</script>
<!--tambahanku -->
<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/bootstrap.css">
<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/font-awesome.css">
<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/animate.css">
<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/flexslider.css">
<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/style.css">
<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/custom.css">


<link rel="stylesheet" href="<?php echo CSS_DIR;?>/cms_tpl/cms.css" media="screen" type="text/css" />

<link rel="stylesheet" href="<?php echo CSS_DIR;?>/validationEngine.jquery.css" media="screen" type="text/css" />

<link rel="stylesheet" media="screen" type="text/css" href="<?php echo CSS_DIR;?>/datepicker/datePicker.css" />

<link rel="stylesheet" media="all" type="text/css" href="<?php echo CSS_DIR;?>/jquery-ui.css" />

<link rel="stylesheet" media="all" type="text/css" href="<?php echo CSS_DIR;?>/jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="<?php echo JS_DIR;?>/jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="<?php echo JS_DIR;?>/jquery-ui.min.js"></script>

<!--ngilangi grapik-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>

<!---->

<script type="text/javascript" src="<?php echo JS_DIR;?>/tiny_mce/jquery.tinymce.js"></script>



<script type="text/javascript" src="<?php echo JS_DIR;?>/face_date_min.js"></script>

<script src="<?php echo JS_DIR;?>/jquery-ui-timepicker-addon.js"></script>

<!--<script type="text/javascript" src="<?php echo JS_DIR;?>/jquery.datePicker-2.1.2.js"></script>-->



<script type="text/javascript" src="<?php echo JS_DIR;?>/cms.js"></script>

<script type="text/javascript" src="<?php echo JS_DIR;?>/jquery.validationEngine_min.js"></script>




<!--<script type="text/javascript" src="<?php echo JS_DIR;?>/jquery.calendrical.js"></script>

<link rel="stylesheet" href="<?php echo CSS_DIR;?>/calendrical.css" type="text/css" />-->

<!-- YUI Library -->
	<script src="http://yui.yahooapis.com/3.17.2/build/yui/yui-min.js"></script>
	<link rel="stylesheet" href="http://yui.yahooapis.com/3.17.2/build/cssgrids/cssgrids-min.css">
	<script src="<?php echo JS_2_DIR;?>/functions.js"></script>
	<link rel="stylesheet" href="<?php echo CSS_2_DIR;?>/style.css">
	
<script type="text/javascript">

$().ready(function() {
    $('.th_orderby').mouseover(function(){

        $('.search_bar').show();

    });

    $('.th_orderby').mouseout(function(){

        //$('.search_bar').hide();

    });

    $('.search_bar').mouseover(function(){

        $('.search_bar').show();

    });

    $('.search_bar').mouseout(function(){

        //$('.search_bar').hide();

    });

});





</script>



<script type="text/javascript">

	//Menggeser list menu kiri masuk ke kiri atau keluar ke kanan

	function slideMenu(){

		var m=$("#sliderLeftMenu").css('margin-left');

		if(m=='-250px'){

			$("#slidHandle").attr({title:"<-slidein"});

			$("#sliderLeftMenu").animate({marginLeft:'0px'},400);

			$("#mainpage").animate({marginLeft:'250px'},400);

		}else{

			$("#slidHandle").attr({title:"show->"});

			$("#sliderLeftMenu").animate({marginLeft:'-250px'},400);

			$("#mainpage").animate({marginLeft:'6px'},400);

		}

	}

	

	function selectLimenu(n,tab){

		var ml=$("#sliderLeftMenu").css('margin-left');

		$('#limenuX').remove();

		var me=$('#limenu'+n);

		var offset=me.offset();

		var topme=offset.top;

		$("#mainpage").animate({marginLeft:"2000px"},2800);

		$('body').css('overflow','hidden');

		$('#limenu'+n).after('<div class="limenux" style="top:'+topme+'px" id="limenuX">&nbsp;</div>');

		$('#limenuX').animate({"top":"230px","left":"600px",width: "400px", height: "40px", opacity: 0.7},500)

		.animate({"top":"90px","left":"252px",width: "80%", height: "83%", opacity: 0.1},800);

			setTimeout(function(){

				$('#limenuX').remove();	

				$("#mainpage").html('');

				$("#mainpage").show();	

				document.title ="halaman"+n;		

				$("#mainpage").css({'margin-left':ml});

				window.history.pushState({page: 1}, {title:"halamanBaru"}, "?cms/tab/"+tab+'/pg/'+n+'/');

				

				$.post('{BASE_URL}fromLeftMenu/',{'tab':tab,'idProNav':n},function(data){

					$('#content').html(data);

					autoSizePage();

					insearch();

					clickDel();

				});

				

			},1300);

	}

//fungsi mengambil URL==========================================================================

//var allVars = $.getUrlVars();  # seluruh alamat

//var allVars = $.getUrlVars()['me']; #mengambil variabel

$.extend({

  getUrlVars: function(){

    var vars = [], hash;

    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)

    {

      hash = hashes[i].split('=');

      vars.push(hash[0]);

      vars[hash[0]] = hash[1];

    }

    return vars;

  },

  getUrlVar: function(name){

    return $.getUrlVars()[name];

  }

});

//===================================================================================================



function autoSizePage(){

	var hpage=$(window).height();

	var wslider=$('#sliderLeftMenu').width();

	if(wslider==null) wslider=0;

	//$("#mainpage").css({'height':'auto','min-height':(hpage-115)+'px','margin-left': wslider+'px'});

	$("#mainpage").css({'height':'auto','min-height':(hpage-155)+'px','margin-left': wslider+'px'});

	$('body').css({'overflow':'auto'});

	var hdoc=$("#mainpage").height()+55;

	$('#sliderLeftMenu').height(hdoc+'px');

	

}

function nextMenu(li_ID,level){

	var d=$('#'+li_ID+' ul.sub'+level).css('display');

	if(d=='none'){

		$('#'+li_ID+' ul.sub'+level).slideDown(300);

	}else{

		$('#'+li_ID+' ul.sub'+level).slideUp(300);

	}

}

$(document).ready(function(){

	autoSizePage();

	$('body').css('overflow','auto');



/*	$('ul.sub0').sortable({ items: '.sortleftmenu'});

	$('ul.sub0').sortable( "option", "opacity", 0.6 );

	

	$('.sortleftmenu').mouseout(function(){

		var idn=$(this).get(0).id;

		listingNumMenu(idn);

	});*/



});



/*function listingNumMenuLi(getset){

	var ttl=$('li.sortleftmenu').size();

	var list='';

	for(var i=0; i<ttl; i++){			

		list+=$('li.sortleftmenu').get(i).id+'x';

	}

	$("#mainpage").text(list);

}

function listingNumMenu(getset){

	var ttl=$('ul.sortleftmenu').size();

	var list='';

	for(var i=0; i<ttl; i++){			

		list+=$('ul.sortleftmenu').get(i).id+'x';

	}

	$("#mainpage").text(list);

}*/

function addmemo(){

	$('#tulismemo').show(); 

	$('#mymemo').focus();

	$('#plusmemo').hide();

}

/*function simpanmemo(link_addr){

	var n=$('#memo').text();

	$.post('{BASE_URL}cms/plusmemo/add',{'memo':$('#mymemo').val(),'link_addr':link_addr},function(data){

		$('#isimemo').html(data);

		$('#tulismemo').hide(); 

		$('#plusmemo').show();

		$('#memo').text(n+1);

	});

	

}*/

/*function dellmemo(id){

	var c=confirm('Anda akan akan menghapus memo');	

	if(c){

		var n=$('#memo').text();

		$.post('{BASE_URL}cms/delmemo/'+id,{},function(data){

			if(data=='1'){

				$('#mm'+id).slideUp(300);

				$('#memo').text(n-1);	

			}

		});

	}

}*/

/*function deldata(tbl,id,db){

	var c=confirm('Apakah Anda benar-benar akan menghapus data tersebut \n Pilih OK jika ya atau pilih Cancel untuk membatalkan');

	if(c){

		document.location='{BASE_URL}cms/record/deldata/'+tbl+'/del/'+id+'/d_base/'+db;

	}else{

		return false;	

	}

}*/



/*function select_franchise(){

    var prefik = $('#db_select').val();

    $.post('{BASE_URL}hello_ajax/set_fr',{'prefik':prefik},function(data){

        if(data){location.reload();}

        

	});

}*/



$(function() {

	$( "#memoadm" ).draggable({ handle: "#headmemo" });



});





</script>

<script>$(document).ready(function() { $(".myform").validationEngine()});</script>





</head>

<body class="yui3-skin-sam">

<!--memo admin hide-->

<div id="memoadm" class="ui-widget-content">

  <div id="headmemo">Memo Admin<span class="f_btn" onclick="$('#memoadm').hide();">X</span></div>

  <div id="contentmemo">{MEMO_CONTENT}</div>

</div>

<!--header top-->

<div class="topheader" id="topheader"> 
	<span id="userlog">
		<!--<div id="memo" onclick="$('#memoadm').show()" title="memo admin">1</div>-->
		Hello, <?php echo $user_name;?>
		<a href="<?php echo base_url();?>index.php/admin/logout">Logout..!</a>
	</span> 
	<span id="logocms"><b>cms</b>one
	</span> 
</div>

<div class="tabmenu">
<span id="toptab">
<?php
	$uri2 = $this->uri->segment(2);
	echo ($uri2=='admin_page' ? '<span class="select">Home</span>': '<a href="'.base_url('index.php/admin/admin_page').'">Home</a>');
	echo ($uri2=='agent_page' ? '<span class="select">Agent Administration</span>': '<a href="'.base_url('index.php/admin/agent_page').'">Agen Administration</a>');
	echo ($uri2=='booking_page' ? '<span class="select">Booking</span>': '<a href="'.base_url('index.php/admin/booking_page').'">Booking</a>');
	echo ($uri2=='deposit_page' ? '<span class="select">Deposit</span>': '<a href="'.base_url('index.php/admin/deposit_page').'">Deposit</a>');
	echo ($uri2=='setting_page' ? '<span class="select">Setting</span>': '<a href="'.base_url('index.php/admin/setting_page').'">Setting</a>');
	echo ($uri2=='assets_page' ? '<span class="select">Assets</span>': '<a href="'.base_url('index.php/admin/assets_page').'">Assets</a>');
	echo ($uri2=='cashflow_page' ? '<span class="select">Cashflow</span>': '<a href="'.base_url('index.php/admin/cashflow_page').'">Cashflow</a>');
?>


<!--<a id="1" href="<?php echo base_url();?>index.php/admin/agent_page" >Agen Administration</a>
<a id="2" href="http://www.hellotraveler.co.id/cms/tb/2/">Booking</a>
<a id="3" href="http://www.hellotraveler.co.id/cms/tb/3/">Deposit</a>
<a id="4" href="http://www.hellotraveler.co.id/cms/tb/4/">Setting</a>
<a id="5" href="http://www.hellotraveler.co.id/cms/tb/5/">Cashflow</a>
<a id="13" href="http://www.hellotraveler.co.id/cms/tb/13/">Assets</a>-->
</span>
</div>

<div id="topspan"></div>
