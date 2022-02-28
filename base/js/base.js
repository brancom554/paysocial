/*************************************/

function validateDate(a) {
 strExpReg = /^(((0[1-9]|[12][0-9]|3[01])([/])(0[13578]|10|12)([/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([/])(0[469]|11)([/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([/])(02)([/])(\d{4}))|((29)(\.|-|\/)(02)([/])([02468][048]00))|((29)([/])(02)([/])([13579][26]00))|((29)([/])(02)([/])([0-9][0-9][0][48]))|((29)([/])(02)([/])([0-9][0-9][2468][048]))|((29)([/])(02)([/])([0-9][0-9][13579][26])))$/;
 return strExpReg.test(a);
}

/*************************************/

function validateEmail(e) {
	var b=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
	return b.test(e);
}

/*************************************/

function opendiv(thediv,message) {
	$(thediv).html(message);
	$(thediv).slideDown("slow");
}

var divactive='';
function openandclose(thediv,message,thetime) {
	$(thediv).html(message);
	$(thediv).slideDown("slow", function(){
		divactive=thediv;
		delayactive=setTimeout(closediv,thetime);
	});	
}

function closediv() {
	$(divactive).slideUp("slow", function(){
		clearTimeout(delayactive);
	});
}

/*************************************/

function invoke_ajax(theUrl, theType, theData, fSuccess, fError) {

	$.ajax({
		type: theType,
		url: siteurl + theUrl,
		data: theData,
		success: function(resp) {
			fSuccess(resp);
		},
		error: function() {
			fError();
		}
	});

}

/*************************************/

function validationInput(action, idinput, diverror, msgerror, bsubmit) {
	$(bsubmit).attr('disabled','true');
	valinput = $.trim($(idinput).val());
	switch (action) {
		case 'empty':
			if (valinput == '') {
				$(idinput).val(valinput);
				openandclose(diverror,msgerror,1700);		
				$(idinput).focus();
				setTimeout(function() {$(bsubmit).removeAttr('disabled');}, 2500);
				return false;
			} else return valinput;
			break;

		case 'email':
			if (!validateEmail(valinput)) {
				$(idinput).val(valinput);
				openandclose(diverror,msgerror,1700);		
				$(idinput).focus();
				setTimeout(function() {$(bsubmit).removeAttr('disabled');}, 2500); 
				return false;
			} else return valinput;
			break;
			
		case 'password':
			if (valinput == '' || valinput.length<6 || valinput.length>20) {
				$(idinput).val(valinput);
				openandclose(diverror,msgerror,1700);		
				$(idinput).focus();
				setTimeout(function() {$(bsubmit).removeAttr('disabled');}, 2500); 
				return false;
			} else return valinput;
			break;
						
	}
}

/*************************************/

var paramsArray = new Array();

function loginSuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			openandclose(paramsArray[0], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
		case '1':
			location.href = siteurl + 'ss-admin/general';
			break;
	}

}

function loginError(msg) {
	openandclose(paramsArray[0], msg_error_conection, 1700);
	setTimeout(function() {$(paramsArray[1]).removeAttr('disabled');}, 2500); 
}


function login(diverror, bsubmit) {

	$(bsubmit).attr('disabled','true');

	email = validationInput('email', '#email', '#alert-email', error_email, bsubmit);
	if (!email) return;

	password = validationInput('password', '#password', '#alert-password', error_password, bsubmit);
	if (!password) return;
	
	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	
	invoke_ajax('backend/login', 'POST', 'em=' + email + '&pw=' + password, loginSuccess, loginError);

}

/*************************************/

function updateGeneralSuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			openandclose(paramsArray[0], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
		case '1':
			openandclose(paramsArray[2], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
	}

}

function updateGeneralError(msg) {
	openandclose(paramsArray[0], msg_error_conection, 1700);
	setTimeout(function() {$(paramsArray[1]).removeAttr('disabled');}, 2500); 
}

function updateInfoSite(diverror, divok, bsubmit) {
	$(bsubmit).attr('disabled','true');

	thetitle = validationInput('empty', '#site_title', diverror, error_title, bsubmit);
	if (!thetitle) return;
	
	thedescription = validationInput('empty', '#site_description', diverror, error_description, bsubmit);
	if (!thedescription) return;

	thekeywords = validationInput('empty', '#site_keywords', diverror, error_keywords, bsubmit);
	if (!thekeywords) return;

	thecompany = validationInput('empty', '#your_company', diverror, error_company, bsubmit);
	if (!thecompany) return;
	
	your_fb = $.trim($('#your_fb').val());
	your_tw = $.trim($('#your_tw').val());
	your_yt = $.trim($('#your_yt').val());

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-general', 'POST', 'theaction=1&tt=' + thetitle + '&dd=' + thedescription + '&kk=' + thekeywords + '&cc=' + thecompany + '&yfb=' + your_fb + '&ytw=' + your_tw + '&yyt=' + your_yt, updateGeneralSuccess, updateGeneralError);

}

function updateThemeLanguage(diverror, divok, bsubmit) {
	$(bsubmit).attr('disabled','true');

	colorTheme = validationInput('empty', '#color-theme', diverror, error_colortheme, bsubmit);
	if (!colorTheme) return;
	
	theLanguage = validationInput('empty', '#language', diverror, error_language, bsubmit);
	if (!theLanguage) return;

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-general', 'POST', 'theaction=2&ct=' + colorTheme + '&ll=' + theLanguage, updateGeneralSuccess, updateGeneralError);

}

function updateQuantities(diverror, divok, bsubmit) {
	$(bsubmit).attr('disabled','true');

	qproducts = validationInput('empty', '#qproducts', diverror, error_qproducts, bsubmit);
	if (!qproducts) return;
	
	qmostviewed = validationInput('empty', '#qmostviewed', diverror, error_qmostviewed, bsubmit);
	if (!qmostviewed) return;

	qtoplist = validationInput('empty', '#qtoplist', diverror, error_qtoplist, bsubmit);
	if (!qtoplist) return;

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-general', 'POST', 'theaction=3&qp=' + qproducts + '&qm=' + qmostviewed + '&qt=' + qtoplist, updateGeneralSuccess, updateGeneralError);

}

function updateFacebookID(diverror, divok, bsubmit) {

	fbid = validationInput('empty', '#fbid', diverror, error_fbid, bsubmit);
	if (!fbid) return;
	
	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-general', 'POST', 'theaction=4&fid=' + fbid, updateGeneralSuccess, updateGeneralError);

}

function resetIDCookie(diverror, divok, bsubmit) {

	$(bsubmit).attr('disabled','true');

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	invoke_ajax('backend/admin-general', 'POST', 'theaction=5', updateGeneralSuccess, updateGeneralError);

}

/*************************************/

function updateInfoAdmin(diverror, divok, bsubmit) {
	$(bsubmit).attr('disabled','true');

	firstname = validationInput('empty', '#firstname', diverror, error_firstname, bsubmit);
	if (!firstname) return;
	
	lastname = validationInput('empty', '#lastname', diverror, error_lastname, bsubmit);
	if (!lastname) return;

	theemail = validationInput('empty', '#email', diverror, error_email, bsubmit);
	if (!theemail) return;

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-info', 'POST', 'theaction=1&fn=' + firstname + '&ln=' + lastname + '&em=' + theemail, updateGeneralSuccess, updateGeneralError);

}

/*************************************/

function updateAccessAdminSuccess(msg) {
	switch (msg.charAt(0)) {
		case '0':
			openandclose(paramsArray[0], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
		case '1':
			openandclose(paramsArray[2], msg.substring(3), 1700);
			$('#currentpass').val('');
			$('#newpass').val('');
			$('#repeatnewpass').val('');
			$('#currentpass').focus();
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
	}
}

function updateAccessAdmin(diverror, divok, bsubmit) {
	$(bsubmit).attr('disabled','true');

	currentpass = validationInput('empty', '#currentpass', diverror, error_currentpass, bsubmit);
	if (!currentpass) return;
	
	newpass = validationInput('empty', '#newpass', diverror, error_newpass, bsubmit);
	if (!newpass) return;

	repeatnewpass = validationInput('empty', '#repeatnewpass', diverror, error_repeatcurrentpass, bsubmit);
	if (!repeatnewpass) return;
	
	if (newpass != repeatnewpass) {
		$(bsubmit).attr('disabled','true');
		openandclose(diverror,error_passnotequal,1700);
		$('#repeatnewpass').focus();
		setTimeout(function() { $(bsubmit).removeAttr('disabled'); }, 2000);
		return;
	}

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-info', 'POST', 'theaction=2&cp=' + currentpass + '&np=' + newpass, updateAccessAdminSuccess, updateGeneralError);

}

/*************************************/

function updateSection(diverror, divok, bsubmit, thesection) {
	if (thesection == 1) {
		sectionHTML = validationInput('empty', '#section1', diverror, error_notext, bsubmit);
		if (!sectionHTML) return;		
	}

	if (thesection == 2) {
		sectionHTML = validationInput('empty', '#section2', diverror, error_notext, bsubmit);
		if (!sectionHTML) return;		
	}

	if (thesection == 3) {
		sectionHTML = validationInput('empty', '#section3', diverror, error_notext, bsubmit);
		if (!sectionHTML) return;		
	}

	if (thesection == 4) {
		sectionHTML = validationInput('empty', '#section4', diverror, error_notext, bsubmit);
		if (!sectionHTML) return;		
	}

	if (thesection == 5) {
		sectionHTML = validationInput('empty', '#section5', diverror, error_notext, bsubmit);
		if (!sectionHTML) return;		
	}
	
	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-sections', 'POST', 'theaction='+ thesection + '&shtml=' + encodeURIComponent(sectionHTML), updateGeneralSuccess, updateGeneralError);

}
		
/*************************************/

function categoryAddSuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			openandclose(paramsArray[0], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
		case '1':
			location.href = siteurl + 'ss-admin/categories';
			break;
	}

}

function categoryError(msg) {
	openandclose(paramsArray[0], msg_error_conection, 1700);
	setTimeout(function() {$(paramsArray[1]).removeAttr('disabled');}, 2500); 
}

function createCategory(diverror, divok, bsubmit) {

	categoryname = validationInput('empty', '#categoryname', diverror, error_namecategory, bsubmit);
	if (!categoryname) return;		

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-categories', 'POST', 'theaction=1&cn=' + encodeURIComponent(categoryname), categoryAddSuccess, categoryError);

}
		
/*************************************/

function categoryUpdateSuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			openandclose(paramsArray[0], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
		case '1':
			$('#name_' + paramsArray[2]).html(paramsArray[3]);
			$('#area_form_' + paramsArray[2]).slideUp('slow', function(){$('#name_' + paramsArray[2]).slideDown('slow', function(){  $('#link-edit-' + paramsArray[2]).removeAttr('disabled'); });});
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
	}

}

function updateCategory(idcategory, category, diverror, bsubmit) {

	categoryname = validationInput('empty', category, diverror, error_namecategory, bsubmit);
	if (!categoryname) return;		

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = idcategory;
	paramsArray[3] = categoryname;
	
	invoke_ajax('backend/admin-categories', 'POST', 'theaction=2&cn=' + encodeURIComponent(categoryname) + '&ic=' + idcategory, categoryUpdateSuccess, categoryError);
	
}

/*************************************/

function categoryDeleteSuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			alert(msg.substring(3));
			break;
		case '1':
			$('#onerow_' + paramsArray[0]).slideUp("slow",function(){
				$('#onerow_' + paramsArray[0]).hide();
			});
			break;
	}

}

function categoryDeleteError(msg) {
	alert(msg_error_conection);
}

function deleteCategory(idcategory) {

	paramsArray[0] = idcategory;
	invoke_ajax('backend/admin-categories', 'POST', 'theaction=3&ic=' + idcategory, categoryDeleteSuccess, categoryDeleteError);

}

/*************************************/

function createSocialPaySuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			openandclose(paramsArray[0], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
		case '1':
			location.href = siteurl + 'ss-admin/socialpay';
			break;
	}

}

function createSocialPayError(msg) {
	openandclose(paramsArray[0], msg_error_conection, 1700);
	setTimeout(function() {$(paramsArray[1]).removeAttr('disabled');}, 2500); 
}

function createSocialPay(diverror, divok, bsubmit) {
	
	theparams = '';
	
	spname = validationInput('empty', '#spname', diverror, error_namesocialpay, bsubmit);
	if (!spname) return;
	
	theparams = theparams + 'spname=' + spname;
	
	/** fblike **/
	fblike_available = 0;
	if ($("#fblike-available").is(':checked')) fblike_available = 1;
	
	fblike_url = $.trim($('#fblike-url').val());

	theparams = theparams + '&fblike_available=' + fblike_available + '&fblike_url=' + encodeURIComponent(fblike_url);

	/** gplus **/
	gplus_available = 0;
	if ($("#gplus-available").is(':checked')) gplus_available = 1;	

	gplus_url = $.trim($('#gplus-url').val());

	theparams = theparams + '&gplus_available=' + gplus_available + '&gplus_url=' + encodeURIComponent(gplus_url);

	/** twtweet **/
	twtweet_available = 0;
	if ($("#twtweet-available").is(':checked')) twtweet_available = 1;	

	twtweet_url = $.trim($('#twtweet-url').val());
	twtweet_tweet = $.trim($('#twtweet-tweet').val());
	
	theparams = theparams + '&twtweet_available=' + twtweet_available + '&twtweet_url=' + encodeURIComponent(twtweet_url) + '&twtweet_tweet=' + encodeURIComponent(twtweet_tweet);

	/** fbshare**/
	fbshare_available = 0;
	if ($("#fbshare-available").is(':checked')) fbshare_available = 1;	

	fbshare_url = $.trim($('#fbshare-url').val());
	
	theparams = theparams + '&fbshare_available=' + fbshare_available + '&fbshare_url=' + encodeURIComponent(fbshare_url);

	/** twfollow **/
	twfollow_available = 0;
	if ($("#twfollow-available").is(':checked')) twfollow_available = 1;	

	twfollow_url = $.trim($('#twfollow-url').val());
	
	theparams = theparams + '&twfollow_available=' + twfollow_available + '&twfollow_url=' + encodeURIComponent(twfollow_url);

	/** lkshare **/
	lkshare_available = 0;
	if ($("#lkshare-available").is(':checked')) lkshare_available = 1;	
	
	lkshare_url = $.trim($('#lkshare-url').val());
	
	theparams = theparams + '&lkshare_available=' + lkshare_available + '&lkshare_url=' + encodeURIComponent(lkshare_url);

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	
	invoke_ajax('backend/admin-socialpay', 'POST', 'theaction=1&' + theparams, createSocialPaySuccess, createSocialPayError);
}

/*************************************/

function updateSocialPaySuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			openandclose(paramsArray[0], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
		case '1':
			openandclose(paramsArray[2], msg.substring(3), 1700);
			setTimeout(function() { $(paramsArray[1]).removeAttr('disabled'); }, 2500);
			break;
	}

}

function updateSocialPayError(msg) {
	openandclose(paramsArray[0], msg_error_conection, 1700);
	setTimeout(function() {$(paramsArray[1]).removeAttr('disabled');}, 2500); 
}

function updateSocialPay(diverror, divok, bsubmit) {

	theparams = '';
	
	spname = validationInput('empty', '#spname', diverror, error_namesocialpay, bsubmit);
	if (!spname) return;
	
	theparams = theparams + 'spname=' + spname;
	
	/** fblike **/
	fblike_available = 0;
	if ($("#fblike-available").is(':checked')) fblike_available = 1;
	
	fblike_url = $.trim($('#fblike-url').val());

	theparams = theparams + '&fblike_available=' + fblike_available + '&fblike_url=' + encodeURIComponent(fblike_url);

	/** gplus **/
	gplus_available = 0;
	if ($("#gplus-available").is(':checked')) gplus_available = 1;	

	gplus_url = $.trim($('#gplus-url').val());

	theparams = theparams + '&gplus_available=' + gplus_available + '&gplus_url=' + encodeURIComponent(gplus_url);

	/** twtweet **/
	twtweet_available = 0;
	if ($("#twtweet-available").is(':checked')) twtweet_available = 1;	

	twtweet_url = $.trim($('#twtweet-url').val());
	twtweet_tweet = $.trim($('#twtweet-tweet').val());
	
	theparams = theparams + '&twtweet_available=' + twtweet_available + '&twtweet_url=' + encodeURIComponent(twtweet_url) + '&twtweet_tweet=' + encodeURIComponent(twtweet_tweet);

	/** fbshare**/
	fbshare_available = 0;
	if ($("#fbshare-available").is(':checked')) fbshare_available = 1;	

	fbshare_url = $.trim($('#fbshare-url').val());
	
	theparams = theparams + '&fbshare_available=' + fbshare_available + '&fbshare_url=' + encodeURIComponent(fbshare_url);

	/** twfollow **/
	twfollow_available = 0;
	if ($("#twfollow-available").is(':checked')) twfollow_available = 1;	

	twfollow_url = $.trim($('#twfollow-url').val());
	
	theparams = theparams + '&twfollow_available=' + twfollow_available + '&twfollow_url=' + encodeURIComponent(twfollow_url);

	/** lkshare **/
	lkshare_available = 0;
	if ($("#lkshare-available").is(':checked')) lkshare_available = 1;	
	
	lkshare_url = $.trim($('#lkshare-url').val());
	
	theparams = theparams + '&lkshare_available=' + lkshare_available + '&lkshare_url=' + encodeURIComponent(lkshare_url);
	
	theparams = 'idsp=' + $('#idsp').val() + '&' + theparams;

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-socialpay', 'POST', 'theaction=2&' + theparams, updateSocialPaySuccess, updateSocialPayError);

}

/*************************************/

function socialpayDeleteSuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			alert(msg.substring(3));
			break;
		case '1':
			$('#onerow_' + paramsArray[0]).slideUp("slow",function(){
				$('#onerow_' + paramsArray[0]).hide();
			});
			break;
	}

}

function socialpayDeleteError(msg) {
	alert(msg_error_conection);
}

function deleteSocialPay(idsocialpay) {

	paramsArray[0] = idsocialpay;
	invoke_ajax('backend/admin-socialpay', 'POST', 'theaction=3&isp=' + idsocialpay, socialpayDeleteSuccess, socialpayDeleteError);

}

/*************************************/

function productsDeleteSuccess(msg) {

	switch (msg.charAt(0)) {
		case '0':
			alert(msg.substring(3));
			break;
		case '1':
			$('#onerow_' + paramsArray[0]).slideUp("slow",function(){
				$('#onerow_' + paramsArray[0]).hide();
			});
			break;
	}

}

function productsDeleteError(msg) {
	alert(msg_error_conection);
}

function deleteProduct(idproduct) {

	paramsArray[0] = idproduct;
	invoke_ajax('backend/admin-products', 'POST', 'theaction=1&ip=' + idproduct, productsDeleteSuccess, productsDeleteError);

}

/*************************************/

function validateProduct(diverror, divok, bsubmit) {

	pcategory = $('#pcategory').val();
	if (pcategory == 0) {
		$(bsubmit).attr('disabled','true');
		openandclose(diverror,error_product_category,1700);		
		$('#pcategory').focus();
		setTimeout(function() {$(bsubmit).removeAttr('disabled');}, 2500);
		return false;		
	}
		
	productname = validationInput('empty', '#productname', '#alert-product', error_product_name, bsubmit);
	if (!productname) return false;

	pdescription = validationInput('empty', '#pdescription', '#alert-product', error_product_description, bsubmit);
	if (!pdescription) return false;

	imgproduct = validationInput('empty', '#imgproduct', '#alert-product', error_product_image, bsubmit);
	if (!imgproduct) return false;

	socialpay = $('#socialpay').val();
	if (socialpay == 0) {
		$(bsubmit).attr('disabled','true');
		openandclose(diverror,error_product_socialpay,1700);		
		$('#socialpay').focus();
		setTimeout(function() {$(bsubmit).removeAttr('disabled');}, 2500);
		return false;		
	}

	plink = '';
	fileproduct = '';
	ptype = $('#ptype').val();
	if (ptype == 1) {
		plink = validationInput('empty', '#plink', '#alert-product', error_product_thelink, bsubmit);
		if (!plink) return false;
	} else {
		fileproduct = validationInput('empty', '#fileproduct', '#alert-product', error_product_thefile, bsubmit);
		if (!fileproduct) return false;
	}
	
	return true;
}

/*************************************/

function updateProduct01(diverror, divok, bsubmit) {

	pcategory = $('#pcategory').val();

	if (pcategory == 0) {
		$(bsubmit).attr('disabled','true');
		openandclose(diverror,error_product_category,1700);		
		$('#pcategory').focus();
		setTimeout(function() {$(bsubmit).removeAttr('disabled');}, 2500);
		return false;		
	}
		
	productname = validationInput('empty', '#productname', '#alert-info01', error_product_name, bsubmit);
	if (!productname) return false;

	pdescription = validationInput('empty', '#pdescription', '#alert-info01', error_product_description, bsubmit);
	if (!pdescription) return false;

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-products', 'POST', 'theaction=2&idp=' + idproduct + '&pc=' + pcategory + '&pn=' + encodeURIComponent(productname) + '&pd=' + encodeURIComponent(pdescription), updateGeneralSuccess, updateGeneralError);

}

/*************************************/

function invoke_ajax_file(theUrl, theType, theData, fSuccess, fError) {

	$.ajax({
		type: theType,
		url: siteurl + theUrl,
		data: theData,
        cache: false,
        contentType: false,
	    processData: false,
		success: function(resp) { 
			fSuccess(resp);
		},
		error: function() {
			fError();
		}
	});

}

function updateProduct02(diverror, divok, bsubmit) {

	imgproduct = validationInput('empty', '#imgproduct', '#alert-info02', error_product_image, bsubmit);
	if (!imgproduct) return false;

	var formData = new FormData(document.getElementById("form-info02"));
    formData.append("mynfo", "myvalue");		
	
	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;	
	
	invoke_ajax_file('backend/admin-products', 'POST', formData, updateGeneralSuccess, updateGeneralError);

}

/*************************************/

function updateProduct03(diverror, divok, bsubmit) {

	socialpay = $('#socialpay').val();

	if (socialpay == 0) {
		$(bsubmit).attr('disabled','true');
		openandclose(diverror, error_product_socialpay, 1700);		
		$('#socialpay').focus();
		setTimeout(function() {$(bsubmit).removeAttr('disabled');}, 2500);
		return false;		
	}
		
	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;
	
	invoke_ajax('backend/admin-products', 'POST', 'theaction=4&idp=' + idproduct + '&idsp=' + socialpay, updateGeneralSuccess, updateGeneralError);

}

/*************************************/

function updateProduct04(diverror, divok, bsubmit) { 

	ptype = $('#ptype').val();
	if (ptype == 1) {
		plink = validationInput('empty', '#plink', '#alert-info04', error_product_thelink, bsubmit);
		if (!plink) return false;
	} else {
		fileproduct = validationInput('empty', '#fileproduct', '#alert-info04', error_product_thefile, bsubmit);
		if (!fileproduct) return false;
	}

	var formData = new FormData(document.getElementById("form-info04"));
    formData.append("mynfo", "myvalue");		
	
	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;	
	
	invoke_ajax_file('backend/admin-products', 'POST', formData, updateGeneralSuccess, updateGeneralError);

}

/*************************************/

function updateAds(diverror, divok, bsubmit, theAds) {

	paramsArray[0] = diverror;
	paramsArray[1] = bsubmit;
	paramsArray[2] = divok;

	if (theAds == 1) {
		AdsCode1 = $('#ads-home1').val();
        AdsCode2 = $('#ads-home2').val();
    	invoke_ajax('backend/admin-ads', 'POST', 'theaction=1&codeads1=' + encodeURIComponent(AdsCode1) + '&codeads2=' + encodeURIComponent(AdsCode2), updateGeneralSuccess, updateGeneralError);
	}

	if (theAds == 2) {
		AdsCode1 = $('#ads-toplist1').val();
        AdsCode2 = $('#ads-toplist2').val();
    	invoke_ajax('backend/admin-ads', 'POST', 'theaction=2&codeads1=' + encodeURIComponent(AdsCode1) + '&codeads2=' + encodeURIComponent(AdsCode2), updateGeneralSuccess, updateGeneralError);
	}

	if (theAds == 3) {
		AdsCode1 = $('#ads-mostviewed1').val();
        AdsCode2 = $('#ads-mostviewed2').val();
    	invoke_ajax('backend/admin-ads', 'POST', 'theaction=3&codeads1=' + encodeURIComponent(AdsCode1) + '&codeads2=' + encodeURIComponent(AdsCode2), updateGeneralSuccess, updateGeneralError);
	}

	if (theAds == 4) {
		AdsCode1 = $('#ads-details-1').val();
		AdsCode2 = $('#ads-details-2').val();
		AdsCode3 = $('#ads-details-3').val();
    	invoke_ajax('backend/admin-ads', 'POST', 'theaction=4&codeads1=' + encodeURIComponent(AdsCode1) + '&codeads2=' + encodeURIComponent(AdsCode2) + '&codeads3=' + encodeURIComponent(AdsCode3), updateGeneralSuccess, updateGeneralError);
	}

}

/*************************************/
