<div id="general-part">
	<div id="title-part"><?php echo $this->lang('admin_sections_title')?></div>
    
    <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_sections_subtitle1')?></div>
    <div id="form-part-1" class="form-part">
    	<form method="POST" id="form-section1" name="form-section1" role="form">
            <div class="form-group">
                <label for="email"><?php echo $this->lang('admin_sections_txt_inserthtml')?>:</label>
                <textarea name="section1" rows="5" class="form-control" id="section1" ><?php echo $D->about?></textarea>
            </div>            
            <div id="alert-section1" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section1-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

    <div id="subtitle-part-2" class="subtitle-part"><?php echo $this->lang('admin_sections_subtitle2')?></div>
    <div id="form-part-2" class="form-part">
    	<form method="POST" id="form-section2" name="form-section2" role="form">
            <div class="form-group">
                <label for="email"><?php echo $this->lang('admin_sections_txt_inserthtml')?>:</label>
                <textarea name="section2" rows="5" class="form-control" id="section2" ><?php echo $D->privacy?></textarea>
            </div>            
            <div id="alert-section2" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section2-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit2" name="bsubmit2" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

    <div id="subtitle-part-3" class="subtitle-part"><?php echo $this->lang('admin_sections_subtitle3')?></div>
    <div id="form-part-3" class="form-part">
    	<form method="POST" id="form-section3" name="form-section3" role="form">
            <div class="form-group">
                <label for="email"><?php echo $this->lang('admin_sections_txt_inserthtml')?>:</label>
                <textarea name="section3" rows="5" class="form-control" id="section3"><?php echo $D->termsofuse?></textarea>
            </div>            
            <div id="alert-section3" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section3-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit3" name="bsubmit3" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

    <div id="subtitle-part-4" class="subtitle-part"><?php echo $this->lang('admin_sections_subtitle4')?></div>
    <div id="form-part-4" class="form-part">
    	<form method="POST" id="form-section4" name="form-section4" role="form">
            <div class="form-group">
                <label for="email"><?php echo $this->lang('admin_sections_txt_inserthtml')?>:</label>
                <textarea name="section4" rows="5" class="form-control" id="section4" ><?php echo $D->disclaimer?></textarea>
            </div>            
            <div id="alert-section4" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section4-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit4" name="bsubmit4" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

    <div id="subtitle-part-5" class="subtitle-part"><?php echo $this->lang('admin_sections_subtitle5')?></div>
    <div id="form-part-5" class="form-part">
    	<form method="POST" id="form-section5" name="form-section5" role="form">
            <div class="form-group">
                <label for="email"><?php echo $this->lang('admin_sections_txt_inserthtml')?>:</label>
                <textarea name="section5" rows="5" class="form-control" id="section5" ><?php echo $D->contact?></textarea>
            </div>            
            <div id="alert-section5" class="alert alert-danger myhide" role="alert"></div>
            <div id="alert-section5-ok" class="alert alert-success myhide" role="alert"></div>
            <input class="btn btn-primary" id="bsubmit5" name="bsubmit5" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
        </form>
    </div>

</div>
<script>
	var error_notext = '<?php echo strJS($this->lang('admin_sections_error_notext'));?>';
	
	$('#bsubmit1').click(function(){
		updateSection('#alert-section1','#alert-section1-ok','#bsubmit1',1);
		return false;
	});
	
	$('#bsubmit2').click(function(){
		updateSection('#alert-section2','#alert-section2-ok','#bsubmit2',2);
		return false;
	});
	
	$('#bsubmit3').click(function(){
		updateSection('#alert-section3','#alert-section3-ok','#bsubmit3',3);
		return false;
	});
	
	$('#bsubmit4').click(function(){
		updateSection('#alert-section4','#alert-section4-ok','#bsubmit4',4);
		return false;
	});
	
	$('#bsubmit5').click(function(){
		updateSection('#alert-section5','#alert-section5-ok','#bsubmit5',5);
		return false;
	});
</script>