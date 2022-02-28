<div id="prod-infobasic">

	<div class="oneblock">
        <div class="ibtitle"><?php echo $this->lang('product_infobasic_product')?></div>
        <div class="ibtext"><?php echo $D->titleproduct?></div>
	</div>
    
	<div class="oneblock">
        <div class="ibtitle"><?php echo $this->lang('product_infobasic_category')?></div>
        <div class="ibtext"><?php echo $this->pivot->getCategoryName($D->idcategory)?></div>
	</div>

	<div class="oneblock">    
        <div class="ibtitle"><?php echo $this->lang('product_infobasic_paywith')?></div>
        <div class="ibicons"><?php echo $this->pivot->getSocialPayinProduct($D->idproduct)?></div>
	</div>

</div>