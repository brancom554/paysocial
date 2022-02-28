<div id="general-part">
	<div id="title-part"><?php echo $this->lang('admin_products_title')?></div>
    <div id="space-badd"><button id="badd" type="button" class="btn btn-success"><?php echo $this->lang('admin_products_badd')?></button></div>
    <div id="space-form" class="myhide">
        <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_products_subtitle_add')?></div>
        <div id="form-part-1" class="form-part">
            <form method="POST" id="form-addproduct" name="form-addproduct" role="form" enctype="multipart/form-data" target="my_iframe" action="<?php echo $K->SITE_URL?>createproduct">

                <div class="form-group">
                    <label for="pcategory"><?php echo $this->lang('admin_products_productcategory')?>:</label> 
                    <select class="form-control" id="pcategory" name="pcategory"> 
                    <option value="0"><?php echo $this->lang('admin_products_choosecategory')?></option>
                    <?php foreach($D->arrayCategories as $onecategorie) { ?>
                    <option value="<?php echo $onecategorie->idcategory?>"><?php echo stripslashes($onecategorie->category)?></option>
                    <?php } ?>
                    </select>
         		</div>

                <div class="form-group">
                    <label for="productname"><?php echo $this->lang('admin_products_productname')?>:</label>
                    <input type="text" class="form-control" id="productname" name="productname" aria-describedby="basic-addon3">
                </div>
                
                <div class="form-group">
                    <label for="pdescription"><?php echo $this->lang('admin_products_description')?>:</label> 
                    <textarea type="text" class="form-control" id="pdescription" name="pdescription" aria-describedby="basic-addon3"></textarea>
         		</div>

            	<label for="imgproduct"><?php echo $this->lang('admin_products_productimage')?>:</label> 
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                    <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><?php echo $this->lang('admin_products_finput_selectfile')?></span><span class="fileinput-exists"><?php echo $this->lang('admin_products_finput_change')?></span><input type="file" id="imgproduct" name="imgproduct"></span>
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang('admin_products_finput_remove')?></a>
                </div>

                <h2></h2>    
                <div class="form-group">
                    <label for="socialpay"><?php echo $this->lang('admin_products_socialpay')?>:</label> 
                    <select class="form-control" id="socialpay" name="socialpay"> 
                    <option value="0"><?php echo $this->lang('admin_products_choosesocialpay')?></option>
                    <?php foreach($D->arraySocialPay as $onesocialpay) { ?>
                    <option value="<?php echo $onesocialpay->idsocialpay?>"><?php echo stripslashes($onesocialpay->name_socialpay)?></option> 
                    <?php } ?>
                    </select>
         		</div>        

                <h2></h2>
                <div class="form-group">
                    <label for="ptype"><?php echo $this->lang('admin_products_ptype')?>:</label> 
                    <select class="form-control" id="ptype" name="ptype" onChange="changeType(this.value)"> 
                    	<option value="1"><?php echo $this->lang('admin_products_ptype_link')?></option>
                    	<option value="2"><?php echo $this->lang('admin_products_ptype_file')?></option>
                    </select>
         		</div>
                
                <div id="for_type_link">
                    <div class="form-group">
                        <label for="plink"><?php echo $this->lang('admin_products_ptype_thelink')?>:</label>
                        <input type="text" class="form-control" id="plink" name="plink" aria-describedby="basic-addon3">
                    </div>        
				</div>
                
                <div id="for_type_file" class="myhide">
                    <label for="fileproduct"><?php echo $this->lang('admin_products_ptype_thefile')?>:</label> 
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><?php echo $this->lang('admin_products_finput_selectfile')?></span><span class="fileinput-exists"><?php echo $this->lang('admin_products_finput_change')?></span><input type="file" id="fileproduct" name="fileproduct"></span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang('admin_products_finput_remove')?></a>
                    </div>
                </div>

                <h2></h2>

                <div id="alert-product" class="alert alert-danger myhide" role="alert"></div>
                <div id="alert-product-ok" class="alert alert-success myhide" role="alert"></div>

                <div style="margin-top:20px;"></div>
                
                <div id="areabuttons">
                <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_products_bsubmit')?>" type="submit">
                <span class="btn btn-default" role="button" id="bcancel"><?php echo $this->lang('admin_products_bcancel')?></span>
                </div>
                
                <span id="iloader" class="myhide"><img src="<?php echo $K->BASE_URL?>images/preloader.gif"></span>
                
                <iframe id="iframe_createp" name="iframe_createp" src="" style="display: none"></iframe>
            </form>
        </div>
	</div>
    
	<div id="area-list-products" class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th class="center"><?php echo $this->lang('admin_products_table_image'); ?></th>
                <th class="center"><?php echo $this->lang('admin_products_table_name'); ?></th>
                <th class="center"><?php echo $this->lang('admin_products_table_category'); ?></th>
                <th class="center"><?php echo $this->lang('admin_products_table_numviews'); ?></th>
				<th class="center"><?php echo $this->lang('admin_products_table_numdownloads'); ?><br><span class="txtsimple"><?php echo $this->lang('admin_products_table_orshowlink'); ?></span></th>
                <th class="center"><?php echo $this->lang('admin_products_table_edit'); ?></th>
                <th class="center"><?php echo $this->lang('admin_products_table_delete'); ?></th>
            </tr>
		</thead>
        <tbody>
        <?php foreach($D->arrayProducts as $oneproduct) { ?>
            <tr id="onerow_<?php echo $oneproduct->idproduct?>">
                <td class="center"><img src="<?php echo $K->STORAGE_THUMBNAIL_URL?>thumb4/<?php echo $oneproduct->imageproduct?>"></td>
                <td style="font-weight:600;"><?php echo stripslashes($oneproduct->title); ?></td>
                <td class="center"><?php echo stripslashes($oneproduct->category); ?></td>
                <td class="center"><?php echo $oneproduct->numviews; ?></td>
                <td class="center"><?php echo $oneproduct->numactionsok; ?></td>
                <td class="center"><span id="link-edit-<?php echo $oneproduct->idproduct?>" class="link-blue"><a href="<?php echo $K->SITE_URL?>ss-admin/products/edit/p:<?php echo $oneproduct->code?>"><?php echo $this->lang('admin_products_table_edit')?></a></span></td>
                <td class="center"><span id="link-delete-<?php echo $oneproduct->idproduct?>" class="link-blue"><a href="#"><?php echo $this->lang('admin_products_table_delete')?></a></span></td>
            </tr>
            
			<script>
				var msg_delete = '<?php echo strJS($this->lang('admin_products_msg_delete'));?>';
				$('#link-delete-<?php echo $oneproduct->idproduct?>').click(function(){
					if (confirm(msg_delete)) {
						deleteProduct(<?php echo $oneproduct->idproduct?>);
					}
					return false;					
				});
            </script>
            
        <?php } ?>
        </tbody>
        </table>
    </div>


</div>
<?php if (!($D->totalpages > 1)) {?>
<div style="margin-bottom:50px;"></div>
<?php } ?>
<script>
	function changeType(thetype) {
		if (thetype == 1) {
			$("#for_type_link").show();
			$("#for_type_file").hide();
		}
		if (thetype == 2) {
			$("#for_type_file").show();
			$("#for_type_link").hide();			
		}
		return false;
	}

	var error_product_name = '<?php echo strJS($this->lang('admin_products_error_name'));?>';
	var error_product_category = '<?php echo strJS($this->lang('admin_products_error_category'));?>';
	var error_product_description = '<?php echo strJS($this->lang('admin_products_error_description'));?>';
	var error_product_image = '<?php echo strJS($this->lang('admin_products_error_image'));?>';
	var error_product_socialpay = '<?php echo strJS($this->lang('admin_products_error_socialpay'));?>';
	var error_product_thelink = '<?php echo strJS($this->lang('admin_products_error_thelink'));?>';
	var error_product_thefile = '<?php echo strJS($this->lang('admin_products_error_thefile'));?>';
	$('#bsubmit1').click(function(){
		
		theresult = validateProduct('#alert-product','#alert-product-ok','#bsubmit1');
		
		if (theresult == true) {
			document.getElementById("form-addproduct").target = "iframe_createp";
			document.getElementById("form-addproduct").submit();
			document.getElementById("areabuttons").style.display = "none";
			document.getElementById("iloader").style.display = "block";						
		} 
		
		return false;		
	});
	
	function endCreateP(resp){
		switch (resp.charAt(0)) {
			case '0':
				openandclose('#alert-product',resp.substring(3),1700);
				setTimeout(function() { $('#bsubmit1').removeAttr('disabled'); }, 2500);
				document.getElementById("iloader").style.display = "none";
				document.getElementById("areabuttons").style.display = "block";
				break;
			case '1':
				location.href = siteurl + 'ss-admin/products';
				break;
		}
		return true;
	}

	$('#bcancel').click(function(){
		$('#space-form').slideUp('slow', function(){$('#space-badd').slideDown('slow');});
		return false;
	});

	$('#badd').click(function(){
		$('#space-badd').slideUp('slow', function(){$('#space-form').slideDown('slow');});
		return false;
	});

</script>