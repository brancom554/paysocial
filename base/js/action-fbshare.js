jQuery(document).ready(function() {
    
	function actionDSuccessFBS(msg) {
	
		switch (msg.charAt(0)) {
			case '0':
				$('#preload').hide();
				openandclose('#alert-paysocial', msg.substring(3), 1700);
				break;
			case '1':
				$('#preload').hide();
				$('#area-socialpay').fadeOut("slow",function(){
					$('#area-socialpay').hide(function(){
						$('#alert-paysocial-ok').fadeIn('slow');
					});
				});
				window.location.replace(siteurl + 'download/i:' + msg.substring(3) + '');
				break;
		}
	
	}

	function actionLSuccessFBS(msg) {
	
		switch (msg.charAt(0)) {
			case '0':
				$('#preload').hide();
				openandclose('#alert-paysocial', msg.substring(3), 1700);
				break;
			case '1':
				$('#preload').hide();
				$('#thelink').html('<a href="' + msg.substring(3) + '" target="_blank">' + msg.substring(3) + '</a>');
				$('#area-socialpay').fadeOut("slow",function(){
					$('#area-socialpay').hide(function(){
						$('#alert-paysocial-ok').fadeIn('slow');
						$('#space_link_prod').fadeIn('slow');
					});
				});
				break;
		}
	
	}
		
	function actionErrorFBS(msg) {
		openandclose('#alert-paysocial', msg.substring(3), 1700);
	}
	
	$('#linkShareFB').click(function(e) {
		e.preventDefault();
		FB.ui({
			method: 'feed',
			link: theURLShare,
			/*name: theCaptionShare,
			description: theDescriptionShare,*/
		}, 
		function(response) {
			if (response) {

				$('#preload').show();
		
				$('#area-fbshare').fadeOut("slow",function(){
					$('#area-fbshare').hide(function(){
						$('#alert-paysocial-ok').fadeIn('slow');
					});
				});
				
				if (type_product == 2) {
				
					invoke_ajax('backend/download', 'POST', 'pcode=' + pcode, actionDSuccessFBS, actionErrorFBS);
				
				} else {
					
					invoke_ajax('backend/showlink', 'POST', 'pcode=' + pcode + '&ik=' + pikey, actionLSuccessFBS, actionErrorFBS);
				
				}

			}
		});
	});
});