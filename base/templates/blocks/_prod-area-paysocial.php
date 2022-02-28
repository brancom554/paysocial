<script>
	var type_product = <?php echo $D->type_product; ?>;
	var pcode = '<?php echo $D->codProduct; ?>';
	var pikey = '<?php echo $D->ikey; ?>';
</script>

<?php
if (isset($D->showSocialPay) && $D->showSocialPay) { 
	if ($D->fb_like_available == 1) {
?>
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1&version=v2.0"></script>
<div id="fb-root"></div>
<script type="text/javascript">FB.XFBML.parse();</script>

	<?php } ?>

	<?php if ($D->tw_tweet_available == 1 || $D->tw_follow_available == 1) { ?>
<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
	<?php } ?>

	<?php if ($D->fb_share_available == 1) { ?>    
<script> window.fbAsyncInit = function() { FB.init({ appId: "<?php echo $K->FACEBOOK_ID?>", status: true, cookie: true });  }; </script>    
	<?php } ?>

	<?php if ($D->gplus_available == 1) { ?>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	<?php } ?>

	<?php if ($D->in_share_available == 1) { ?>
<script type="text/javascript" src="https://platform.linkedin.com/in.js"></script>
	<?php } ?>


<?php } ?>



<?php if (isset($D->showSocialPay) && $D->showSocialPay) { ?>

<div>
    
    <div id="area-socialpay">
    
        <div id="space_blockpay_title">
            <span>
                <?php if ($D->type_product == 2) { ?>
                <img src="<?php echo $K->BASE_URL?>images/icodownload.png">
                <?php } else { ?>
                <img src="<?php echo $K->BASE_URL?>images/icolink.png">
                <?php } ?>
            </span>
            <span id="thetitle_block">
                <?php if ($D->type_product == 2) { ?>
                <?php echo $this->lang('product_download_now')?>
                <?php } else { ?>
                <?php echo $this->lang('product_link_now')?>
                <?php } ?>        
            </span>
        </div>
        <div id="space_blockpay_subtitle">
            <?php if ($D->type_product == 2) { ?>
            <?php echo $this->lang('product_txt_click_download')?>
            <?php } else { ?>
            <?php echo $this->lang('product_txt_click_view')?>
            <?php } ?>
        </div>


    
		<?php if ($D->fb_like_available) { ?>
        
        <div id="area-fblike" class="space_glass">

			<div class="fb-like" data-href="<?php echo $D->fb_like_url;?>" data-layout="button" data-action="like" data-show-faces="false"></div>
            
            <script type="text/javascript" src="<?php echo $K->BASE_URL?>js/action-fblike.js"></script>
    
        </div>
        
        <?php } ?>
        
		<?php if ($D->tw_tweet_available == 1) { ?>

		<div id="area-twtweet" class="space_glass">

        <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo date('H:i:s').'. '.$D->tw_tweet_tweet;?>" data-url="<?php echo $D->tw_tweet_url?>" data-count="none">Tweet</a>
        </div>

        <script type="text/javascript" src="<?php echo $K->BASE_URL?>js/action-twtweet.js"></script>

        <?php } ?>


		<?php if ($D->fb_share_available == 1) { ?>    
    
		<div id="area-fbshare" class="space_glass">
        	
            <span id="linkShareFB" class="myhand"><img src="<?php echo $K->BASE_URL?>images/bsharefb.jpg"></span>            
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $K->FACEBOOK_ID?>";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            </script>
            
            <script>
			var theURLShare = '<?php echo $D->fb_share_url?>';
			/*var theCaptionShare = '<?php echo $D->fb_share_caption?>';
			var theDescriptionShare = '<?php echo $D->fb_share_description?>';*/
            </script>

			<script type="text/javascript" src="<?php echo $K->BASE_URL?>js/action-fbshare.js"></script>

		</div>
    
        <?php } ?>



		<?php if ($D->gplus_available) { ?>
        
        <div id="area-gplus" class="space_glass">
        
            <g:plusone size="medium" annotation="none" callback="plusone_action" href="<?php echo $D->gplus_url?>"></g:plusone>

            <script type="text/javascript" src="<?php echo $K->BASE_URL?>js/action-gplus.js"></script>
    
        </div>
        
        <?php } ?>


		<?php if ($D->tw_follow_available == 1) { ?>

		<div id="area-twfollow" class="space_glass">
        
        <a href="<?php echo $D->tw_follow_url?>" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"></a>
        </div>

        <script type="text/javascript" src="<?php echo $K->BASE_URL?>js/action-twfollow.js"></script>

        <?php } ?>


		<?php if ($D->in_share_available) { ?>
        
        <div id="area-lkshare" class="space_glass">

            <script type="IN/Share" data-url="<?php echo $D->in_share_url?>" data-onsuccess="inshare_action" data-success="inshare_action" data-onSuccess="inshare_action"></script>
            <script>
            function inshare_action() {
				alert(1);	
			}
            </script>
            <script type="text/javascript" src="<?php echo $K->BASE_URL?>js/action-inshare.js"></script>
    
        </div>
 
       <?php } ?>

    
    </div>

	<div id="myalerts">
        <div id="alert-paysocial" class="alert alert-danger myhide" role="alert"></div>
        <div id="alert-paysocial-ok" class="alert alert-success myhide" role="alert"><?php echo $this->lang('product_actionsok_thanks'); ?></div>
	</div>
	
    <div id="space_link_prod" class="myhide">
            
        <div id="space_title">
            <span><img src="<?php echo $K->BASE_URL?>images/icolink.png"></span>
            <span><?php echo $this->lang('product_link_available')?></span>
        </div>

        <div id="space_thelink" class="link-blue">
            <div id="thelink"></div>
        </div>
        
    </div>


    <div id="preload" class="myhide"><img src="<?php echo $K->BASE_URL?>images/preloader.gif"></div>
    
</div>

<?php } else {?>

	<?php if ($D->type_product == 2) { ?>

		<div id="space_download_prod">
            	
            <div id="space_title">
                <span><img src="<?php echo $K->BASE_URL?>images/icodownload.png"></span>
                <span><?php echo $this->lang('product_download_available')?></span>
            </div>
    
            <div id="space_thedownload" class="link-blue">
                <a href="<?php echo $K->SITE_URL?>download/i:<?php echo $D->ikey?>"><?php echo $this->lang('product_download_txt_click')?></a>
            </div>
            
        </div>

	<?php } else{ ?>

		<div id="space_link_prod">
            	
            <div id="space_title">
                <span><img src="<?php echo $K->BASE_URL?>images/icolink.png"></span>
                <span><?php echo $this->lang('product_link_available')?></span>
            </div>
    
            <div id="space_thelink" class="link-blue">
                <a href="<?php echo $D->linkproduct?>" target="_blank"><?php echo $D->linkproduct?></a>
            </div>
            
        </div>
        
    <?php } ?>

<?php } ?>