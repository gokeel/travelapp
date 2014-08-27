function rp(number){
    number = del_ttk(number);
    if(isNaN(number)) return "";
    var str = new String(number);
    var result = "", len = str.length;
    for(var i=len-1;i>=0;i--){
      if((i+1)%3 == 0 && i+1 != len) result +=".";
      result += str.charAt(len-1-i);
    }
    return result;
}

function del_ttk(number){
    var i = '.';
    var str = new String(number);
    var str = str.replace(/\./g, '');
    return str;
}

String.prototype.replaceArray = function(find, replace) {
  var replaceString = this;
  for (var i = 0; i < find.length; i++) {
    replaceString = replaceString.replace(find[i], replace[i]);
  }
  return replaceString;
};
            