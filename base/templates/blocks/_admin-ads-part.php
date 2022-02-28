<div id="general-part">
	<div id="title-part"><?php echo $this->lang('admin_options_ads')?></div>
    
    <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_ads_subtitle1')?></div>
    <div id="form-part-1" class="form-part">
    	<form method="POST" id="form-ads1" name="form-ads1" role="form">
            <div class="form-group">
                <label for="ads-home1"><?php echo $this->lang('admin_ads_txt_insertcode_top')?>:</label>
                <textarea name="ads-home1" rows="2" class="form-control" id="ads-home1" ><?php echo $K->AD_BLOCK_1?></textarea>
            </div>            
            <div class="form-group">
                <label for="ads-home2"><?php echo $this->lang('admin_ads_txt_insertcode_bottom')?>:</label>
                <textarea name="ads-home2" rows="2" class="form-control" id="ads-home2" ><?php echo $K->AD_BLOCK_2?></textarea>
            </div>            
            <div id="alert-section1" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section1-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

    <div id="subtitle-part-2" class="subtitle-part"><?php echo $this->lang('admin_ads_subtitle2')?></div>
    <div id="form-part-2" class="form-part">
    	<form method="POST" id="form-ads2" name="form-ads2" role="form">
            <div class="form-group">
                <label for="ads-toplist1"><?php echo $this->lang('admin_ads_txt_insertcode_top')?>:</label>
                <textarea name="ads-toplist1" rows="2" class="form-control" id="ads-toplist1" ><?php echo $K->AD_BLOCK_3?></textarea>
            </div>            
            <div class="form-group">
                <label for="ads-toplist2"><?php echo $this->lang('admin_ads_txt_insertcode_bottom')?>:</label>
                <textarea name="ads-toplist2" rows="2" class="form-control" id="ads-toplist2" ><?php echo $K->AD_BLOCK_4?></textarea>
            </div>            
            <div id="alert-section2" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section2-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit2" name="bsubmit2" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

    <div id="subtitle-part-3" class="subtitle-part"><?php echo $this->lang('admin_ads_subtitle3')?></div>
    <div id="form-part-3" class="form-part">
    	<form method="POST" id="form-ads3" name="form-ads3" role="form">
            <div class="form-group">
                <label for="ads-mostviewed1"><?php echo $this->lang('admin_ads_txt_insertcode_top')?>:</label>
                <textarea name="ads-mostviewed1" rows="2" class="form-control" id="ads-mostviewed1" ><?php echo $K->AD_BLOCK_5?></textarea>
            </div>            
            <div class="form-group">
                <label for="ads-mostviewed2"><?php echo $this->lang('admin_ads_txt_insertcode_bottom')?>:</label>
                <textarea name="ads-mostviewed2" rows="2" class="form-control" id="ads-mostviewed2" ><?php echo $K->AD_BLOCK_6?></textarea>
            </div>            
            <div id="alert-section3" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section3-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit3" name="bsubmit3" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

    <div id="subtitle-part-4" class="subtitle-part"><?php echo $this->lang('admin_ads_subtitle4')?></div>
    <div id="form-part-4" class="form-part">
    	<form method="POST" id="form-ads4" name="form-ads4" role="form">
            <div class="form-group">
                <label for="ads-details-1"><?php echo $this->lang('admin_ads_txt_insertcode_1')?>:</label>
                <textarea name="ads-details-1" rows="2" class="form-control" id="ads-details-1"><?php echo $K->AD_BLOCK_7?></textarea>
            </div>            

            <div class="form-group">
                <label for="ads-details-2"><?php echo $this->lang('admin_ads_txt_insertcode_2')?>:</label>
                <textarea name="ads-details-2" rows="2" class="form-control" id="ads-details-2" ><?php echo $K->AD_BLOCK_8?></textarea>
            </div>            

            <div class="form-group">
                <label for="ads-details-3"><?php echo $this->lang('admin_ads_txt_insertcode_3')?>:</label>
                <textarea name="ads-details-3" rows="2" class="form-control" id="ads-details-3" ><?php echo $K->AD_BLOCK_9?></textarea>
            </div>            

            <div id="alert-section4" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section4-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit4" name="bsubmit4" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

</div>
<script>
	var error_notext = '<?php echo strJS($this->lang('admin_sections_error_notext'));?>';
	
	$('#bsubmit1').click(function(){
		updateAds('#alert-section1','#alert-section1-ok','#bsubmit1',1);
		return false;
	});
	
	$('#bsubmit2').click(function(){
		updateAds('#alert-section2','#alert-section2-ok','#bsubmit2',2);
		return false;
	});
	
	$('#bsubmit3').click(function(){
		updateAds('#alert-section3','#alert-section3-ok','#bsubmit3',3);
		return false;
	});
	
	$('#bsubmit4').click(function(){
		updateAds('#alert-section4','#alert-section4-ok','#bsubmit4',4);
		return false;
	});
	
</script>