// JavaScript Document

	function zebra(tabel_id,row1,row2){
	var total=$(tabel_id+' tr').size();
	var cek=''; //hanya untuk
	var idname='';
		for(var i=0; i<total; i++){
			idname=$(tabel_id+' tr').get(i).id;
			if(idname){
				if((i%2)==0){
				//	cek+='#'+idname+' '+i+' '+row1+' | '; //cek
					$('#'+idname+' td').removeClass(row1);
					$('#'+idname+' td').removeClass(row2);
					$('#'+idname+' td').addClass(row1);
				}else{
					//cek+='#'+idname+' '+i+' '+row2+' | '; //cek
					$('#'+idname+' td').removeClass(row1);
					$('#'+idname+' td').removeClass(row2);
					$('#'+idname+' td').addClass(row2);
				}
			}
		}
		//$('#cek').text(cek);
	}

	function tr2id(tabel_id,url){
		var total=$(tabel_id+' tr').size();
		var idname='';
		for(var i=0; i<total; i++){
			idname=$(tabel_id+' tr').get(i).id;
			if(idname){
				$('#'+idname+' td.go_url').click(function(){
					var myid=$(this).parent().get(0).id;
					var myname=$('#tr'+myid).text();
					//alert(myid);
					document.location=url+myname;
				});
			}
		}
	}

	function list_from_tabel(gourl,myinput,idtarget_output){
		var myid=$('#'+myinput).val();
		//alert(idtarget_output);
		$('#'+idtarget_output).html('<div class="loading"><img src="images/loader.gif" alt="loading" /></div>');
		$.get(gourl+myid,{},function(data){
			$('#'+idtarget_output).html(data);
		});
	}

	function auto_width(acuan,pengikut){
		var widthacuan = $(acuan).width();
		//var window_width = ($(window).width()-widthacuan)/2;
		$(pengikut).css({'width':widthacuan});

	}
	function selecttab(myid){
		$('ul.tabgroup li').removeClass('select');
		$('div.contentTab').css({'display':'none'});
		$('#tabnav'+myid).addClass('select');
		$('#content_tab'+myid).css({'display':'block'});
	}
	function delall(id,url){

		var total = $('input.del_all:checked').size();
		if(total==0){
			alert ('Tidak ada data yang dipilih...!');
			return false;
		}

		var c = confirm('apakah anda benar-benar akan menghapus beberapa data berikut...?');
		if(c){
			var myid='';
			for(var i=0; i<total; i++){
				myid+=$('input.del_all:checked').get(i).value;
			}
			document.location='?/record/delall/'+id+'/in/'+myid+'/oriuri/'+url;
		}else{
			return false;
		}
	}
function formatCurrency(num) {
	num = num.toString().replace(/\$|\,/g,'');
	num = num.split(' ');
	num = num.join('');
	if(isNaN(num))
	num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10) cents = "0" + cents;

	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++){
		num = num.substring(0,num.length-(4*i+3))+','+
		num.substring(num.length-(4*i+3));
	}
	return (((sign)?'':'-') + ' ' + num + '.' + cents);
}

function str_replace(kalimat, kata, pengganti) {
	var temp = kalimat.split(kata);
	return temp.join(pengganti);
}

function toNumber(num){
	var snum = num.toString().split(',');
		snum = snum.join('');
	return Number(snum);
}
$(document).ready(function(){

	 auto_width('table.mytable','div.paging');
	 $('#search').css({'color':'#bbb'});
	 $('#search').focus(function(){
		var val=$(this).val();
		 if(val=='Search'){
			$(this).val('');
		 }
		 $('#search').css({'color':'#444'});
	 });
	 $('#search').blur(function(){
		var val=$(this).val();
		 if(val==''){
			$(this).val('Search');
			$('#search').css({'color':'#bbb'});
		 }
	 });
	 $('#fsearch').submit(function(){
		var keyword = $('#search').val();
		if(keyword == null || keyword=='Search'){
			alert('Search what...?');
			$('#search').focus();
			return false;
		}else{
			return true;
		}
	 });
});