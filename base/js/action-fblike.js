jQuery(document).ready(function() {
	
	function actionDSuccess(msg) {
	
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

	function actionLSuccess(msg) {
	
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
		
	function actionError(msg) {
		openandclose('#alert-paysocial', msg.substring(3), 1700);
	}

	FB.Event.subscribe("edge.create", function(href, widget) {
		
		$('#preload').show();

		$('#area-fblike').fadeOut("slow",function(){
			$('#area-fblike').hide(function(){
				$('#alert-paysocial-ok').fadeIn('slow');
			});
		});
		
		if (type_product == 2) {
		
			invoke_ajax('backend/download', 'POST', 'pcode=' + pcode, actionDSuccess, actionError);
		
		} else {
			
			invoke_ajax('backend/showlink', 'POST', 'pcode=' + pcode + '&ik=' + pikey, actionLSuccess, actionError);
		
		}

	});
});