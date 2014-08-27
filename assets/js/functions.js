function load_all_airport(uri, el) {
	$.ajax({
        type : "GET",
        url: uri,
        //data: FormData,
        //cache: false,
		dataType: "json",
		success:function(data){
			if(data==''){
				$(el).empty();
				alert('Maaf, data bandara tidak terambil dengan baik.');
					}
			else{
				$(el).empty();
				var div = $(el);
				var grup_lokal = document.createElement('optgroup');
				grup_lokal.label = "Dalam Negeri";
				var grup_intl = document.createElement('optgroup');
				grup_intl.label = "Luar Negeri";
				for(var i=0; i<data.length;i++){
					if (data[i].airport_country == "id"){
						var opt = document.createElement('option');
						opt.value = data[i].airport_code;
						opt.innerHTML = data[i].airport_location_name+", "+data[i].airport_name+" ("+data[i].airport_code+")";
						//if (data[i].airport_location_name == "Jakarta" && data[i].airport_code == "CGK")
						//	opt.selected = true;
						grup_lokal.appendChild(opt);
								
					}
					else {
						var opt = document.createElement('option');
						opt.value = data[i].airport_code;
						opt.innerHTML = data[i].airport_location_name+", "+data[i].airport_name+" ("+data[i].airport_code+")";
						grup_intl.appendChild(opt);
						
					}
				}
				/*append to element select*/
				div.append(grup_lokal);
				div.append(grup_intl);
            }
        }
    })
}

function load_all_station(uri, el) {
	$.ajax({
        type : "GET",
        url: uri,
        //data: FormData,
        //cache: false,
		dataType: "json",
		success:function(data){
			if(data==''){
				$(el).empty();
				alert('Maaf, data stasiun tidak terambil dengan baik.');
					}
			else{
				$(el).empty();
				var div = $(el);
				for(var i=0; i<data.length;i++){
					var opt = document.createElement('option');
					opt.value = data[i].station_code;
					opt.innerHTML = toTitleCase(data[i].station_name)+" ("+data[i].station_code+")";
					//if (data[i].station_code == "GMR")
					//	opt.selected = true;
					/*append to element select*/
					div.append(opt);
				}
				
				
            }
        }
    })
}

function set_td_data(td, teks) {
	var el_td = document.createElement(td);
	var text_node = document.createTextNode(teks);
	el_td.appendChild(text_node);
		
	return el_td;
}

function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function replace_undefined(variable){
	var result = (typeof variable === 'undefined' ? '' : variable);
	return result;
}