

(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{    			// Add your regex rules here, you can take telephone as an example
						"regex":"none",
						"alertText":"* Kolom ini harus diisi",
						"alertTextCheckboxMultiple":"* Silakan pilih salah satu pilihan",
						"alertTextCheckboxe":"* Checkbox ini harus dicentang"},
					"length":{
						"regex":"none",
						"alertText":"* Karakter antara ",
						"alertText2":" dan ",
						"alertText3": " yang diperbolehkan"},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* Checkbox yang dicentang melebihi maksimal"},
					"minCheckbox":{
						"regex":"none",
						"alertText":"* Silahkan pilih ",
						"alertText2":" pilihan"},
					"confirm":{
						"regex":"none",
						"alertText":"* Isi kolom Anda tidak sesuai"},
                    "confirm2":{
						"regex":"none",
						"alertText":"* Kurang Oey..."},
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* Nomor telephone kurang benar"},
					"email":{
						"regex":"/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/",
						"alertText":"* Format email kurang benar"},
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* Kesalahan tanggal"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Hanya angka yang diperbolehkan"},
                    "onlyImage":{
						"regex":"/(.*?)\.(jpg|jpeg|png|gif|tar|gz|zip|rar|Jpg|Jpeg|Png|Gif|Tar|Gz|Zip|Rar|JPG|JPEG|PNG|GIF|TAR|GZ|ZIP|RAR)$/",
						"alertText":"* File yang diperbolehkan (jpg, jpeg, png, gif, tar, gz, zip, rar) dg ukuran maks 200kb"},
                    "noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$ /",
						"alertText":"* Tidak boleh menggunakan karakter khusus"},
					"ajaxUser":{
						"file":"include/validateUser.php",
						"alertTextOk":"* user tersedia",
						"alertTextLoad":"* Sedang dimuat, silakan tunggu",
						"alertText":"* Username tidak terdaftar"},
					"ajaxCaptcha":{
						"file":"cap.php",
						"alertText":"* Maaf, kode salah",
						"alertTextOk":"* Sip.. betul 100",
						"alertTextLoad":"* Tunggu..."},
                    "ajaxPass":{
						"file":"include/validpass.php",    
						"alertTextOk":"* password OK",
						"alertTextLoad":"* Sedang dimuat, silakan tunggu",
						"alertText":"* Password Salah"},
					"ajaxName":{
						"file":"include/validateUser.php",
						"alertText":"* Nama konsumen tidak terdaftar, pembayaran harus tunai",
						"alertTextOk":"* Nama Konsumen terdaftar",
						"alertTextLoad":"* Sedang dimuat, silakan tunggu"},
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* Isi dengan huruf saja"},
					"validate2fields":{
    					"nname":"validate2fields",
    					"alertText":"* Anda harus punya nama pertama dan terakhir"}
					}

		}
	}
})(jQuery);

$(document).ready(function() {
	$.validationEngineLanguage.newLang()
});