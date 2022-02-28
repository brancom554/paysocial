<div id="general-part">
	<div class="link-blue">&laquo; <a href="<?php echo $K->SITE_URL?>ss-admin/products"><?php echo $this->lang('admin_products_txt_back')?></a></div>

    <div id="space-form">
        <div id="subtitle-part-1" class="subtitle-part"><?php echo $this->lang('admin_products_subtitle_edit')?></div>
        
        <div id="form-part-1" class="form-part">
        
        	<h2></h2>
            
            <div class="subtitle-form">Basic Info</div>
        	
            <form method="POST" id="form-info01" name="form-info01" role="form">

                <div class="form-group">
                    <label for="pcategory"><?php echo $this->lang('admin_products_productcategory')?>:</label> 
                    <select class="form-control" id="pcategory" name="pcategory">
                    <option value="0"><?php echo $this->lang('admin_products_choosecategory')?></option>
                    <?php foreach($D->arrayCategories as $onecategorie) { ?>
                    <option value="<?php echo $onecategorie->idcategory?>" <?php echo($D->Product->idcategory == $onecategorie->idcategory ? 'selected=elected' : '');?>><?php echo stripslashes($onecategorie->category)?></option>
                    <?php } ?>
                    </select>
         		</div>

                <div class="form-group">
                    <label for="productname"><?php echo $this->lang('admin_products_productname')?>:</label>
                    <input type="text" class="form-control" id="productname" name="productname" aria-describedby="basic-addon3" value="<?php echo stripslashes($D->Product->title);?>">
                </div>
                
                <div class="form-group">
                    <label for="pdescription"><?php echo $this->lang('admin_products_description')?>:</label> 
                    <textarea type="text" class="form-control" id="pdescription" name="pdescription" aria-describedby="basic-addon3"><?php echo stripslashes($D->Product->description);?></textarea>
         		</div>

                <div id="alert-info01" class="alert alert-danger myhide" role="alert"></div>
                <div id="alert-info01-ok" class="alert alert-success myhide" role="alert"></div>

                <div style="margin-top:10px;"></div>                
                <div id="areabuttons1">
                <input class="btn btn-primary" id="bsubmit1" name="bsubmit1" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
                </div>
                
            </form>

		</div>
        
        
        <div id="form-part-2" class="form-part">
            
        	<h2></h2>
            
            <div class="subtitle-form">Image of Product</div>


            <form method="POST" id="form-info02" name="form-info02" role="form">

            	<label for="imgproduct"><?php echo $this->lang('admin_products_productimage')?>:</label> 
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                    <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><?php echo $this->lang('admin_products_finput_selectfile')?></span><span class="fileinput-exists"><?php echo $this->lang('admin_products_finput_change')?></span><input type="file" id="imgproduct" name="imgproduct"></span>
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang('admin_products_finput_remove')?></a>
                </div>

                <div id="alert-info02" class="alert alert-danger myhide" role="alert"></div>
                <div id="alert-info02-ok" class="alert alert-success myhide" role="alert"></div>

                <div style="margin-top:10px;"></div>                
              <div id="areabuttons2">
                <input class="btn btn-primary" id="bsubmit2" name="bsubmit2" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
                <input name="idproductf" type="hidden" id="idproductf" value="<?php echo $D->Product->idproduct;?>">
                <input name="codeproductf" type="hidden" id="codeproductf" value="<?php echo $D->Product->code;?>">
                <input name="theaction" type="hidden" id="theaction" value="3">
                </div>                
                
            </form>
		</div>
        

        <div id="form-part-3" class="form-part">

        	<h2></h2>
            
            <div class="subtitle-form">Method Payment</div>
            
            <form method="POST" id="form-info03" name="form-info03" role="form">

                <div class="form-group">
                    <label for="socialpay"><?php echo $this->lang('admin_products_socialpay')?>:</label> 
                    <select class="form-control" id="socialpay" name="socialpay"> 
                    <option value="0"><?php echo $this->lang('admin_products_choosesocialpay')?></option>
                    <?php foreach($D->arraySocialPay as $onesocialpay) { ?>
                    <option value="<?php echo $onesocialpay->idsocialpay?>" <?php echo($D->Product->idsocialpay == $onesocialpay->idsocialpay ? 'selected=elected' : '');?>><?php echo stripslashes($onesocialpay->name_socialpay)?></option> 
                    <?php } ?>
                    </select>
         		</div>
                
                <div id="alert-info03" class="alert alert-danger myhide" role="alert"></div>
                <div id="alert-info03-ok" class="alert alert-success myhide" role="alert"></div>

                <div style="margin-top:10px;"></div>                
                <div id="areabuttons3">
                <input class="btn btn-primary" id="bsubmit3" name="bsubmit3" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
                </div>

			</form>

		</div>
        
        <h2></h2>
        
        <div id="form-part-4" class="form-part">

        	<h2></h2>
            
            <div class="subtitle-form">Product type</div>
            
            <form method="POST" id="form-info04" name="form-info04" role="form">

                <div class="form-group">
                    <label for="ptype"><?php echo $this->lang('admin_products_ptype')?>:</label> 
                    <select class="form-control" id="ptype" name="ptype" onChange="changeType(this.value)"> 
                    	<option value="1" <?php echo($D->Product->type_product == 1 ? 'selected=elected' : '');?>><?php echo $this->lang('admin_products_ptype_link')?></option>
                    	<option value="2" <?php echo($D->Product->type_product == 2 ? 'selected=elected' : '');?>><?php echo $this->lang('admin_products_ptype_file')?></option>
                    </select>
         		</div>
                
                <div id="for_type_link">
                    <div class="form-group">
                        <label for="plink"><?php echo $this->lang('admin_products_ptype_thelink')?>:</label>
                        <input type="text" class="form-control" id="plink" name="plink" aria-describedby="basic-addon3" value="<?php echo stripslashes($D->Product->linkproduct); ?>">
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
                
                <div id="alert-info04" class="alert alert-danger myhide" role="alert"></div>
                <div id="alert-info04-ok" class="alert alert-success myhide" role="alert"></div>

                <div style="margin-top:10px;"></div>                
                <div id="areabuttons4">
                <input class="btn btn-primary" id="bsubmit4" name="bsubmit4" value="<?php echo $this->lang('admin_general_bsubmit')?>" type="submit">
                <input name="idproductf2" type="hidden" id="idproductf2" value="<?php echo $D->Product->idproduct;?>">
                <input name="codeproductf2" type="hidden" id="codeproductf2" value="<?php echo $D->Product->code;?>">
                <input name="theaction" type="hidden" id="theaction" value="5">
                </div>

			</form>

		</div>

        </div>
	</div>


</div>
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
	
	changeType(<?php echo $D->Product->type_product;?>);

	var idproduct = <?php echo $D->Product->idproduct; ?>

	var error_product_name = '<?php echo strJS($this->lang('admin_products_error_name'));?>';
	var error_product_category = '<?php echo strJS($this->lang('admin_products_error_category'));?>';
	var error_product_description = '<?php echo strJS($this->lang('admin_products_error_description'));?>';
	$('#bsubmit1').click(function(){
		updateProduct01('#alert-info01','#alert-info01-ok','#bsubmit1');		
		return false;
	});

	var error_product_image = '<?php echo strJS($this->lang('admin_products_error_image'));?>';
	$('#bsubmit2').click(function(){
		updateProduct02('#alert-info02','#alert-info02-ok','#bsubmit2');		
		return false;
	});

	var error_product_socialpay = '<?php echo strJS($this->lang('admin_products_error_socialpay'));?>';
	$('#bsubmit3').click(function(){
		updateProduct03('#alert-info03','#alert-info03-ok','#bsubmit3');		
		return false;
	});

	var error_product_thelink = '<?php echo strJS($this->lang('admin_products_error_thelink'));?>';
	var error_product_thefile = '<?php echo strJS($this->lang('admin_products_error_thefile'));?>';
	$('#bsubmit4').click(function(){
		updateProduct04('#alert-info04','#alert-info04-ok','#bsubmit4');		
		return false;
	});

</script>