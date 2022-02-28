<script>
var error_namecategory = '<?php echo strJS($this->lang('admin_categories_error_category'));?>';
var msg_delete = '<?php echo strJS($this->lang('admin_categories_msg_delete'));?>';
</script>
<div id="general-part">
	<div id="title-part"><?php echo $this->lang('admin_categories_title')?></div>
    <div id="space-badd"><button id="badd" type="button" class="btn btn-success"><?php echo $this->lang('admin_categories_badd')?></button></div>
    <div id="space-form" class="myhide">
        <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_categories_subtitle_add')?></div>
        <div id="form-part-1" class="form-part">
            <form method="POST" id="form-infoadmin" name="form-infoadmin" role="form">
                <div class="form-group">
                    <label for="categoryname"><?php echo $this->lang('admin_categories_category')?>:</label>
                    <input type="text" class="form-control" id="categoryname" name="categoryname" placeholder="<?php echo $this->lang('admin_categories_phcategory')?>" aria-describedby="basic-addon3">
                </div>
    
                <div id="alert-category" class="alert alert-danger myhide" role="alert"></div>
                <div id="alert-category-ok" class="alert alert-success myhide" role="alert"></div>
                <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_categories_bsubmit')?>" type="submit">
                <span class="btn btn-default" role="button" id="bcancel"><?php echo $this->lang('admin_categories_bcancel')?></span>
            </form>
        </div>
	</div>
    
	<div id="area-list-categories" class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th class="center"><?php echo $this->lang('admin_categories_table_name'); ?></th>
                <th class="center"><?php echo $this->lang('admin_categories_table_numproducts'); ?></th>
                <th class="center"><?php echo $this->lang('admin_categories_table_edit'); ?></th>
                <th class="center"><?php echo $this->lang('admin_categories_table_delete'); ?></th>
            </tr>
		</thead>
        <tbody>
        <?php foreach($D->arrayCategories as $onecategory) { ?>
            <tr id="onerow_<?php echo $onecategory->idcategory?>">
                <td>
					<div id="name_<?php echo $onecategory->idcategory?>"><?php echo stripslashes($onecategory->category); ?></div>
                    <div id="area_form_<?php echo $onecategory->idcategory?>" class="myhide">
                        <form method="POST" id="form-<?php echo $onecategory->idcategory?>" name="form-<?php echo $onecategory->idcategory?>" role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nc-<?php echo $onecategory->idcategory?>" name="nc-<?php echo $onecategory->idcategory?>" value="<?php echo stripslashes($onecategory->category); ?>">
                            </div>
                
                            <div id="alert-<?php echo $onecategory->idcategory?>" class="alert alert-danger myhide" role="alert"></div>
                            <input class="btn btn-primary" id="bsubmit-<?php echo $onecategory->idcategory?>" name="bsubmit-<?php echo $onecategory->idcategory?>" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit"> 
                            <span class="btn btn-default" role="button" id="bcancel-<?php echo $onecategory->idcategory?>"><?php echo $this->lang('admin_categories_bcancel')?></span>
                        </form>
                    </div>
                </td>
                <td class="center"><span><?php echo getNumProductsByCategory($onecategory->idcategory); ?></span></td>
                <td class="center"><span id="link-edit-<?php echo $onecategory->idcategory?>" class="link-blue"><a href="#"><?php echo $this->lang('admin_categories_table_edit')?></a></span></td>
                <td class="center"><span id="link-delete-<?php echo $onecategory->idcategory?>" class="link-blue"><a href="#"><?php echo $this->lang('admin_categories_table_delete')?></a></span></td>
            </tr>
			<script>
                $('#link-edit-<?php echo $onecategory->idcategory?>').click(function(){
                    $('#name_<?php echo $onecategory->idcategory?>').slideUp('slow', function(){$('#area_form_<?php echo $onecategory->idcategory?>').slideDown('slow', function(){ $('#link-edit-<?php echo $onecategory->idcategory?>').attr('disabled','true'); });});
					return false;					
                });

                $('#link-delete-<?php echo $onecategory->idcategory?>').click(function(){
                    if (confirm(msg_delete)) {
						deleteCategory(<?php echo $onecategory->idcategory?>);
					}
					return false;					
                });
				
				$('#bcancel-<?php echo $onecategory->idcategory?>').click(function(){
                    $('#area_form_<?php echo $onecategory->idcategory?>').slideUp('slow', function(){$('#name_<?php echo $onecategory->idcategory?>').slideDown('slow', function(){  
						$('#link-edit-<?php echo $onecategory->idcategory?>').removeAttr('disabled'); });
						$('#nc-<?php echo $onecategory->idcategory?>').val($('#name_<?php echo $onecategory->idcategory?>').html());
					});
					
                });
				
				$('#bsubmit-<?php echo $onecategory->idcategory?>').click(function(){
					updateCategory(<?php echo $onecategory->idcategory?>, '#nc-<?php echo $onecategory->idcategory?>', '#alert-<?php echo $onecategory->idcategory?>', '#bsubmit-<?php echo $onecategory->idcategory?>');
					return false;
				});
            </script>
        <?php } ?>
        </tbody>
        </table>
    </div>


</div>
<script>
	$('#bsubmit1').click(function(){
		createCategory('#alert-category','#alert-category-ok','#bsubmit1');
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
</script>