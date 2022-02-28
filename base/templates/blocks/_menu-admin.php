<div id="menu-admin">
	<div id="title-menu-admin" class="ellipsis"><?php echo $this->lang('admin_title_menu')?></div>
	<div id="options-menu"> 
      	
        <a href="<?php echo $K->SITE_URL?>ss-admin/general">
        <div class="toption <?php echo($D->opcSelected==1?'active':''); ?> ellipsis">
        	<?php echo $this->lang('admin_options_general'); ?>
        </div>
        </a>

        <a href="<?php echo $K->SITE_URL?>ss-admin/socialpay">
        <div class="toption <?php echo($D->opcSelected==2?'active':''); ?> ellipsis">
        	<?php echo $this->lang('admin_options_socialpay'); ?>
        </div>
        </a>
        
        <a href="<?php echo $K->SITE_URL?>ss-admin/categories">
        <div class="toption <?php echo($D->opcSelected==3?'active':''); ?> ellipsis">
        	<?php echo $this->lang('admin_options_categories'); ?>
        </div>
        </a>

        <a href="<?php echo $K->SITE_URL?>ss-admin/products">
        <div class="toption <?php echo($D->opcSelected==4?'active':''); ?> ellipsis">
        	<?php echo $this->lang('admin_options_products'); ?>
        </div>
        </a>
        
        <a href="<?php echo $K->SITE_URL?>ss-admin/sections">
        <div class="toption <?php echo($D->opcSelected==5?'active':''); ?> ellipsis">
        	<?php echo $this->lang('admin_options_sections'); ?>
        </div>
        </a>

        <a href="<?php echo $K->SITE_URL?>ss-admin/ads">
        <div class="toption <?php echo($D->opcSelected==7?'active':''); ?> ellipsis">
        	<?php echo $this->lang('admin_options_ads'); ?>
        </div>
        </a>
        
        <a href="<?php echo $K->SITE_URL?>ss-admin/info">
        <div class="toption <?php echo($D->opcSelected==6?'active':''); ?> ellipsis">
        	<?php echo $this->lang('admin_options_info'); ?>
        </div>
        </a>
        
        <a href="<?php echo $K->SITE_URL?>ss-admin/logout">
        <div class="toption ellipsis">
        	<?php echo $this->lang('admin_options_logout'); ?>
        </div>
        </a>
    </div>
</div>