	<div id="foot-1">
    	<div class="container">
        	<div class="row">
            	<div id="foot-block-01" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<img src="<?php echo $K->BASE_URL?>images/<?php echo $D->colortheme?>/logo-foot.png">
                    <p id="txt-below-logo-foot"><?php echo $this->lang('foot_about')?></p>
                </div>
            	<div id="foot-block-02" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<div class="title_block"><?php echo $this->lang('foot_title_block02')?></div>
                    <div class="block_options">
                    	<div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>"><?php echo $this->lang('options_home')?></a></span></div>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo  $K->SITE_URL?>products"><?php echo $this->lang('options_allproducts')?></a></span></div>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>mostviewed"><?php echo $this->lang('options_mostviewed')?></a></span></div>
                    	<div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>toplist"><?php echo $this->lang('options_toplist')?></a></span></div>
                        
						<?php if ($this->user->is_logged) { ?>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>ss-admin/general"><?php echo $this->lang('options_administrator')?></a></span></div>
                        <?php } ?>
                    </div>
                </div>
            	<div id="foot-block-03" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<div class="title_block"><?php echo $this->lang('foot_title_block03')?></div>
                    <div class="block_options">
                    	<div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>section/s:about"><?php echo $this->lang('options_aboutus')?></a></span></div>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>section/s:privacy"><?php echo $this->lang('options_privacy')?></a></span></div>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>section/s:termsofuse"><?php echo $this->lang('options_termsofuse')?></a></span></div>
                    	<div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>section/s:disclaimer"><?php echo $this->lang('options_disclaimer')?></a></span></div>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->SITE_URL?>section/s:contact"><?php echo $this->lang('options_contact')?></a></span></div>
                    </div>
                </div>
            	<div id="foot-block-04" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<?php if (!(empty($K->MY_FACEBOOK) && empty($K->MY_TWITTER) && empty($K->MY_YOUTUBE))) { ?>
                	<div class="title_block"><?php echo $this->lang('foot_title_block04')?></div>
                    <div class="block_options">
                    
                    	<?php if (!empty($K->MY_FACEBOOK)) { ?>
                    	<div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->MY_FACEBOOK?>" target="_blank"><?php echo $this->lang('options_social_facebook')?></a></span></div>
                        <?php } ?>

                    	<?php if (!empty($K->MY_TWITTER)) { ?>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->MY_TWITTER?>" target="_blank"><?php echo $this->lang('options_social_twitter')?></a></span></div>
                        <?php } ?>

                    	<?php if (!empty($K->MY_YOUTUBE)) { ?>
                        <div class="one-options"><span class="glyphicon glyphicon-menu-right the-bullet"></span> <span class="options"><a href="<?php echo $K->MY_YOUTUBE?>" target="_blank"><?php echo $this->lang('options_social_youtube')?></a></span></div>
                        <?php } ?>
                        
                    </div>
                    <?php } ?>        
                </div>
            </div>
		</div>
    </div>
    
	<div id="foot-2">
    	<div class="container">
        	<div class="row">
            	<div class="col-xs-12"><?php echo($K->COMPANY.' '.date('Y').' - '.$this->lang('foot_right'))?></div>
            </div>
		</div>
    </div>
