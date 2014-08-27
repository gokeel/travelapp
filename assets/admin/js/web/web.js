var interval = 15000, int_i = 0;
$(document).ready(function(){
    $('.konf_to_isut').click(function(e){
        var konfirm = confirm('Issued tiket sekarang ?');
        if(!konfirm){
            e.preventDefault();
        }
    });
    
    $('.hotel_request_issued').click(function(e){
        var konfirm = confirm('Issued Booking Hotel Sekarang ?');
        if(!konfirm){
            e.preventDefault();
        }
    });
    
    $('.rail_request_issued').click(function(e){
        var konfirm = confirm('Issued Booking Kereta Sekarang ?');
        if(!konfirm){
            e.preventDefault();
        }
    });
    
    
    $('.rail_rejected').click(function(e){
        var konfirm = confirm('Cancel request booking kereta ini ?');
        if(!konfirm){
            e.preventDefault();
        }
    });
    
    cek_mod();
});

function SelisihHari(tgl1, tgl2){
    // varibel miliday sebagai pembagi untuk menghasilkan hari
    var miliday = 24 * 60 * 60 * 1000;
    //buat object Date
    var tanggal1 = new Date(tgl1);
    var tanggal2 = new Date(tgl2);
    // Date.parse akan menghasilkan nilai bernilai integer dalam bentuk milisecond
    var tglPertama = Date.parse(tanggal1);
    var tglKedua = Date.parse(tanggal2);
    var selisih = (tglKedua - tglPertama) / miliday;

 return selisih;
}

function toYmd(date){
	var dateBits = date.split('-');
	var lb=dateBits[1].length;
	var ld=dateBits[0].length;
	if(lb==1){ var o_bln='0';}else{var o_bln='';}
	if(ld==1){ var o_tgl='0';}else{var o_tgl='';}
	return(dateBits[2] + '-' + o_bln + dateBits[1]+ '-' + o_tgl+dateBits[0]);
}
		
function cek_mod(){
    setTimeout(function(){
        $.get(base_url + 'is_mod/member',{'page':page}, function(data){
            if(data.valid){
                //console.log(data.tipe);
                int_i = 0;
                notify('New Update', data.tipe, {
					icon: base_url+'css/web/img/demo/icon.png',
					system: true
				});
                $("audio").remove();
                $('body').append('<audio controls="controls" hidden="true" autoplay="autoplay"><source src="' + base_url + 'css/alert_file/dong.mp3" type="audio/mpeg"><source src="' + base_url + 'css/alert_file/dong.ogg" type="audio/ogg"></audio>');
                
                
                $('#deposit_amount').html(data.deposit_amount);
                $('#voucher_amount').html(data.voucher);
                $('#deposit_lock').html(data.deposit_lock);
                if(data.refresh){
                    location.reload();
                }
                
            }else{
                int_i++;
                interval += int_i*5000;
                if(int_i > 5){
                    int_i = 0;
                    interval = 15000;
                    //interval = 60000;
                }
            }
        }, 'json');
        //console.log(interval);
        cek_mod();
    }, interval);
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