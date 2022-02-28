<div id="general-part">
	<div id="title-part"><?php echo $this->lang('admin_info_title')?></div>
    
    <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_info_subtitle1')?></div>
    <div id="form-part-1" class="form-part">
    	<form method="POST" id="form-infoadmin" name="form-infoadmin" role="form">
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_info_firstname')?></span>
                <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="basic-addon3" value="<?php echo $D->firstname; ?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_info_lastname')?></span>
                <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="basic-addon3" value="<?php echo $D->lastname; ?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_info_email')?></span>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="basic-addon3" value="<?php echo $D->email; ?>">
            </div>
            <div id="alert-infoadmin" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-infoadmin-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">

        </form>
    </div>

    <div id="subtitle-part-2" class="subtitle-part"><?php echo $this->lang('admin_info_subtitle2')?></div>
    <div id="form-part-2" class="form-part">
    	<form method="POST" id="form-infoaccess" name="form-infoaccess" role="form">
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_info_currentpass')?></span>
                <input type="password" class="form-control" id="currentpass" name="currentpass" aria-describedby="basic-addon3">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_info_newpass')?></span>
                <input type="password" class="form-control" id="newpass" name="newpass" aria-describedby="basic-addon3">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_info_repeatnewpass')?></span>
                <input type="password" class="form-control" id="repeatnewpass" name="repeatnewpass" aria-describedby="basic-addon3">
            </div>
            <div id="alert-infoaccess" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-infoaccess-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit2" name="bsubmit2" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">

        </form>
    </div>


</div>
<script>	
	var error_firstname = '<?php echo strJS($this->lang('admin_info_error_firstname'));?>';
	var error_lastname = '<?php echo strJS($this->lang('admin_info_error_lastname'));?>';
	var error_email = '<?php echo strJS($this->lang('admin_info_error_email'));?>';

	$('#bsubmit1').click(function(){
		updateInfoAdmin('#alert-infoadmin','#alert-infoadmin-ok','#bsubmit1');
		return false;
	});
	
	var error_currentpass = '<?php echo strJS($this->lang('admin_info_error_currentpass'));?>';
	var error_newpass = '<?php echo strJS($this->lang('admin_info_error_newpass'));?>';
	var error_repeatcurrentpass = '<?php echo strJS($this->lang('admin_info_error_repeatcurrentpass'));?>';
	var error_passnotequal = '<?php echo strJS($this->lang('admin_info_error_passnotequal'));?>';
	$('#bsubmit2').click(function(){
		updateAccessAdmin('#alert-infoaccess','#alert-infoaccess-ok','#bsubmit2');
		return false;
	});
	
</script>