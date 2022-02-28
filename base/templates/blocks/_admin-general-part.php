<div id="general-part">
	<div id="title-part"><?php echo $this->lang('admin_general_title')?></div>
    
    <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_general_subtitle1')?></div>
    <div id="form-part-1" class="form-part">
    	<form method="POST" id="form-infosite" name="form-infosite" role="form">
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_title_site')?></span>
                <input type="text" class="form-control" id="site_title" name="site_title" aria-describedby="basic-addon3" value="<?php echo $K->SITE_TITLE?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_site_description')?></span>
                <input type="text" class="form-control" id="site_description" name="site_description" aria-describedby="basic-addon3" value="<?php echo $K->SITE_DESCRIPTION?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_site_keywords')?></span>
                <input type="text" class="form-control" id="site_keywords" name="site_keywords" aria-describedby="basic-addon3" value="<?php echo $K->SITE_KEYWORDS?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_your_company')?></span>
                <input type="text" class="form-control" id="your_company" name="your_company" aria-describedby="basic-addon3" value="<?php echo $K->COMPANY?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_your_facebook')?></span>
                <input type="text" class="form-control" id="your_fb" name="your_fb" aria-describedby="basic-addon3" value="<?php echo $K->MY_FACEBOOK?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_your_twitter')?></span>
                <input type="text" class="form-control" id="your_tw" name="your_tw" aria-describedby="basic-addon3" value="<?php echo $K->MY_TWITTER?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_your_youtube')?></span>
                <input type="text" class="form-control" id="your_yt" name="your_yt" aria-describedby="basic-addon3" value="<?php echo $K->MY_YOUTUBE?>">
            </div>

            <div id="alert-infosite" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-infosite-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">

        </form>
    </div>

    <div id="subtitle-part-2" class="subtitle-part"><?php echo $this->lang('admin_general_subtitle2')?></div>
    <div id="form-part-2" class="form-part">
    	<form method="POST" id="form-themelanguage" name="form-themelanguage" role="form">
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_color_theme')?></span>
                <select class="form-control" id="color-theme" name="color-theme" aria-describedby="basic-addon3">
                	<option value="orange" <?php echo($K->THEME_COLOR=='orange'?'selected="selected"':'')?>><?php echo $this->lang('admin_general_color_orange')?></option>
                    <option value="blue" <?php echo($K->THEME_COLOR=='blue'?'selected="selected"':'')?>><?php echo $this->lang('admin_general_color_blue')?></option>
                    <option value="yellow" <?php echo($K->THEME_COLOR=='yellow'?'selected="selected"':'')?>><?php echo $this->lang('admin_general_color_yellow')?></option>
                    <option value="red" <?php echo($K->THEME_COLOR=='red'?'selected="selected"':'')?>><?php echo $this->lang('admin_general_color_red')?></option>
                    <option value="green" <?php echo($K->THEME_COLOR=='green'?'selected="selected"':'')?>><?php echo $this->lang('admin_general_color_verde')?></option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_language')?></span>
                <select class="form-control" id="language" name="language" aria-describedby="basic-addon3">
					<?php foreach($D->all_languages as $k=>$v) {?>
                    <option value="<?php echo($k)?>" <?php echo($k==$K->LANGUAGE?'selected="selected"':'')?>><?php echo($v)?></option>
                    <?php } ?>
                </select>
                
                
            </div>
            <div id="alert-themelanguage" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-themelanguage-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit2" name="bsubmit2" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">

        </form>
    </div>


    <div id="subtitle-part-3" class="subtitle-part"><?php echo $this->lang('admin_general_subtitle3')?></div>
    <div id="form-part-3" class="form-part">
    	<form method="POST" id="form-quantities" name="form-quantities" role="form">
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_q_products')?></span>
                <select class="form-control" id="qproducts" name="qproducts" aria-describedby="basic-addon3">
                	<?php for ($x=5; $x<=40; $x=$x+5) { ?>
                	<option value="<?php echo $x?>" <?php echo($K->PRODUCTS_PER_PAGE==$x?'selected="selected"':'')?>><?php echo $x?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_q_mostviewed')?></span>
                <select class="form-control" id="qmostviewed" name="qmostviewed" aria-describedby="basic-addon3">
                	<?php for ($x=12; $x<50; $x=$x+12) { ?>
                	<option value="<?php echo $x?>" <?php echo($K->MOSTVIEWED_PER_PAGE==$x?'selected="selected"':'')?>><?php echo $x?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_q_toplist')?></span>
                <select class="form-control" id="qtoplist" name="qtoplist" aria-describedby="basic-addon3">
                	<?php for ($x=12; $x<50; $x=$x+12) { ?>
                	<option value="<?php echo $x?>" <?php echo($K->TOPLIST_PER_PAGE==$x?'selected="selected"':'')?>><?php echo $x?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="alert-quantities" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-quantities-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit3" name="bsubmit3" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">

        </form>
    </div>
    
    <div id="subtitle-part-4" class="subtitle-part"><?php echo $this->lang('admin_general_subtitle4')?></div>
    <div id="form-part-4" class="form-part">
    	<form method="POST" id="form-fbid" name="form-fbid" role="form">
            <div class="input-group">
                <span class="input-group-addon ellipsis" id="basic-addon3"><?php echo $this->lang('admin_general_yourfbid')?></span>
                <input type="text" class="form-control" id="fbid" name="fbid" aria-describedby="basic-addon3" value="<?php echo $K->FACEBOOK_ID?>">
            </div>
            <div id="alert-fbid" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-fbid-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit4" name="bsubmit4" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">

        </form>
    </div>

    <div id="subtitle-part-5" class="subtitle-part"><?php echo $this->lang('admin_general_subtitle5')?></div>
    <div id="form-part-5" class="form-part">
    	<form method="POST" id="form-idcookie" name="form-idcookie" role="form">
        	<div><?php echo $this->lang('admin_general_idcokkie_msg')?><br><br></div>
            <div id="alert-idcookie" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-idcookie-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit5" name="bsubmit5" value="<?php echo $this->lang('admin_general_idcookie_breset')?>" type="submit">

        </form>
    </div>

</div>
<script>	
	var error_title = '<?php echo strJS($this->lang('admin_general_error_title'));?>';
	var error_description = '<?php echo strJS($this->lang('admin_general_error_description'));?>';
	var error_keywords = '<?php echo strJS($this->lang('admin_general_error_keywords'));?>';
	var error_company = '<?php echo strJS($this->lang('admin_general_error_company'));?>';

	$('#bsubmit1').click(function(){
		updateInfoSite('#alert-infosite','#alert-infosite-ok','#bsubmit1');
		return false;
	});
	
	var error_colortheme = '<?php echo strJS($this->lang('admin_general_error_color'));?>';
	var error_language = '<?php echo strJS($this->lang('admin_general_error_language'));?>';
	$('#bsubmit2').click(function(){
		updateThemeLanguage('#alert-themelanguage','#alert-themelanguage-ok','#bsubmit2');
		return false;
	});
	
	var error_qproducts = '<?php echo strJS($this->lang('admin_general_error_qproducts'));?>';
	var error_qmostviewed = '<?php echo strJS($this->lang('admin_general_error_qmostviewed'));?>';
	var error_qtoplist = '<?php echo strJS($this->lang('admin_general_error_qtoplist'));?>';
	$('#bsubmit3').click(function(){
		updateQuantities('#alert-quantities','#alert-quantities-ok','#bsubmit3');
		return false;
	}); 

	var error_fbid = '<?php echo strJS($this->lang('admin_general_error_fbid'));?>';
	$('#bsubmit4').click(function(){
		updateFacebookID('#alert-fbid','#alert-fbid-ok','#bsubmit4');
		return false;
	}); 


	$('#bsubmit5').click(function(){
		resetIDCookie('#alert-idcookie','#alert-idcookie-ok','#bsubmit5');
		return false;
	}); 	
</script>