// JavaScript Document

function scrollmn(idg,target){
	var cek= $('#'+idg+' .'+target).css('display');	
	$('.subsettopmenu').slideUp('30');
	$('.subsetleftmenu').slideUp('30');

	if(cek=='none'){
		$('#'+idg+' .'+target).css('display','block');
		$('#'+idg+' .'+target).slideDown('100');
		$('#'+idg+' div.desc').addClass('asc');
		$('#'+idg+' div.desc').removeClass('desc');
		$('#'+idg+' div.drobtop').show();
	
	}else{
		$('#'+idg+' .'+target).slideUp('30');
		$('#'+idg+' div.asc').addClass('desc');
		$('#'+idg+' div.asc').removeClass('asc');
		$('#'+idg+' div.drobtop').hide();
	}

}
function slider(posx,navid,boxid){

	$('#itemgal'+boxid).animate({left: posx,opacity: 0.4},700).animate({opacity: 1},50);
	$('#boxnavi'+boxid+' div.navi').removeClass('select');
	$('#boxnavi'+boxid+' #nav'+navid).addClass('select');
		var posboxid=$('#boxnavi'+boxid+' #nav'+navid).width();
	$('#framesel'+boxid).animate({left:((posboxid+22)*navid)+'px'},500);
	
}
function navgall(to,tid,perx){
	var posx=$('#boxnavi'+tid).css('left');
	var widthNav=$('#boxnavi'+tid).width();
	var widthPalet=$('#paletnav'+tid).width();
	var jump = parseInt(widthPalet/perx)/2;
	jump = Math.ceil(jump)+1;
	//alert(jump);
	if(to=='prev'  && parseInt(posx)<0 ){
		var tox = parseInt(posx) + (parseInt(perx)*jump);
	}
	if(to=='next' && parseInt(posx)>(parseInt(widthNav)-parseInt(widthPalet))*-1){
		var tox = parseInt(posx) - (parseInt(perx)*jump);
	}
	$('#boxnavi'+tid).animate({left:tox+'px'},700);
}

function galleryStrip(idbox,imgid){
	setTimeout(function(){
		var newid=parseInt(imgid)+1;
		$.get('?p=gallery',{'target':'flipgal','indexnow':newid},function(data){
			$('#itemgal'+idbox).prepend(data); 
			var wi=($('#item'+parseInt(imgid)+' img').width()*4)/4;
			var hi=($('#item'+parseInt(imgid)+' img').height()*4)/4;
			$('#item'+parseInt(imgid)+' img').animate({width:'400px',height:'300px',left:'-100px',top:'-100px',opacity:0},3000);
			setTimeout(function(){
				$('#item'+parseInt(imgid)).remove();		
			},3100);
			//alert(data);
			if(!data)newid='0';
			galleryStrip(idbox,newid);
		});
	},5000);
}