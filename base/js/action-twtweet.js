
	function actionDSuccessTW(msg) {
	
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

	function actionLSuccessTW(msg) {
	
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
		
	function actionErrorTW(msg) {
		openandclose('#alert-paysocial', msg.substring(3), 1700);
	}


	twttr.ready(function (twttr) {
		twttr.events.bind("tweet", function(event) { 

		
		$('#preload').show();

		$('#area-twtweet').fadeOut("slow",function(){
			$('#area-twtweet').hide(function(){
				$('#alert-paysocial-ok').fadeIn('slow');
			});
		});
		
		if (type_product == 2) {
		
			invoke_ajax('backend/download', 'POST', 'pcode=' + pcode, actionDSuccessTW, actionErrorTW);
		
		} else {
			
			invoke_ajax('backend/showlink', 'POST', 'pcode=' + pcode + '&ik=' + pikey, actionLSuccessTW, actionErrorTW);
		
		}

		});
	});