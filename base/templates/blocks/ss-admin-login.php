<div id="form-login">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4 col-sm-3 col-xs-2"></div>
            <div class="int_login col-md-4 col-sm-6 col-xs-8">               
                <h3 id="title-login">{%login_title%}</h3>
                <form method="POST" id="formlogin" name="formlogin" role="form">    
                    <div class="form-group">
                        <label for="email">{%login_email%}:</label>
                        <input class="form-control" id="email" name="email" type="text">
                    </div>
                    <div id="alert-email" class="alert alert-danger myhide" role="alert"></div>
                    
                    <div class="form-group">
                        <label for="password">{%login_password%}:</label>
                        <input class="form-control" id="password" name="password" type="password">
                    </div>
                    <div id="alert-password" class="alert alert-danger myhide" role="alert"></div>
                    
                    <div id="alert-error-form" class="alert alert-danger myhide" role="alert"></div>
                    <div class="form-group">
                        <input class="btn btn-primary" id="bsubmit" value="{%login_bsubmit%}" type="submit">
                    </div>
                </form>
            </div>
        	<div class="col-md-4 col-sm-3 col-xs-2"></div>
        </div>
	</div>
</div>
<script>
	var error_email = '<?php echo strJS($this->page->lang('admin_login_error_email'))?>';
	var error_password = '<?php echo strJS($this->page->lang('admin_login_error_password'))?>';
	$('#bsubmit').click(function(){ 
		login('#alert-error-form', '#bsubmit');
		return false;
	})
</script>