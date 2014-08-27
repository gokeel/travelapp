// JavaScript Document
$(document).ready(function() {
	//clickDel();
	//auto_width('table.mytable', 'div.paging');
	//insearch();
});

function popup_property(id) {
	var myfn = $('#fn' + id).val();
	$('#poptmp').remove();
	var wh = $(window).height();
	var td = $('#td' + id);
	var offset = td.offset();
	var ot = offset.top - 20;
	var dinamic = (offset.top - wh);
	var cek = ((offset.top + wh) / dinamic);
	var inputID = $('#input' + id).val();
	$('#tr' + id).addClass('selectrow');
	var header = '<div class="headbox">' + inputID + '<input type="button" class="mybutton2" style="float:right; margin:-2px;' + ' padding:1px 3px 1px 3px;" value="X" name="cancel" onclick="$(\'#poptmp\').hide(); $(\'#tr' + id + '\').removeClass(\'selectrow\');"></div>';
	if (dinamic + 100 >= 3) {
		ot -= (140 - cek);
		if (ot < 0) {
			ot = offset.top - 100;
		}
	}
	$.post(base_url + 'ajax/get_popup_property/', {
		'idfield': id,
		'type': inputID,
		'myfn': myfn
	}, function(data) {
		$(td).append('<div id="poptmp" style="left:' + ((offset.left) - 380) + 'px; top:' + ot + 'px">' + header + '<div style="padding:5px;">' + data + '</div></div>');
	});
}

function setHelp(id) {
	var myfn = $('#fn' + id).val();
	$('#poptmp').remove();
	var wh = $(window).height();
	var td = $('#tdhm' + id);
	var offset = td.offset();
	var ot = offset.top - 20;
	var dinamic = (offset.top - wh);
	var cek = ((offset.top + wh) / dinamic);
	var inputID = $('#ttl' + id).val();
	var inputHM = $('#hm' + id).val();
	$('#tr' + id).addClass('selectrow');
	var header = '<div class="headbox">Help ' + inputID + '<input type="button" class="mybutton2" style="float:right; margin:-2px;' + ' padding:1px 3px 1px 3px;" value="X" name="cancel" onclick="$(\'#poptmp\').hide(); $(\'#tr' + id + '\').removeClass(\'selectrow\');"></div>';
	if (dinamic + 100 >= 3) {
		ot -= (140 - cek);
		if (ot < 0) {
			ot = offset.top - 100;
		}
	}
	var input = '<textarea id="settohelp" style="height:40px; width:330px;">' + inputHM + '</textarea> <input type="button"' + 'class="mybutton2" style="float:right; margin:3px; padding:1px 3px 1px 3px;" value="Add" name="add"' + 'onclick="$(\'#poptmp\').hide(); $(\'#hm' + id + '\').val($(\'#settohelp\').val()); $(\'#tr' + id + '\').removeClass(\'selectrow\');">';
	$(td).append('<div id="poptmp" style="left:' + ((offset.left) - 380) + 'px; top:' + ot + 'px; height:110px;">' + header + '<div style="padding:5px;">' + input + '</div></div>');
}

function selectdb(id, protab) {
	$.post(base_url + 'ajax/get_popup_selectdb/', {
		'id': id,
		'protab': protab
	}, function(data) {
		$('#listtb').html(data);
	});
}

function selecttabel(tabname, idProp) {
	var db = $('#oper0').val();
	$.post(base_url + 'ajax/get_popup_selecttabel/', {
		'tabname': tabname,
		'idProtab': idProp,
		'db': db
	}, function(data) {
		$('#listfrom').html(data);
	});
}

function selecttabel2(tabname) {
	$.post(base_url + 'ajax/get_selecttabel/', {
		'tabname': tabname
	}, function(data) {
		$('#sub_select').html(data);
	});
}

function open_relation(nilai) {
	if (nilai == '') {
		$('tr.relasi').hide();
		$('#oper5').val('');
	} else {
		$('tr.relasi').show();
	}
}

function setvalue(id) {
	var setval = '';
	var koma = '';
	for (var i = 0; i <= 6; i++) {
		if ($('#oper' + i).val()) {
			setval += koma + $('#oper' + i).val();
			koma = ',';
		}
	}
	$('#fn' + id).val(setval);
	$('#poptmp').remove();
	$('#tr' + id).removeClass('selectrow');
}

function str_replace(asli, penganti, kalimat) {
	var temp = kalimat.split(asli);
	return temp.join(penganti);
}
// JavaScript Document

function zebra(tabel_id, row1, row2) {
	var total = $(tabel_id + ' tr').size();
	var cek = ''; //hanya untuk 
	var idname = '';
	for (var i = 0; i < total; i++) {
		idname = $(tabel_id + ' tr').get(i).id;
		if (idname) {
			if ((i % 2) == 0) {
				//	cek+='#'+idname+' '+i+' '+row1+' | '; //cek
				$('#' + idname + ' td').addClass(row1);
			} else {
				//cek+='#'+idname+' '+i+' '+row2+' | '; //cek
				$('#' + idname + ' td').addClass(row2);
			}
		}
	}
	//$('#cek').text(cek);
}

function zebrali(tabel_id, row1, row2) {
	var total = $(tabel_id + ' li').size();
	var cek = ''; //hanya untuk 
	var idname = '';
	for (var i = 0; i < total; i++) {
		idname = $(tabel_id + ' li').get(i).id;
		if (idname) {
			if ((i % 2) == 0) {
				cek += idname + '|'; //cek
				$(tabel_id + ' #' + idname).removeClass(row2).addClass(row1);
			} else {
				cek += idname + '|'; //cek
				$(tabel_id + ' #' + idname).removeClass(row1).addClass(row2);
			}
			$(tabel_id + ' #' + idname + ' .lisnum').html(i + 1);
		}
	}
	//$('#cek').text(cek);
	return cek;
}

function tr2id(tabel_id, url) {
	var total = $(tabel_id + ' tr').size();
	var idname = '';
	for (var i = 0; i < total; i++) {
		idname = $(tabel_id + ' tr').get(i).id;
		if (idname) {
			$('#' + idname + ' td.go_url').click(function() {
				var myid = $(this).parent().get(0).id;
				var myname = $('#tr' + myid).text();
				//alert(myid);
				document.location = url + myname;
			});
		}
	}
}

function list_from_tabel(gourl, myinput, idtarget_output) {
	var myid = $('#' + myinput).val();
	var form = $('.myform').attr('id');
	//alert(idtarget_output);
	$('#' + idtarget_output).html('<div class="loading"><img src="images/loader.gif" alt="loading" /></div>');
	$.get(gourl + myid, {
		'form': form
	}, function(data) {
		$('#' + idtarget_output).html(data);
	});
}

function auto_width(acuan, pengikut) {
	var widthacuan = $(acuan).width();
	//var window_width = ($(window).width()-widthacuan)/2;
	$(pengikut).css({
		'width': widthacuan
	});
}

function selecttab(myid) {
	$('ul.tabgroup li').removeClass('select');
	$('div.contentTab').css({
		'display': 'none'
	});
	$('#tabnav' + myid).addClass('select');
	$('#content_tab' + myid).css({
		'display': 'block'
	});
}

function delall(id, url) {
	var total = $('input.del_all:checked').size();
	if (total == 0) {
		alert('Tidak ada data yang dipilih...!');
		return false;
	}
	var c = confirm('apakah anda benar-benar akan menghapus beberapa data berikut...?');
	if (c) {
		var myid = '';
		for (var i = 0; i < total; i++) {
			myid += $('input.del_all:checked').get(i).value;
		}
		document.location = base_url + 'cms/record/delall/' + id + '/del/' + myid;
	} else {
		return false;
	}
}

function selectAll() {
	var cek = $('#selall').attr('checked');
	if (cek == true) {
		$('.del_all').attr('checked', true);
		$('.row1').addClass('delSelect');
		$('.row2').addClass('delSelect');
	} else {
		$('.del_all').attr('checked', false);
		$('.delSelect').removeClass('delSelect');
	}
}

function insearch() {
	$('#search').css({
		'color': '#bbb'
	});
	$('#search').focus(function() {
		var val = $(this).val();
		if (val == 'Search') {
			$(this).val('');
		}
		$('#search').css({
			'color': '#444'
		});
	});
	$('#search').blur(function() {
		var val = $(this).val();
		if (val == '') {
			$(this).val('Search');
			$('#search').css({
				'color': '#bbb'
			});
		}
	});
	$('#fsearch').click(function() {
		var keyword = $('#search').val();
		if (keyword == null || keyword == 'Search') {
			alert('Anda belum memasukkan kata pencarian...!');
			$('#search').focus();
			return false;
		} else {
			return true;
		}
	});
}

function clickDel() {
	$('.del_all').click(function() {
		var myid = $(this).val();
		var cek = $(this).attr('checked');
		var id = myid.replace('del', '');
		if (cek == true) {
			$('#' + id).addClass('delSelect');
		} else {
			$('#' + id).removeClass('delSelect');
		}
	});
}

function tabselect(id) {
	$('.listab_select').addClass('listab');
	$('.listab').removeClass('listab_select');
	$('#lstab' + id).removeClass('listab');
	$('#lstab' + id).addClass('listab_select');
	$('.tableTab').hide();
	$('#tabset' + id).show();
	//autoSizePage();
	var hdoc = $("#mainpage").height() + 55;
	$('#sliderLeftMenu').height(hdoc + 'px');
}

function formatCurrency(num) {
	num = num.toString().replace(/\$|\,/g, '');
	num = num.split(' ');
	num = num.join('');
	if (isNaN(num)) num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	cents = num % 100;
	num = Math.floor(num / 100).toString();
	if (cents < 10) cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++) {
		num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
	}
	return (((sign) ? '' : '-') + '' + num + '.' + cents);
}

function str_replace(kalimat, kata, pengganti) {
	var temp = kalimat.split(kata);
	return temp.join(pengganti);
}

function toNumber(num) {
	var snum = num.toString().split(',');
	snum = snum.join('');
	return Number(snum);
}

function rp(number) {
    number = new Number(number);
	return number.torp(2, ',', '.');
}
Number.prototype.torp = function(c, d, t) {
	var n = this,
		c = isNaN(c = Math.abs(c)) ? 2 : c,
		d = d == undefined ? "," : d,
		t = t == undefined ? "." : t,
		s = n < 0 ? "-" : "",
		i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
		j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

function del_ttk(number) {
	var str = new String(number);
	var str = str.replace(/\./g, '');
	var str = str.replace(/\,/g, '.');
	return str;
}
//Menggeser list menu kiri masuk ke kiri atau keluar ke kanan

function slideMenu() {
	var m = $("#sliderLeftMenu").css('margin-left');
	if (m == '-250px') {
		$("#slidHandle").attr({
			title: "<-slidein"
		});
		$("#sliderLeftMenu").animate({
			marginLeft: '0px'
		}, 400);
		$("#mainpage").animate({
			marginLeft: '250px'
		}, 400);
	} else {
		$("#slidHandle").attr({
			title: "show->"
		});
		$("#sliderLeftMenu").animate({
			marginLeft: '-250px'
		}, 400);
		$("#mainpage").animate({
			marginLeft: '6px'
		}, 400);
	}
}

function selectLimenu(n, tab) {
	var ml = $("#sliderLeftMenu").css('margin-left');
	$('#limenuX').remove();
	var me = $('#limenu' + n);
	var offset = me.offset();
	var topme = offset.top;
	$("#mainpage").animate({
		marginLeft: "2000px"
	}, 2800);
	$('body').css('overflow', 'hidden');
	$('#limenu' + n).after('<div class="limenux" style="top:' + topme + 'px" id="limenuX">&nbsp;</div>');
	$('#limenuX').animate({
		"top": "230px",
		"left": "600px",
		width: "400px",
		height: "40px",
		opacity: 0.7
	}, 500).animate({
		"top": "90px",
		"left": "252px",
		width: "80%",
		height: "83%",
		opacity: 0.1
	}, 800);
	setTimeout(function() {
		$('#limenuX').remove();
		$("#mainpage").html('');
		$("#mainpage").show();
		document.title = "halaman" + n;
		$("#mainpage").css({
			'margin-left': ml
		});
		window.history.pushState({
			page: 1
		}, {
			title: "halamanBaru"
		}, "?cms/tab/" + tab + '/pg/' + n + '/');
		$.post(base_url + 'fromLeftMenu/', {
			'tab': tab,
			'idProNav': n
		}, function(data) {
			$('#content').html(data);
			autoSizePage();
			insearch();
			clickDel();
		});
	}, 1300);
}
//fungsi mengambil URL==========================================================================
//var allVars = $.getUrlVars();  # seluruh alamat
//var allVars = $.getUrlVars()['me']; #mengambil variabel
$.extend({
	getUrlVars: function() {
		var vars = [],
			hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for (var i = 0; i < hashes.length; i++) {
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	},
	getUrlVar: function(name) {
		return $.getUrlVars()[name];
	}
});
//===================================================================================================

function autoSizePage() {
	var hpage = $(window).height();
	var wslider = $('#sliderLeftMenu').width();
	if (wslider == null) wslider = 0;
	//$("#mainpage").css({'height':'auto','min-height':(hpage-115)+'px','margin-left': wslider+'px'});
	$("#mainpage").css({
		'height': 'auto',
		'min-height': (hpage - 155) + 'px',
		'margin-left': wslider + 'px'
	});
	$('body').css({
		'overflow': 'auto'
	});
	var hdoc = $("#mainpage").height() + 55;
	$('#sliderLeftMenu').height(hdoc + 'px');
}

function nextMenu(li_ID, level) {
	var d = $('#' + li_ID + ' ul.sub' + level).css('display');
	if (d == 'none') {
		$('#' + li_ID + ' ul.sub' + level).slideDown(300);
	} else {
		$('#' + li_ID + ' ul.sub' + level).slideUp(300);
	}
}

function addmemo() {
	$('#tulismemo').show();
	$('#mymemo').focus();
	$('#plusmemo').hide();
}

function simpanmemo(link_addr) {
	var n = $('#memo').text();
	$.post(base_url + 'plusmemo/', {
		'memo': $('#mymemo').val(),
		'link_addr': link_addr
	}, function(data) {
		$('#isimemo').html(data);
		$('#tulismemo').hide();
		$('#plusmemo').show();
		$('#memo').text(n + 1);
	});
}

function dellmemo(id) {
	var c = confirm('Anda akan akan menghapus memo');
	if (c) {
		var n = $('#memo').text();
		$.post(base_url + 'delmemo/' + id, {}, function(data) {
			if (data == '1') {
				$('#mm' + id).slideUp(300);
				$('#memo').text(n - 1);
			}
		});
	}
}

function deldata(tbl, id, db) {
	var c = confirm('Apakah Anda benar-benar akan menghapus data tersebut \n Pilih OK jika ya atau pilih Cancel untuk membatalkan');
	if (c) {
		document.location = base_url + 'cms/record/deldata/' + tbl + '/del/' + id + '/d_base/' + db;
	} else {
		return false;
	}
}

function select_franchise() {
	var prefik = $('#db_select').val();
	$.post(base_url + 'hello_ajax/set_fr', {
		'prefik': prefik
	}, function(data) {
		if (data) {
			location.reload();
		}
	});
}
$(function() {
	$("#memoadm").draggable({
		handle: "#headmemo"
	});
});