$.fn.imgdata = function(key){
	return this.find('.dataImg li:eq('+key+')').text();
}
$.fn.hdata = function(key){
	return this.find('.dataSet li:eq('+key+')').text();
}
var buttonActions = {
	  'close_windows':function(){
		  $.fancybox.close(); 
		  ResetForm();
	}	
}

var icon_path = base_url + 'css/cms_tpl/images/';

$(document).ready(function(){	
	// NewsUpdate
	$('#news_update').vTicker({ 
		speed: 500,
		pause: 3000,
		animation: 'fade',
		mousePause: true,
		showItems: 2
	});
	
	$('.data_table').dataTable({
	"sDom": 'fCl<"clear">rtip',
	"sPaginationType": "full_numbers" ,
    "bLengthChange": false,
    "bPaginate": false,
    "bSort":false,
	// "aaSorting": [],
	  //"aoColumns": [{ "bSortable": false },null,null,null,{ "bSortable": false },{ "bSortable": false }]
	});
	
	// WYSIWYG Editor
	$("#editor,#editor2").cleditor();	
	
	// Form validationEngine
	$('form#validation').validationEngine();		
	$('form#validation_demo').validationEngine();	
	
	// Input filter
	$('.numericonly input').autotab_magic().autotab_filter('numeric');
	$('.textonly input').autotab_magic().autotab_filter('text');
	$('.alphaonly input').autotab_magic().autotab_filter('alpha');
	$('.regexonly input').autotab_magic().autotab_filter({ format: 'custom', pattern: '[^0-9\.]' });
	$('.alluppercase input').autotab_magic().autotab_filter({ format: 'alphanumeric', uppercase: true });
	
});	


$(function() {		
	LResize();	
	$(window).resize(function(){LResize(); Processgraph(); });
    $(window).scroll(function (){ scrollmenu(); });
		
	  //Close_windows
	  $('.butAcc').live('click',function(e){				   
			  if(buttonActions[this.id]){
				  buttonActions[this.id].call(this);
			  }
			  e.preventDefault();
	  });
	  
	 //exam ui slider element
	  $( "#slider-range-min" ).slider({
			range: "min",
			value: 212,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( "#amount" ).text( "$" + ui.value );
			}
		});
		$( "#amount" ).text( "$" + $( "#slider-range-min" ).slider( "value" ) );
		
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 75, 300 ],
			slide: function( event, ui ) {
				$( "#amount2" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount2" ).text( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		
		$( "#slider" ).slider({
			value:100,
			min: 0,
			max: 500,
			step: 50,
			slide: function( event, ui ) {
				$( "#amount3" ).text( "$" + ui.value );
			}
		});
	$( "#amount3" ).text( "$" + $( "#slider" ).slider( "value" ) );
	$( "#eq > span" ).each(function() {
		// read initial values from markup and remove that
		var value = parseInt( $( this ).text(), 10 );
		$( this ).empty().slider({
			value: value,
			range: "min",
			animate: true,
			orientation: "vertical"
		});
	});
	$( "#red, #green, #blue" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 255,
		value: 127,
		slide: refreshSwatch,
		change: refreshSwatch
	});
	$( "#red" ).slider( "value", 190 );
	$( "#green" ).slider( "value", 221 );
	$( "#blue" ).slider( "value", 23 );
	  
	  
	  
  	//datepicker
	

	$("input.date_picker").datepicker({ 
		autoSize: true,
		dateFormat: 'dd-mm-yy'
	});
	$( "div.datepickerInline" ).datepicker({ 
		dateFormat: 'dd-mm-yy',
		numberOfMonths: 1
	});	
	$( "input.birthday" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd'
    });
	

	//datetimepicker
   $("#datetimepicker").datetimepicker();
   $('#timepicker').timepicker({});
   

	//Button Click  Ajax Loading
	$('.loading').live('click',function() { 
		  var str=$(this).attr('title'); 
		  var overlay=$(this).attr('rel'); 
		  loading(str,overlay);
		  setTimeout("unloading()",1500); 
	  });
	$('#preloader').live('click',function(){
			unloading();
	 });
	

$('.searchAutocomplete').click(function() {
 $('.searchText').toggle('slow', function() {
    // Animation complete.
  });
});
	// Submit Form 
	$('a.submit_form').live('click',function(){
		  var form_id=$(this).parents('form').attr('id');
		  $("#"+form_id).submit();
	})	

	// Logout Click  
	$('.logout').live('click',function() { 
		  var str="Logout"; 
		  var overlay="1"; 
		  loading(str,overlay);
          
          
		  setTimeout("unloading()",1500);
		  setTimeout( "window.location.href='"+base_url+"cms/logout/'", 2000 );
	  });
		
	// Wizard Steps 
	// $('#wizard').smartWizard();
	 // $('#wizardvalidate').smartWizard();
	 
	 
	// Tipsy Tootip
	$('.tip a ').tipsy({gravity: 's',live: true});	
	$('.ntip a ').tipsy({gravity: 'n',live: true});	
	$('.wtip a ').tipsy({gravity: 'w',live: true});	
	$('.etip a,.Base').tipsy({gravity: 'e',live: true});	
	$('.netip a ').tipsy({gravity: 'ne',live: true});	
	$('.nwtip a  ').tipsy({gravity: 'nw',live: true});	
	$('.swtip a,.iconmenu li a ').tipsy({gravity: 'sw',live: true});	
	$('.setip a ').tipsy({gravity: 'se',live: true});	
	$('.wtip input').tipsy({ trigger: 'focus', gravity: 'w',live: true });
	$('.etip input').tipsy({ trigger: 'focus', gravity: 'e',live: true });
	$('.iconBox, div.logout').tipsy({gravity: 'ne',live: true });	

    
 function Processgraph(){
	var 	bar = $('.bar'), bw = bar.width(), percent = bar.find('.percent'), circle = bar.find('.circle'), ps =  percent.find('span'),
		cs = circle.find('span'), name = 'rotate';
			var t = $('#pct'), val = t.val();
			if(val){ 
				val = t.val().replace("%", "");

			if (val >=0 && val <= 100){
				var w = 100-val, pw = (bw*w)/100,
					pa = {  	width: w+'%' },
					cw = (bw-pw), ca = {	"left": cw }
				ps.animate(pa);
				cs.text(val+'%');
				circle.animate(ca, function(){
					circle.removeClass(name)
				}).addClass(name);	
			} else {
				alert('range: 0 - 100');
				t.val('');
			}
		}
	}
	
	
	// Sortable
	$("#picThumb").sortable({
		opacity: 0.6,handle : '.move', connectWith: '.picThumbUpload', items: '.picThumbUpload'
	});
	$("#main_menu").sortable({
		opacity: 0.6,connectWith: '.limenu',items: '.limenu'		
	});
	$( "#sortable" ).sortable({
		opacity: 0.6,revert: true,cursor: "move", zIndex:9000
	});
	

    // Effect 
	$('.SEclick, .SEmousedown, .SEclicktime,.SEremote,.SEremote2,.SEremote3,.SEremote4').jrumble();
	$('.SE').jrumble({
		x: 2,
		y: 2,
		rotation: 1
	});
	
	$('.alertMessage.error ').jrumble({
		x: 10,
		y: 10,
		rotation: 4
	});
	
	$('.alertMessage.success').jrumble({
		x: 4,
		y: 0,
		rotation: 0
	});
	
	$('.alertMessage.warning').jrumble({
		x: 0,
		y: 0,
		rotation: 5
	});
/*
	$('.SE').hover(function(){
		$(this).trigger('startRumble');
	}, function(){
		$(this).trigger('stopRumble');
	});

	$('.SEclick').toggle(function(){
		$(this).trigger('startRumble');
	}, function(){
		$(this).trigger('stopRumble');
	});
	
	$('.SEmousedown').bind({
		'mousedown': function(){
			$(this).trigger('startRumble');
		},
		'mouseup': function(){
			$(this).trigger('stopRumble');
		}
	});
	
	$('.SEclicktime').click(function(){
		var demoTimeout;
		$this = $(this);
		clearTimeout(demoTimeout);
		$this.trigger('startRumble');
		demoTimeout = setTimeout(function(){$this.trigger('stopRumble');}, 1500)
	});
	$('.SEremote').hover(function(){
		$('.SEremote2').trigger('startRumble');
	}, function(){
		$('.SEremote2').trigger('stopRumble');
	});
	
	$('.SEremote2').hover(function(){
		$('.SEremote').trigger('startRumble');
	}, function(){
		$('.SEremote').trigger('stopRumble');
	})

	$('.SEremote3').hover(function(){
		$('.alertMessage').trigger('startRumble');
	}, function(){
		$('.alertMessage').trigger('stopRumble');
	})

	$('.SEremote4').hover(function(){
		$('.alertMessage.error').trigger('startRumble');
	}, function(){
		$('.alertMessage.error').trigger('stopRumble');
	})

// */
	// Dual select boxes
	$.configureBoxes();
	
	// Textareaelastic
	$('#Textareaelastic').elastic();
	
	// Textarea limit
	 $('#Textarealimit').limit('140','.limitchars');
	
	// placeholder text 
	$('input[placeholder], textarea[placeholder]').placeholder();
	
	// Checkbox 
	$('.ck').customInput();	
	
	// Checkbox Limit
	$('.limit3m').limitInput({max:3,disablelabels:true});
	
	// Select boxes
	//$("select").not("select.chzn-select,select[multiple],select#box1Storage,select#box2Storage,select#maker,select#model,select#feature").selectBox();


	// Select boxes in Data table
	$(".dataTables_wrapper .dataTables_length select").addClass("small");
	$("table tbody tr td:first-child .custom-checkbox:first-child").css("margin: 0px 3px 3px 3px");
	
	 // Mutiselection
	$(".chzn-select").chosen({ search_contains: true }); 
	
	// Checkbox iphoneStyle
	$(".on_off_checkbox").iphoneStyle();  // Label On / Off
	
	$(".show_email").iphoneStyle({  //  Custom Label 
		  checkedLabel: "show Email",
		  uncheckedLabel: "Don't show ",
		  labelWidth:'85px'
	}); 
	$(".preOrder").iphoneStyle({  //  Custom Label 
		  checkedLabel: "in stocks",
		  uncheckedLabel: "out stocks",
		  labelWidth:'76px'
	}); 
	$(".online").iphoneStyle({  //  Custom Label 
		  checkedLabel: "online",
		  uncheckedLabel: "offline ",
		  labelWidth:'55px'
	}); 
	$(".show_conmap").iphoneStyle({ //  Custom Label  With  onChange function
		  checkedLabel: "show map",
		  uncheckedLabel: "Don't show ",
		  labelWidth:'85px',
		  onChange: function() {
				var chek=$(".show_conmap").attr('checked');
					  if(chek){
						  $(".disabled_map").fadeOut();
					  }else{
						 $(".disabled_map").fadeIn();
					  }
		}
	});


	 // Checkbox  All in Data Table
	$(".checkAll").live('click',function(){
		  var table=$(this).parents('table').attr('id');
		  var checkedStatus = this.checked;
		  var id= this.id;
		 $( "table#"+table+" tbody tr td:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
			 var id= this.id;
				if (this.checked) {
					$(this).attr('checked', $('#' + id).is(':checked'));
				}else{
					$(this).attr('checked', $('#' + id).is(''));
					}
		});	 
	});		
	
	
	// ShowCode 
	$('.showCode').sourcerer('js html css php'); 
	$('.showCodeJS').sourcerer('js'); 
	$('.showCodeHTML').sourcerer('html'); 
	$('.showCodePHP').sourcerer('php'); 
	$('.showCodeCSS').sourcerer('css'); 
	
	// icon  gray Hover
	$('.iconBox.gray').hover(function(){
		  var name=$(this).find('img').attr('alt');
		  $(this).find('img').animate({ opacity: 0.5 }, 0, function(){
			    $(this).attr('src',icon_path+name+'.png').animate({ opacity: 1 }, 700);									 
		 });
	},function(){
		  var name=$(this).find('img').attr('alt');
		  $(this).find('img').attr('src',icon_path+name+'.png');
	 })
	
	// Animation icon  Logout 
	$('div.logout').hover(function(){
		  var name=$(this).find('img').attr('alt');
		  $(this).find('img').animate({ opacity: 0.4 }, 200, function(){
			    $(this).attr('src',icon_path+name+'.png').animate({ opacity: 1 }, 500);									 
		 });
	},function(){
		  var name=$(this).find('img').attr('name');
		  $(this).find('img').animate({ opacity: 0.5 }, 200, function(){
			    $(this).attr('src',icon_path+name+'.png').animate({ opacity: 1 }, 500);									 
		 });
	 })
	
	// Animation icon  setting 
	$('div.setting').hover(function(){
		$(this).find('img').addClass('gearhover');
	},function(){
		$(this).find('img').removeClass('gearhover');
	 })
	
	// shoutcutBox   Hover
	$('.shoutcutBox').hover(function(){
		  $(this).animate({ left: '+=15'}, 200);
	},function(){
		$(this).animate({ left: '0'}, 200);
	 })
     
	

	// hide notify  Message with click
	$('#alertMessage').live('click',function(){
	  $(this).stop(true,true).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });						 
	});
	
	// jScrollPane  Overflow
	$('#albumsList,.albumpics,.overflow,.todate').jScrollPane({ autoReinitialise: true });

	// images hover
	$('.picHolder,.SEdemo').hover(
		  function() {
			  $(this).find('.picTitle').fadeTo(200, 1);
		  },function() {
			  $(this).find('.picTitle').fadeTo(200, 0);
		  }
	  )	
		  
				  
	
	// Conversation box tool
	$('.msg').live({
        mouseenter: function(){
			$(this).find('.toolMsg').show();
           },mouseleave: function(){
			$(this).find('.toolMsg').hide();
           }
       }
    );
	

	// filemanager. 
	// onload
	$('#finder').elfinder({
		url : 'components/elfinder/connectors/php/connector-fileimport.php',
		docked : true,dialog : { title : 'File manager',modal : true,width : 700 }
	})
	// on click
	$('#filemanager').click(function(){	
		  var callback=$(this).attr('id');
		  var type=$(this).attr('title');
		  fileDialog(callback,type);					   
	});
	// on click callback
	$('#open_icon,#open_icon2,#open_icon3').click(function(){	
		  var callback=$(this).attr('id');
		  var type=$(this).attr('title');
		   var input=$(this).attr('rel');
		  fileDialogCallback(callback,type,input);					   
	});
	// on focus  callback
	$('.fileDialog').live('focus',function(){
		  var callback,input =$(this).attr('id');
		  var type=$(this).attr('title');
		  fileDialogCallback(callback,type,input);										
	})


	// Confirm Delete.
	$(".Delete").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
		  Delete(data,name,row,0,dataSet);
	});
	$(".DeleteAll").live('click',function() {			
		  var rel=$(this).attr('rel');	
		  var row=$(this).parents('.tab_content').attr('id');	
		  var row=row+' .load_page ';
		  if(!rel) { 
			  var rel=0;
			  var row=$('#load_data').attr('id');	 
		  }  
		  var dataSet=$('form:eq('+rel+')');					   
		  var	data=$('form:eq('+rel+')').serialize();
		  var name = 'All File Select';
		 Delete(data,name,row,2,dataSet);
	});
	 // Drag & Drop  Delete images 
	$('.deletezone').droppable({
		hoverClass: 'deletezoneover',
		activeClass: 'deletezonedragging',
		drop:function(event,ui){	

		   var datavalue='id='+ ui.draggable.imgdata(0)+'&albumid='+ ui.draggable.imgdata(2); 
		   var name =ui.draggable.imgdata(1); 

		$.confirm({
		'title': 'DELETE DIALOG BOX','message': "<strong>YOU WANT TO DELETE </strong><br /><font color=red>' "+ name +" ' </font> ",'buttons': {'Yes': {'class': 'special',
		'action': function(data){
					loading('Deleting',1);
					setTimeout("unloading();",900); 
			}},'No'	: {'class'	: ''}}});
		},
		tolerance:'pointer'
	});
	

    function showTooltip(x, y, contents) {
        $('<div id="tooltip" >' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y -13,
            left: x + 10
        }).appendTo("body").show();
    }

    var previousPoint = null;
    $(".chart_flot").bind("plothover", function(event, pos, item) {
												
        $("#x").text(pos.x);
        $("#y").text(pos.y);

        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

			$(this).attr('title',item.series.label);
			$(this).trigger('click');
                $("#tooltip").remove();
                var x = item.datapoint[0],
                    y = item.datapoint[1];

                showTooltip(item.pageX, item.pageY, "<b>" + item.series.label + "</b> : " + y);
            }
        }  else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
	
	
	});		


	// Check browser fixbug
	var mybrowser=navigator.userAgent;
	if(mybrowser.indexOf('MSIE')>0){$(function() {	
			   $('.formEl_b fieldset').css('padding-top', '0');
				$('div.section label small').css('font-size', '10px');
				$('div.section  div .select_box').css({'margin-left':'-5px'});
				$('.iPhoneCheckContainer label').css({'padding-top':'6px'});
				$('.uibutton').css({'padding-top':'6px'});
				$('.uibutton.icon:before').css({'top':'1px'});
				$('.dataTables_wrapper .dataTables_length ').css({'margin-bottom':'10px'});
		});
	}
	if(mybrowser.indexOf('Firefox')>0){ $(function() {	
			   $('.formEl_b fieldset  legend').css('margin-bottom', '0px');	
			   $('table .custom-checkbox label').css('left', '3px');
		  });
	}	
	if(mybrowser.indexOf('Presto')>0){
		$('select').css('padding-top', '8px');
	}
	if(mybrowser.indexOf('Chrome')>0){$(function() {	
				 $('div.tab_content  ul.uibutton-group').css('margin-top', '-40px');
				  $('div.section  div .select_box').css({'margin-top':'0px','margin-left':'-2px'});
				  $('select').css('padding', '6px');
				  $('table .custom-checkbox label').css('left', '3px');
		});
	}		
	if(mybrowser.indexOf('Safari')>0){}		

	  
	  function fileDialogCallback(callback,type,input){
			$('<div id="finder_'+callback+'"/>').elfinder({
				 url : 'components/elfinder/connectors/php/connector-'+type+'.php', editorCallback : function(url) { $('#'+input).val(url);
				},closeOnEditorCallback : true, dialog : { title : 'File manager',modal : true,width : 700 }
			})							   
	  }
	  function fileDialog(callback,type){
			$('<div id="finder_'+callback+'"/>').elfinder({
				  url : 'components/elfinder/connectors/php/connector-'+type+'.php',dialog : { title : 'File manager',modal : true,width : 700 }
			})							   
	  }
		  
		  
		function Delete(data,name,row,type,dataSet){
				var loadpage = dataSet.hdata(0);
				var url = dataSet.hdata(1);
				var table = dataSet.hdata(2);
				var data = data+"&tabel="+table;
		$.confirm({
		'title': '_DELETE DIALOG BOX','message': " <strong>YOU WANT TO DELETE </strong><br /><font color=red>' "+ name +" ' </font> ",'buttons': {'Yes': {'class': 'special',
		'action': function(){
					loading('Checking');
									 $('#preloader').html('Deleting...');
									 if(type==0){ row.slideUp(function(){   showSuccess('Success',5000); unloading(); }); return false;}
									  if(type==1){ row.slideUp(function(){   showSuccess('Success',5000); unloading(); }); return false;}
										setTimeout("unloading();",900); 		 
						 }},'No'	: {'class'	: ''}}});}
	  
	  
	  function ResetForm(){
		  $('form').each(function(index) {	  
			var form_id=$('form:eq('+index+')').attr('id');
				  if(form_id){ 
					  $('#'+form_id).get(0).reset(); 
					  $('#'+form_id).validationEngine('hideAll');
							  var editor=$('#'+form_id).find('#editor').attr('id');
							  if(editor){
								   $('#editor').cleditor()[0].clear();
							  }
				  } 
		  });	
	  }


	function hexFromRGB(r, g, b) {
		var hex = [
			r.toString( 16 ),
			g.toString( 16 ),
			b.toString( 16 )
		];
		$.each( hex, function( nr, val ) {
			if ( val.length === 1 ) {
				hex[ nr ] = "0" + val;
			}
		});
		return hex.join( "" ).toUpperCase();
	}
	function refreshSwatch() {
		var red = $( "#red" ).slider( "value" ),
			green = $( "#green" ).slider( "value" ),
			blue = $( "#blue" ).slider( "value" ),
			hex = hexFromRGB( red, green, blue );
		$( "#swatch" ).css( "background-color", "#" + hex );
	}
	
	  function showError(str,delay){	
		  if(delay){
			  $('#alertMessage').removeClass('success info warning').addClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  	$('#alertMessage').addClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }
	  function showSuccess(str,delay){
		  if(delay){
			  $('#alertMessage').removeClass('error info warning').addClass('success').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  $('#alertMessage').addClass('success').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }
	  function showWarning(str,delay){
		  if(delay){
			  $('#alertMessage').removeClass('error success  info').addClass('warning').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  $('#alertMessage').addClass('warning').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }
	  function showInfo(str,delay){
		  if(delay){
			  $('#alertMessage').removeClass('error success  warning').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  $('#alertMessage').addClass('info').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }
	  
	  function loading(name,overlay) { 
			$('body').append('<div id="overlay"></div><div id="preloader">'+name+'..</div>');
					if(overlay==1){
					  $('#overlay').css('opacity',0.4).fadeIn(400,function(){  $('#preloader').fadeIn(400);	});
					  return  false;
			   }
			$('#preloader').fadeIn();	  
	   }
	   
	  function unloading() { 
			$('#preloader').fadeOut(400,function(){ $('#overlay').fadeOut(); $.fancybox.close(); }).remove();
	   }
	
	   function imgRow(){	
			  var maxrow=$('.albumpics').width();
			  if(maxrow){
					  maxItem= Math.floor(maxrow/160);
					  maxW=maxItem*160;
					  mL=(maxrow-maxW)/2;
					  $('.albumpics ul').css({
							  'width'	:	maxW	,
							  'marginLeft':mL
			   })
		  }}	
		  
		  function scrollmenu(){	
				  if($(window).scrollTop()>=1){			   
					$("#header ").css("z-index", "50"); 
				}else{
					$("#header ").css("z-index", "47"); 
			   }
		  }

 function LResize(){	
  imgRow(); 
  scrollmenu();
	$("#shadowhead").show();
		if($(window).width()<=480) {
					$(' .albumImagePreview').show();
					$('.screen-msg').hide();
					$('.albumsList').hide();
		}
		if($(window).width()<=768){
			$('body').addClass('nobg');
			$('#content').css({ marginLeft: "70px" });	
			$('#main_menu').removeClass('main_menu').addClass('iconmenu');
					$('#main_menu li').each(function() {	  
							var title=$(this).find('b').text();
							$(this).find('a').attr('title',title);		
					});
					$('#main_menu li a').find('b').hide();	
					$('#main_menu li ').find('ul').hide();
		}else{
			$('body').removeClass('nobg').addClass('dashborad');
			$('#content').css({ marginLeft: "240px" });	
			$('#main_menu').removeClass('iconmenu ').addClass('main_menu');
			$('#main_menu li a').find('b').show();	
			}
		if($(window).width()>1024) {
				//	$('#main_menu').removeClass('iconmenu ').addClass('main_menu');
				//	$('#main_menu li a').find('b').show();	
		}
}
