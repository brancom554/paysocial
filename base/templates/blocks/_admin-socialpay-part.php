<div id="general-part">
	<div id="title-part"><?php echo $this->lang('admin_socialpay_title')?></div>
    <div id="space-badd"><button id="badd" type="button" class="btn btn-success"><?php echo $this->lang('admin_socialpay_badd')?></button></div>
    <div id="space-form" class="myhide">
        <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_socialpay_subtitle_add')?></div>
        <div id="form-part-1" class="form-part">
            <form method="POST" id="form-socialpay" name="form-socialpay" role="form">
                <div class="input-group">
                    <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_socialpay_name')?></span>
                    <input type="text" class="form-control" id="spname" name="spname" aria-describedby="basic-addon3" placeholder="<?php echo $this->lang('admin_socialpay_phname')?>">
                </div>

				<h2></h2>                
                
                <div class="subtitle"><?php echo $this->lang('admin_socialpay_txt_payment')?></div>
                
                <div id="tabs-social">
                	
                    <div class="row">
                        <div class="col-xs-3 col-md-2">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tabs-left" role="tablist">
                                <li role="presentation" class="active"><a href="#fblike" aria-controls="fblike" role="tab" data-toggle="tab"><span id="ok_fb_like_available" class="myhide"><img src="<?php echo $K->BASE_URL?>images/icook.png"></span> <span><img src="<?php echo $K->BASE_URL?>images/fb-like-admin.png"></span></a></li>
                                <li role="presentation"><a href="#gplus" aria-controls="gplus" role="tab" data-toggle="tab"><span id="ok_gplus_available" class="myhide"><img src="<?php echo $K->BASE_URL?>images/icook.png"></span> <span><img src="<?php echo $K->BASE_URL?>images/gplus-admin.png"></span></a></li>
                                <li role="presentation"><a href="#twtweet" aria-controls="twtweet" role="tab" data-toggle="tab"><span id="ok_tw_tweet_available" class="myhide"><img src="<?php echo $K->BASE_URL?>images/icook.png"></span> <span><img src="<?php echo $K->BASE_URL?>images/tw-tweet-admin.png"></span></a></li>
                                <li role="presentation"><a href="#fbshare" aria-controls="fbshare" role="tab" data-toggle="tab"><span id="ok_fb_share_available" class="myhide"><img src="<?php echo $K->BASE_URL?>images/icook.png"></span> <span><img src="<?php echo $K->BASE_URL?>images/fb-share-admin.png"></span></a></li>
                                <li role="presentation"><a href="#twfollow" aria-controls="twfollow" role="tab" data-toggle="tab"><span id="ok_tw_follow_available" class="myhide"><img src="<?php echo $K->BASE_URL?>images/icook.png"></span> <span><img src="<?php echo $K->BASE_URL?>images/tw-follow-admin.png"></span></a></li>
                                <li role="presentation"><a href="#lkshare" aria-controls="lkshare" role="tab" data-toggle="tab"><span id="ok_in_share_available" class="myhide"><img src="<?php echo $K->BASE_URL?>images/icook.png"></span> <span><img src="<?php echo $K->BASE_URL?>images/lk-share-admin.png"></span></a></li>
                            </ul>
                        </div>


                        <div class="col-xs-9 col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                        
                                <div role="tabpanel" class="tab-pane active" id="fblike">
                                    <div class="title-social"><span>Facebook Like</span></div>
                                    
                                    <div class="checkbox"><label><input type="checkbox" id="fblike-available"><?php echo $this->lang('admin_socialpay_available')?></label></div>
                                    <div style="margin-top:20px;"></div>
                                    <div class="form-group">
                                    	<label for="fblike-url" class="labelix"><?php echo $this->lang('admin_socialpay_fblike_url')?>:</label>
                                        <input type="text" class="form-control" id="fblike-url" name="fblike-url" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="msgfield"><?php echo $this->lang('admin_socialpay_fblike_urlmsg')?></div>
                                </div>
                        
                                <div role="tabpanel" class="tab-pane" id="gplus">
                                    <div class="title-social"><span>Google +</span></div>
                                    <div class="checkbox"><label><input type="checkbox" id="gplus-available"><?php echo $this->lang('admin_socialpay_available')?></label></div>
                                    <div style="margin-top:20px;"></div>
                                    <div class="form-group">
                                    	<label for="gplus-url" class="labelix"><?php echo $this->lang('admin_socialpay_gplus_url')?>:</label>
                                        <input type="text" class="form-control" id="gplus-url" name="gplus-url" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="msgfield"><?php echo $this->lang('admin_socialpay_gplus_urlmsg')?></div>
                                </div>
                        
                        		
                                <div role="tabpanel" class="tab-pane" id="twtweet">
                                    <div class="title-social"><span>Twitter Tweet</span></div>
                                    <div class="checkbox"><label><input type="checkbox" id="twtweet-available"><?php echo $this->lang('admin_socialpay_available')?></label></div>
                                    <div style="margin-top:20px;"></div>
                                    <div class="form-group">
                                    	<label for="twtweet-url" class="labelix"><?php echo $this->lang('admin_socialpay_tw_tweet_url')?>:</label>
                                        <input type="text" class="form-control" id="twtweet-url" name="twtweet-url" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="msgfield"><?php echo $this->lang('admin_socialpay_tw_tweet_urlmsg')?></div>
                                    <div style="margin-top:20px;"></div>
                                    <div class="form-group">
                                    	<label for="twtweet-tweet" class="labelix"><?php echo $this->lang('admin_socialpay_tw_tweet_tweet')?>:</label>
                                        <textarea type="text" class="form-control" id="twtweet-tweet" name="twtweet-tweet" aria-describedby="basic-addon3"></textarea>
                                    </div>
                                    <div class="msgfield"><?php echo $this->lang('admin_socialpay_tw_tweet_tweetmsg')?></div>
                                </div>
                        
                        
                                <div role="tabpanel" class="tab-pane" id="fbshare">
                                    <div class="title-social"><span>Facebook Share</span></div>
                                    <div class="checkbox"><label><input type="checkbox" id="fbshare-available"><?php echo $this->lang('admin_socialpay_available')?></label></div>
                                    <div style="margin-top:20px;"></div>
                                    <div class="form-group">
                                    	<label for="fbshare-url" class="labelix"><?php echo $this->lang('admin_socialpay_fbshare_url')?>:</label>
                                        <input type="text" class="form-control" id="fbshare-url" name="fbshare-url" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="msgfield"><?php echo $this->lang('admin_socialpay_fbshare_urlmsg')?></div>
                                </div>
                        
                        
                                <div role="tabpanel" class="tab-pane" id="twfollow">
                                    <div class="title-social"><span>Twitter Follow</span></div>
                                    <div class="checkbox"><label><input type="checkbox" id="twfollow-available"><?php echo $this->lang('admin_socialpay_available')?></label></div>
                                    <div style="margin-top:20px;"></div>
                                    <div class="form-group">
                                    	<label for="twfollow-url" class="labelix"><?php echo $this->lang('admin_socialpay_twfollow_url')?>:</label>
                                        <input type="text" class="form-control" id="twfollow-url" name="twfollow-url" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="msgfield"><?php echo $this->lang('admin_socialpay_twfollow_urlmsg')?></div>
                                </div>
                        
                        
                                <div role="tabpanel" class="tab-pane" id="lkshare">
                                    <div class="title-social"><span>Linkedin Share</span></div>
                                    <div class="checkbox"><label><input type="checkbox" id="lkshare-available"><?php echo $this->lang('admin_socialpay_available')?></label></div>
                                    <div style="margin-top:20px;"></div>
                                    <div class="form-group">
                                    	<label for="lkshare-url" class="labelix"><?php echo $this->lang('admin_socialpay_lkshare_url')?>:</label>
                                        <input type="text" class="form-control" id="lkshare-url" name="lkshare-url" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="msgfield"><?php echo $this->lang('admin_socialpay_lkshare_urlmsg')?></div>
                                </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
                
                <h2></h2>                
    			
                <div id="alert-socialpay" class="alert alert-danger myhide" role="alert"></div>
                <div id="alert-socialpay-ok" class="alert alert-success myhide" role="alert"></div>
                
                <div style="margin-top:20px;"></div>
                
                <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_socialpay_bsubmit')?>" type="submit">
                <span class="btn btn-default" role="button" id="bcancel"><?php echo $this->lang('admin_socialpay_bcancel')?></span>
            </form>
        </div>
	</div>
    
	<div id="area-list-socialpay" class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th class="center"><?php echo $this->lang('admin_socialpay_table_name'); ?></th>
                <th class="center"><?php echo $this->lang('admin_socialpay_table_payment'); ?></th>
                <th class="center"><?php echo $this->lang('admin_socialpay_table_edit'); ?></th>
                <th class="center"><?php echo $this->lang('admin_socialpay_table_delete'); ?></th>
            </tr>
		</thead>
        <tbody>
        <?php foreach($D->arrayPays as $onepay) { ?>
            <tr id="onerow_<?php echo $onepay->idsocialpay?>">
                <td>
					<div id="name_<?php echo $onepay->idsocialpay?>"><?php echo stripslashes($onepay->name_socialpay); ?></div>
                </td>
                <td class="center">
                	<?php if ($onepay->fb_like_available == 1) { ?><span class="iconsocial"><img src="<?php echo $K->BASE_URL?>images/fb-like-icon.png"></span><?php } ?>
                	<?php if ($onepay->gplus_available == 1) { ?><span class="iconsocial"><img src="<?php echo $K->BASE_URL?>images/gplus-icon.png"></span><?php } ?>
                	<?php if ($onepay->tw_tweet_available == 1) { ?><span class="iconsocial"><img src="<?php echo $K->BASE_URL?>images/tw-tweet-icon.png"></span><?php } ?>
                	<?php if ($onepay->fb_share_available == 1) { ?><span class="iconsocial"><img src="<?php echo $K->BASE_URL?>images/fb-share-icon.png"></span><?php } ?>
                	<?php if ($onepay->tw_follow_available == 1) { ?><span class="iconsocial"><img src="<?php echo $K->BASE_URL?>images/tw-follow-icon.png"></span><?php } ?>
                	<?php if ($onepay->in_share_available == 1) { ?><span class="iconsocial"><img src="<?php echo $K->BASE_URL?>images/lk-icon.png"></span><?php } ?>
                </td>
                <td class="center"><span id="link-edit-<?php echo $onepay->idsocialpay?>" class="link-blue"><a href="<?php echo $K->SITE_URL?>ss-admin/socialpay/edit/s:<?php echo $onepay->code?>"><?php echo $this->lang('admin_socialpay_table_edit')?></a></span></td>
                <td class="center"><span id="link-delete-<?php echo $onepay->idsocialpay?>" class="link-blue"><a href="#"><?php echo $this->lang('admin_socialpay_table_delete')?></a></span></td>
            </tr>
            
            <script>
				var msg_delete = '<?php echo strJS($this->lang('admin_socialpay_msg_delete'));?>';
				$('#link-delete-<?php echo $onepay->idsocialpay?>').click(function(){
					if (confirm(msg_delete)) {
						deleteSocialPay(<?php echo $onepay->idsocialpay?>);
					}
					return false;					
				});
            </script>
            
        <?php } ?>
        </tbody>
        </table>
    </div>


</div>
<script>
	var error_namesocialpay = '<?php echo strJS($this->lang('admin_socialpay_error_name'));?>';
	$('#bsubmit1').click(function(){
		createSocialPay('#alert-socialpay','#alert-socialpay-ok','#bsubmit1');
		return false;
	});

	$('#bcancel').click(function(){
		$('#space-form').slideUp('slow', function(){$('#space-badd').slideDown('slow');});
		return false;
	});

	$('#badd').click(function(){
		$('#space-badd').slideUp('slow', function(){$('#space-form').slideDown('slow');});
		return false;
	});
	
	$('#fblike-available').click(function(){
		if ($("#fblike-available").is(':checked')) $("#ok_fb_like_available").show();
		else $("#ok_fb_like_available").hide();
	});

	$('#gplus-available').click(function(){
		if ($("#gplus-available").is(':checked')) $("#ok_gplus_available").show();
		else $("#ok_gplus_available").hide();
	});

	$('#twtweet-available').click(function(){
		if ($("#twtweet-available").is(':checked')) $("#ok_tw_tweet_available").show();
		else $("#ok_tw_tweet_available").hide();
	});

	$('#fbshare-available').click(function(){
		if ($("#fbshare-available").is(':checked')) $("#ok_fb_share_available").show();
		else $("#ok_fb_share_available").hide();
	});

	$('#twfollow-available').click(function(){
		if ($("#twfollow-available").is(':checked')) $("#ok_tw_follow_available").show();
		else $("#ok_tw_follow_available").hide();
	});

	$('#lkshare-available').click(function(){
		if ($("#lkshare-available").is(':checked')) $("#ok_in_share_available").show();
		else $("#ok_in_share_available").hide();
	});

</script>