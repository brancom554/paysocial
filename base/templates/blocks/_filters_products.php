<div id="filters_products">
    <div id="title_filter_search"><?php echo $this->lang('filters_txt_search')?></div>
    <div id="area-search">
        <div class="input-group">
                <input type="text" class="form-control" name="text_search" id="text_search" placeholder="<?php echo $this->lang('filters_txt_placeholder_search')?>" value="<?php echo str_replace('+', ' ', $D->param_search)?>">
                <span class="input-group-btn">
                <button class="btn btn-default" name="submit_search" id="submit_search" type="button"><i class="glyphicon glyphicon-search"></i></button>
          </span>
        </div>
    </div>


    <div id="title_filter_categories"><?php echo $this->lang('filters_txt_categories')?></div>
    <div id="area-categories">
    	<div class="row">
            <div id="theselect">
            <select name="category_filter" id="category_filter" class="myselect">
            	<option value="all"><?php echo $this->lang('filters_txt_all_categories')?></option>
                <?php foreach($D->arrayCategories as $onecategory) {?>
              <option value="<?php echo $onecategory->idcategory?>" <?php echo($onecategory->idcategory == $D->param_category ? 'selected' : '') ?>><?php echo stripslashes($onecategory->category)?></option>
                <?php } ?>
            </select>
            </div>
            <div id="thebutton">
            <input class="btn btn-default the-button" id="submit_for_categories" name="submit_for_categories" value="Filter by Category" type="button">
            </div>
        </div>
    </div>

</div>
<script>
	$('#submit_for_categories').click(function(){
		idcategory = $('#category_filter').val();
		param = '/c:' + idcategory;
		if (idcategory=='all') param = '';
		self.location = siteurl + 'products' + param;
	});
	
	$('#text_search').keypress(function(x) {
		
		if (x.keyCode == 13) {
			query = $(this).val();
			
			if (query.length < 3) return;
			
			if (query != this.defaultValue){
				self.location = siteurl + 'products/q:' + escape(query.replace(/\s/g,"+"));
			}
		}
		
	});
	
	$('#submit_search').click(function() {
		
			query = $('#text_search').val();
			
			if (query.length < 3) return;
			
			if (query != this.defaultValue){
				self.location = siteurl + 'products/q:' + escape(query.replace(/\s/g,"+"));
			}
			
	});
</script>