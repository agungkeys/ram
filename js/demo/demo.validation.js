(function(a){a(document).ready(function(b){if(a.fn.chosen){a("#da-ex-val-chzn")
.chosen().bind("change",function(){a("#da-ex-validate3")
.validate().element(a(this))})}if(a.fn.spinner){a("#da-ex-val-spin").spinner()}
if(a.fn.validate){
	a("#da-ex-validate9")
.validate({rules:
{txtfiledesign:{required:true}},
invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"Anda melewatkan 1 field. Tolong lengkapi filed kosong":"Anda melewatkan "+f+" fields. Tolong lengkapi field kosong";a("#da-ex-val9-error").html(d).show()}else{a("#da-ex-val9-error").hide()}}});
	a("#da-ex-validate8")
.validate({rules:
{txtnamacustomer:{required:true},
txtbayar:{required:true, number:true}},
invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"Anda melewatkan 1 field. Tolong lengkapi filed kosong":"Anda melewatkan "+f+" fields. Tolong lengkapi field kosong";a("#da-ex-val8-error").html(d).show()}else{a("#da-ex-val8-error").hide()}}});
	a("#da-ex-validate7")
.validate({rules:
{txtnamapemesanan:{required:true},
txtharga:{required:true, number:true}},
invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"Anda melewatkan 1 field. Tolong lengkapi filed kosong":"Anda melewatkan "+f+" fields. Tolong lengkapi field kosong";a("#da-ex-val7-error").html(d).show()}else{a("#da-ex-val7-error").hide()}}});
	a("#da-ex-validate6")
.validate({rules:
{txtjenisbahan:{required:true}},
invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"Anda melewatkan 1 field. Tolong lengkapi filed kosong":"Anda melewatkan "+f+" fields. Tolong lengkapi field kosong";a("#da-ex-val6-error").html(d).show()}else{a("#da-ex-val6-error").hide()}}});
	a("#da-ex-validate5")
.validate({rules:
{txtjeniscetak:{required:true}},
invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"Anda melewatkan 1 field. Tolong lengkapi filed kosong":"Anda melewatkan "+f+" fields. Tolong lengkapi field kosong";a("#da-ex-val5-error").html(d).show()}else{a("#da-ex-val5-error").hide()}}});
	a("#da-ex-validate4")
.validate({rules:
{txtusername:{required:true},
txtpassword:{required:true,minlength:5},
txtnama:{required:true},
txtlevel:{required:true}},
invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"Anda melewatkan 1 field. Tolong lengkapi filed kosong":"Anda melewatkan "+f+" fields. Tolong lengkapi field kosong";a("#da-ex-val4-error").html(d).show()}else{a("#da-ex-val4-error").hide()}}});
	a("#da-ex-validate1")
.validate({rules:{req1:{required:true},email1:{required:true,email:true},url1:{required:true,url:true},pass1:{required:true,minlength:5},cpass1:{required:true,minlength:5,equalTo:"#pass1"},digits1:{required:true,digits:true}},invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"You missed 1 field. It has been highlighted":"You missed "+f+" fields. They have been highlighted";a("#da-ex-val1-error").html(d).show()}else{a("#da-ex-val1-error").hide()}}});
	a("#da-ex-validate2")
.validate({rules:{minl1:{required:true,minlength:5},maxl1:{required:true,maxlength:5},rangel1:{required:true,rangelength:[5,10]},min1:{required:true,digits:true,min:5},max1:{required:true,digits:true,max:5},range1:{required:true,digits:true,range:[5,10]}},invalidHandler:function(e,c){var f=c.numberOfInvalids();if(f){var d=f==1?"You missed 1 field. It has been highlighted":"You missed "+f+" fields. They have been highlighted";a("#da-ex-val2-error").html(d).show()}else{a("#da-ex-val2-error").hide()}}});
	a("#da-ex-validate3")
	.validate({ignore:".ignore",rules:{gender:{required:true},sport:{required:true},file1:{required:true,accept:[".jpeg"]},dd1:{required:true},chosen1:{required:true},spin1:{required:true,min:5,max:10}}});a("#da-ex-validate4").validate({rules:{email:{required:true,email:true},pass2:{required:true,minlength:5},cpass2:{required:true,minlength:5,equalTo:"#pass2"},address:{required:"#souvenirs:checked"}}})}})})(jQuery);