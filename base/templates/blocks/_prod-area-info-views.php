<div class="lat-right">

	<div class="stitle stitle2"><?php echo $this->lang('product_more_views')?></div>
    <div class="boxinfo">
    	<div class="numgrey"><?php echo $D->numviews?></div>
    	<div class="textmore"><?php echo ($D->numviews == 1 ? $this->lang('product_more_txt_view') : $this->lang('product_more_txt_views'))?></div>

        <div class="info_date">
            <div class="msg-title"><?php echo $this->lang('product_more_txt_lastv')?></div>
            <div class="msg-stitle"><?php echo $D->last_view == 0 ? $this->lang('product_more_txt_never') : date($this->lang('format_date_simple'), $D->last_view)?></div>
        </div>

    </div>

</div>