(function($){$.fn.validationEngine=function(settings){if($.validationEngineLanguage){allRules=$.validationEngineLanguage.allRules}else{$.validationEngine.debug("Validation engine rules are not loaded check your external file")}settings=jQuery.extend({allrules:allRules,validationEventTriggers:"focusout",inlineValidation:true,returnIsValid:false,liveEvent:true,unbindEngine:true,containerOverflow:false,containerOverflowDOM:"",ajaxSubmit:false,scroll:false,promptPosition:"topRight",success:false,beforeSuccess:function(){},failure:function(){}},settings);$.validationEngine.settings=settings;$.validationEngine.ajaxValidArray=new Array();if(settings.inlineValidation==true){if(!settings.returnIsValid){allowReturnIsvalid=false;if(settings.liveEvent){$(this).find("[class*=validate][type!=checkbox]").live(settings.validationEventTriggers,function(caller){_inlinEvent(this)});$(this).find("[class*=validate][type=checkbox]").live("click",function(caller){_inlinEvent(this)})}else{$(this).find("[class*=validate]").not("[type=checkbox]").bind(settings.validationEventTriggers,function(caller){_inlinEvent(this)});$(this).find("[class*=validate][type=checkbox]").bind("click",function(caller){_inlinEvent(this)})}firstvalid=false}function _inlinEvent(caller){$.validationEngine.settings=settings;if($.validationEngine.intercept==false||!$.validationEngine.intercept){$.validationEngine.onSubmitValid=false;$.validationEngine.loadValidation(caller)}else{$.validationEngine.intercept=false}}}if(settings.returnIsValid){if($.validationEngine.submitValidation(this,settings)){return false}else{return true}}$(this).bind("submit",function(caller){$.validationEngine.onSubmitValid=true;$.validationEngine.settings=settings;if($.validationEngine.submitValidation(this,settings)==false){if($.validationEngine.submitForm(this,settings)==true){return false}}else{settings.failure&&settings.failure();return false}});$(".formError").live("click",function(){$(this).fadeOut(150,function(){$(this).remove()})})};$.validationEngine={defaultSetting:function(caller){if($.validationEngineLanguage){allRules=$.validationEngineLanguage.allRules}else{$.validationEngine.debug("Validation engine rules are not loaded check your external file")}settings={allrules:allRules,validationEventTriggers:"blur",inlineValidation:true,containerOverflow:false,containerOverflowDOM:"",returnIsValid:false,scroll:false,unbindEngine:true,ajaxSubmit:false,promptPosition:"topRight",success:false,failure:function(){}};$.validationEngine.settings=settings},loadValidation:function(caller){if(!$.validationEngine.settings){$.validationEngine.defaultSetting()}rulesParsing=$(caller).attr("class");rulesRegExp=/\[(.*)\]/;getRules=rulesRegExp.exec(rulesParsing);if(getRules==null){return false}str=getRules[1];pattern=/\[|,|\]/;result=str.split(pattern);var validateCalll=$.validationEngine.validateCall(caller,result);return validateCalll},validateCall:function(caller,rules){var promptText="";if(!$(caller).attr("id")){$.validationEngine.debug("This field have no ID attribut( name & class displayed): "+$(caller).attr("name")+" "+$(caller).attr("class"))}caller=caller;ajaxValidate=false;var callerName=$(caller).attr("name");$.validationEngine.isError=false;$.validationEngine.showTriangle=true;callerType=$(caller).attr("type");for(i=0;i<rules.length;i++){switch(rules[i]){case"optional":if(!$(caller).val()){$.validationEngine.closePrompt(caller);return $.validationEngine.isError}break;case"required":_required(caller,rules);break;case"custom":_customRegex(caller,rules,i);break;case"exemptString":_exemptString(caller,rules,i);break;case"ajax":if(!$.validationEngine.onSubmitValid){_ajax(caller,rules,i)}break;case"length":_length(caller,rules,i);break;case"maxCheckbox":_maxCheckbox(caller,rules,i);groupname=$(caller).attr("name");caller=$("input[name='"+groupname+"']");break;case"minCheckbox":_minCheckbox(caller,rules,i);groupname=$(caller).attr("name");caller=$("input[name='"+groupname+"']");break;case"confirm":_confirm(caller,rules,i);break;case"confirm2":_confirm2(caller,rules,i);break;case"funcCall":_funcCall(caller,rules,i);break;default:}}radioHack();if($.validationEngine.isError==true){var linkTofieldText="."+$.validationEngine.linkTofield(caller);if(linkTofieldText!="."){if(!$(linkTofieldText)[0]){$.validationEngine.buildPrompt(caller,promptText,"error")}else{$.validationEngine.updatePromptText(caller,promptText)}}else{$.validationEngine.updatePromptText(caller,promptText)}}else{$.validationEngine.closePrompt(caller)}function radioHack(){if($("input[name='"+callerName+"']").size()>1&&(callerType=="radio"||callerType=="checkbox")){caller=$("input[name='"+callerName+"'][type!=hidden]:first");$.validationEngine.showTriangle=false}}function _required(caller,rules){callerType=$(caller).attr("type");if(callerType=="text"||callerType=="password"||callerType=="textarea"){if(!$(caller).val()){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules[rules[i]].alertText+"<br />"}}if(callerType=="radio"||callerType=="checkbox"){callerName=$(caller).attr("name");if($("input[name='"+callerName+"']:checked").size()==0){$.validationEngine.isError=true;if($("input[name='"+callerName+"']").size()==1){promptText+=$.validationEngine.settings.allrules[rules[i]].alertTextCheckboxe+"<br />"}else{promptText+=$.validationEngine.settings.allrules[rules[i]].alertTextCheckboxMultiple+"<br />"}}}if(callerType=="select-one"){if(!$(caller).val()){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules[rules[i]].alertText+"<br />"}}if(callerType=="select-multiple"){if(!$(caller).find("option:selected").val()){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules[rules[i]].alertText+"<br />"}}}function _customRegex(caller,rules,position){customRule=rules[position+1];pattern=eval($.validationEngine.settings.allrules[customRule].regex);if(!pattern.test($(caller).attr("value"))){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules[customRule].alertText+"<br />"}}function _exemptString(caller,rules,position){customString=rules[position+1];if(customString==$(caller).attr("value")){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules.required.alertText+"<br />"}}function _funcCall(caller,rules,position){customRule=rules[position+1];funce=$.validationEngine.settings.allrules[customRule].nname;var fn=window[funce];if(typeof(fn)==="function"){var fn_result=fn();if(!fn_result){$.validationEngine.isError=true}promptText+=$.validationEngine.settings.allrules[customRule].alertText+"<br />"}}function _ajax(caller,rules,position){customAjaxRule=rules[position+1];postfile=$.validationEngine.settings.allrules[customAjaxRule].file;fieldValue=$(caller).val();ajaxCaller=caller;fieldId=$(caller).attr("id");ajaxValidate=true;ajaxisError=$.validationEngine.isError;if($.validationEngine.settings.allrules[customAjaxRule].extraData){extraData=$.validationEngine.settings.allrules[customAjaxRule].extraData}else{extraData=""}if(!ajaxisError){$.ajax({type:"POST",url:postfile,async:true,data:"validateValue="+fieldValue+"&validateId="+fieldId+"&validateError="+customAjaxRule+"&extraData="+extraData,beforeSend:function(){if($.validationEngine.settings.allrules[customAjaxRule].alertTextLoad){if(!$("div."+fieldId+"formError")[0]){return $.validationEngine.buildPrompt(ajaxCaller,$.validationEngine.settings.allrules[customAjaxRule].alertTextLoad,"load")}else{$.validationEngine.updatePromptText(ajaxCaller,$.validationEngine.settings.allrules[customAjaxRule].alertTextLoad,"load")}}},error:function(data,transport){$.validationEngine.debug("error in the ajax: "+data.status+" "+transport)},success:function(data){data=eval("("+data+")");ajaxisError=data.jsonValidateReturn[2];customAjaxRule=data.jsonValidateReturn[1];ajaxCaller=$("#"+data.jsonValidateReturn[0])[0];fieldId=ajaxCaller;ajaxErrorLength=$.validationEngine.ajaxValidArray.length;existInarray=false;if(ajaxisError=="false"){_checkInArray(false);if(!existInarray){$.validationEngine.ajaxValidArray[ajaxErrorLength]=new Array(2);$.validationEngine.ajaxValidArray[ajaxErrorLength][0]=fieldId;$.validationEngine.ajaxValidArray[ajaxErrorLength][1]=false;existInarray=false}$.validationEngine.ajaxValid=false;promptText+=$.validationEngine.settings.allrules[customAjaxRule].alertText+"<br />";$.validationEngine.updatePromptText(ajaxCaller,promptText,"",true)}else{_checkInArray(true);$.validationEngine.ajaxValid=true;if(!customAjaxRule){$.validationEngine.debug("wrong ajax response, are you on a server or in xampp? if not delete de ajax[ajaxUser] validating rule from your form ")}if($.validationEngine.settings.allrules[customAjaxRule].alertTextOk){$.validationEngine.updatePromptText(ajaxCaller,$.validationEngine.settings.allrules[customAjaxRule].alertTextOk,"pass",true)}else{ajaxValidate=false;$.validationEngine.closePrompt(ajaxCaller)}}function _checkInArray(validate){for(x=0;x<ajaxErrorLength;x++){if($.validationEngine.ajaxValidArray[x][0]==fieldId){$.validationEngine.ajaxValidArray[x][1]=validate;existInarray=true}}}}})}}function _confirm(caller,rules,position){confirmField=rules[position+1];if($(caller).attr("value")!=$("#"+confirmField).attr("value")){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules.confirm.alertText+"<br />"}}function _confirm2(caller,rules,position){confirmField=rules[position+1];if($(caller).attr("value")-$("#"+confirmField).attr("value")<0){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules.confirm2.alertText+"<br />"}}function _length(caller,rules,position){startLength=eval(rules[position+1]);endLength=eval(rules[position+2]);feildLength=$(caller).attr("value").length;if(feildLength<startLength||feildLength>endLength){$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules.length.alertText+startLength+$.validationEngine.settings.allrules.length.alertText2+endLength+$.validationEngine.settings.allrules.length.alertText3+"<br />"}}function _maxCheckbox(caller,rules,position){nbCheck=eval(rules[position+1]);groupname=$(caller).attr("name");groupSize=$("input[name='"+groupname+"']:checked").size();if(groupSize>nbCheck){$.validationEngine.showTriangle=false;$.validationEngine.isError=true;promptText+=$.validationEngine.settings.allrules.maxCheckbox.alertText+"<br />"}}function _minCheckbox(caller,rules,position){nbCheck=eval(rules[position+1]);groupname=$(caller).attr("name");groupSize=$("input[name='"+groupname+"']:checked").size();if(groupSize<nbCheck){$.validationEngine.isError=true;$.validationEngine.showTriangle=false;promptText+=$.validationEngine.settings.allrules.minCheckbox.alertText+" "+nbCheck+" "+$.validationEngine.settings.allrules.minCheckbox.alertText2+"<br />"}}return($.validationEngine.isError)?$.validationEngine.isError:false},submitForm:function(caller){if($.validationEngine.settings.ajaxSubmit){if($.validationEngine.settings.ajaxSubmitExtraData){extraData=$.validationEngine.settings.ajaxSubmitExtraData}else{extraData=""}$.ajax({type:"POST",url:$.validationEngine.settings.ajaxSubmitFile,async:true,data:$(caller).serialize()+"&"+extraData,error:function(data,transport){$.validationEngine.debug("error in the ajax: "+data.status+" "+transport)},success:function(data){if(data=="true"){$(caller).css("opacity",1);$(caller).animate({opacity:0,height:0},function(){$(caller).css("display","none");$(caller).before("<div class='ajaxSubmit'>"+$.validationEngine.settings.ajaxSubmitMessage+"</div>");$.validationEngine.closePrompt(".formError",true);$(".ajaxSubmit").show("slow");if($.validationEngine.settings.success){$.validationEngine.settings.success&&$.validationEngine.settings.success();return false}})}else{data=eval("("+data+")");if(!data.jsonValidateReturn){$.validationEngine.debug("you are not going into the success fonction and jsonValidateReturn return nothing")}errorNumber=data.jsonValidateReturn.length;for(index=0;index<errorNumber;index++){fieldId=data.jsonValidateReturn[index][0];promptError=data.jsonValidateReturn[index][1];type=data.jsonValidateReturn[index][2];$.validationEngine.buildPrompt(fieldId,promptError,type)}}}});return true}if(!$.validationEngine.settings.beforeSuccess()){if($.validationEngine.settings.success){if($.validationEngine.settings.unbindEngine){$(caller).unbind("submit")}$.validationEngine.settings.success&&$.validationEngine.settings.success();return true}}else{return true}return false},buildPrompt:function(caller,promptText,type,ajaxed){if(!$.validationEngine.settings){$.validationEngine.defaultSetting()}deleteItself="."+$(caller).attr("id")+"formError";if($(deleteItself)[0]){$(deleteItself).stop();$(deleteItself).remove()}var divFormError=document.createElement("div");var formErrorContent=document.createElement("div");linkTofield=$.validationEngine.linkTofield(caller);$(divFormError).addClass("formError");if(type=="pass"){$(divFormError).addClass("greenPopup")}if(type=="load"){$(divFormError).addClass("blackPopup")}if(ajaxed){$(divFormError).addClass("ajaxed")}$(divFormError).addClass(linkTofield);$(formErrorContent).addClass("formErrorContent");if($.validationEngine.settings.containerOverflow){$(caller).before(divFormError)}else{$("body").append(divFormError)}$(divFormError).append(formErrorContent);if($.validationEngine.showTriangle!=false){var arrow=document.createElement("div");$(arrow).addClass("formErrorArrow");$(divFormError).append(arrow);if($.validationEngine.settings.promptPosition=="bottomLeft"||$.validationEngine.settings.promptPosition=="bottomRight"){$(arrow).addClass("formErrorArrowBottom");$(arrow).html('<div class="line1"><!-- --></div><div class="line2"><!-- --></div><div class="line3"><!-- --></div><div class="line4"><!-- --></div><div class="line5"><!-- --></div><div class="line6"><!-- --></div><div class="line7"><!-- --></div><div class="line8"><!-- --></div><div class="line9"><!-- --></div><div class="line10"><!-- --></div>')}if($.validationEngine.settings.promptPosition=="topLeft"||$.validationEngine.settings.promptPosition=="topRight"){$(divFormError).append(arrow);$(arrow).html('<div class="line10"><!-- --></div><div class="line9"><!-- --></div><div class="line8"><!-- --></div><div class="line7"><!-- --></div><div class="line6"><!-- --></div><div class="line5"><!-- --></div><div class="line4"><!-- --></div><div class="line3"><!-- --></div><div class="line2"><!-- --></div><div class="line1"><!-- --></div>')}}$(formErrorContent).html(promptText);var calculatedPosition=$.validationEngine.calculatePosition(caller,promptText,type,ajaxed,divFormError);calculatedPosition.callerTopPosition+="px";calculatedPosition.callerleftPosition+="px";calculatedPosition.marginTopSize+="px";$(divFormError).css({top:calculatedPosition.callerTopPosition,left:calculatedPosition.callerleftPosition,marginTop:calculatedPosition.marginTopSize,opacity:0});return $(divFormError).animate({opacity:0.87},function(){return true})},updatePromptText:function(caller,promptText,type,ajaxed){linkTofield=$.validationEngine.linkTofield(caller);var updateThisPrompt="."+linkTofield;if(type=="pass"){$(updateThisPrompt).addClass("greenPopup")}else{$(updateThisPrompt).removeClass("greenPopup")}if(type=="load"){$(updateThisPrompt).addClass("blackPopup")}else{$(updateThisPrompt).removeClass("blackPopup")}if(ajaxed){$(updateThisPrompt).addClass("ajaxed")}else{$(updateThisPrompt).removeClass("ajaxed")}$(updateThisPrompt).find(".formErrorContent").html(promptText);var calculatedPosition=$.validationEngine.calculatePosition(caller,promptText,type,ajaxed,updateThisPrompt);calculatedPosition.callerTopPosition+="px";calculatedPosition.callerleftPosition+="px";calculatedPosition.marginTopSize+="px";$(updateThisPrompt).animate({top:calculatedPosition.callerTopPosition,marginTop:calculatedPosition.marginTopSize})},calculatePosition:function(caller,promptText,type,ajaxed,divFormError){if($.validationEngine.settings.containerOverflow){callerTopPosition=0;callerleftPosition=0;callerWidth=$(caller).width();inputHeight=$(divFormError).height();var marginTopSize="-"+inputHeight}else{callerTopPosition=$(caller).offset().top;callerleftPosition=$(caller).offset().left;callerWidth=$(caller).width();inputHeight=$(divFormError).height();var marginTopSize=0}if($.validationEngine.settings.promptPosition=="topRight"){if($.validationEngine.settings.containerOverflow){callerleftPosition+=callerWidth-30}else{callerleftPosition+=callerWidth-30;callerTopPosition+=-inputHeight}}if($.validationEngine.settings.promptPosition=="topLeft"){callerTopPosition+=-inputHeight-10}if($.validationEngine.settings.promptPosition=="centerRight"){callerleftPosition+=callerWidth+13}if($.validationEngine.settings.promptPosition=="bottomLeft"){callerHeight=$(caller).height();callerTopPosition=callerTopPosition+callerHeight+15}if($.validationEngine.settings.promptPosition=="bottomRight"){callerHeight=$(caller).height();callerleftPosition+=callerWidth-30;callerTopPosition+=callerHeight+5}return{callerTopPosition:callerTopPosition,callerleftPosition:callerleftPosition,marginTopSize:marginTopSize}},linkTofield:function(caller){var linkTofield=$(caller).attr("id")+"formError";linkTofield=linkTofield.replace(/\[/g,"");linkTofield=linkTofield.replace(/\]/g,"");return linkTofield},closePrompt:function(caller,outside){if(!$.validationEngine.settings){$.validationEngine.defaultSetting()}if(outside){$(caller).fadeTo("fast",0,function(){$(caller).remove()});return false}if(typeof(ajaxValidate)=="undefined"){ajaxValidate=false}if(!ajaxValidate){linkTofield=$.validationEngine.linkTofield(caller);closingPrompt="."+linkTofield;$(closingPrompt).fadeTo("fast",0,function(){$(closingPrompt).remove()})}},debug:function(error){if(!$("#debugMode")[0]){$("body").append("<div id='debugMode'><div class='debugError'><strong>This is a debug mode, you got a problem with your form, it will try to help you, refresh when you think you nailed down the problem</strong></div></div>")}$(".debugError").append("<div class='debugerror'>"+error+"</div>")},submitValidation:function(caller){var stopForm=false;$.validationEngine.ajaxValid=true;var toValidateSize=$(caller).find("[class*=validate]").size();$(caller).find("[class*=validate]").each(function(){linkTofield=$.validationEngine.linkTofield(this);if(!$("."+linkTofield).hasClass("ajaxed")){var validationPass=$.validationEngine.loadValidation(this);return(validationPass)?stopForm=true:""}});ajaxErrorLength=$.validationEngine.ajaxValidArray.length;for(x=0;x<ajaxErrorLength;x++){if($.validationEngine.ajaxValidArray[x][1]==false){$.validationEngine.ajaxValid=false}}if(stopForm||!$.validationEngine.ajaxValid){if($.validationEngine.settings.scroll){if(!$.validationEngine.settings.containerOverflow){var destination=$(".formError:not('.greenPopup'):first").offset().top;$(".formError:not('.greenPopup')").each(function(){testDestination=$(this).offset().top;if(destination>testDestination){destination=$(this).offset().top}});$("html:not(:animated),body:not(:animated)").animate({scrollTop:destination},1100)}else{var destination=$(".formError:not('.greenPopup'):first").offset().top;var scrollContainerScroll=$($.validationEngine.settings.containerOverflowDOM).scrollTop();var scrollContainerPos=-parseInt($($.validationEngine.settings.containerOverflowDOM).offset().top);var destination=scrollContainerScroll+destination+scrollContainerPos-5;var scrollContainer=$.validationEngine.settings.containerOverflowDOM+":not(:animated)";$(scrollContainer).animate({scrollTop:destination},1100)}}return true}else{return false}}}})(jQuery);(function(a){a.fn.validationEngineLanguage=function(){};a.validationEngineLanguage={newLang:function(){a.validationEngineLanguage.allRules={required:{regex:"none",alertText:"* Kolom ini harus diisi",alertTextCheckboxMultiple:"* Silakan pilih salah satu pilihan",alertTextCheckboxe:"* Checkbox ini harus dicentang"},length:{regex:"none",alertText:"* Karakter antara ",alertText2:" dan ",alertText3:" yang diperbolehkan"},maxCheckbox:{regex:"none",alertText:"* Checkbox yang dicentang melebihi maksimal"},minCheckbox:{regex:"none",alertText:"* Silahkan pilih ",alertText2:" pilihan"},confirm:{regex:"none",alertText:"* Isi kolom Anda tidak sesuai"},confirm2:{regex:"none",alertText:"* Kurang Oey..."},telephone:{regex:"/^[0-9-() ]+$/",alertText:"* Nomor telephone kurang benar"},email:{regex:"/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/",alertText:"* Format email kurang benar"},date:{regex:"/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",alertText:"* Kesalahan tanggal"},onlyNumber:{regex:"/^[0-9 ]+$/",alertText:"* Hanya angka yang diperbolehkan"},onlyImage:{regex:"/(.*?).(jpg|jpeg|png|gif|tar|gz|zip|rar|Jpg|Jpeg|Png|Gif|Tar|Gz|Zip|Rar|JPG|JPEG|PNG|GIF|TAR|GZ|ZIP|RAR)$/",alertText:"* File yang diperbolehkan (jpg, jpeg, png, gif, tar, gz, zip, rar) dg ukuran maks 200kb"},noSpecialCaracters:{regex:"/^[0-9a-zA-Z]+$ /",alertText:"* Tidak boleh menggunakan karakter khusus"},ajaxUser:{file:"include/validateUser.php",alertTextOk:"* user tersedia",alertTextLoad:"* Sedang dimuat, silakan tunggu",alertText:"* Username tidak terdaftar"},ajaxCaptcha:{file:"cap.php",alertText:"* Maaf, kode salah",alertTextOk:"* Sip.. betul 100",alertTextLoad:"* Tunggu..."},ajaxPass:{file:"include/validpass.php",alertTextOk:"* password OK",alertTextLoad:"* Sedang dimuat, silakan tunggu",alertText:"* Password Salah"},ajaxName:{file:"include/validateUser.php",alertText:"* Nama konsumen tidak terdaftar, pembayaran harus tunai",alertTextOk:"* Nama Konsumen terdaftar",alertTextLoad:"* Sedang dimuat, silakan tunggu"},onlyLetter:{regex:"/^[a-zA-Z ']+$/",alertText:"* Isi dengan huruf saja"},validate2fields:{nname:"validate2fields",alertText:"* Anda harus punya nama pertama dan terakhir"}}}}})(jQuery);$(document).ready(function(){$.validationEngineLanguage.newLang()});