<div class="lat-right">

	<div class="stitle"><?php echo $this->lang('product_more_downloads')?><br><span class="stitlesub"><?php echo $this->lang('product_more_orshowlink')?></span></div>
    <div class="boxinfo">
    	<div class="numgreen"><?php echo $D->numactionsok?></div>
    	<div class="textmore"><?php echo ($D->numactionsok == 1 ? $this->lang('product_more_txt_download') : $this->lang('product_more_txt_downloads'))?></div>
        
        <div class="info_date">
            <div class="msg-title"><?php echo $this->lang('product_more_txt_lastd')?></div>
            <div class="msg-stitle"><?php echo $D->last_download == 0 ? $this->lang('product_more_txt_never') : date($this->lang('format_date_simple'), $D->last_download)?></div>
        </div>
    	
    </div>
    
</div>