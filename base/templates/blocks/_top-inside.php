	<div class="container">
    	<div class="row">
        	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div id="logo"><a href="<?php echo $K->SITE_URL?>"><img src="<?php echo $K->BASE_URL?>images/<?php echo $D->colortheme?>/logo-inside.png"></a></div>
            </div>
        	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            	<div id="menu-top-inside" class="nav nav-pills hidden-xs the-opc">
                	<span class="toption <?php echo($D->opcSelected==1?'active':''); ?>"><a href="<?php echo $K->SITE_URL?>"><?php echo $this->lang('options_home')?></a></span>
					<span class="toption <?php echo($D->opcSelected==2?'active':''); ?>"><a href="<?php echo $K->SITE_URL?>products"><?php echo $this->lang('options_allproducts')?></a></span>
					<span class="toption <?php echo($D->opcSelected==3?'active':''); ?>"><a href="<?php echo $K->SITE_URL?>mostviewed"><?php echo $this->lang('options_mostviewed')?></a></span>
					<span class="toption nopadding <?php echo($D->opcSelected==4?'active':''); ?>"><a href="<?php echo $K->SITE_URL?>toplist"><?php echo $this->lang('options_toplist')?></a></span>
                </div>
                
                <div id="hamburguer-inside" class="visible-xs">

				    <button id="b-hamburguer">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                
            </div>
        </div>
    	
    </div>
    
	<div class="visible-xs">
        <div id="mobile-menu-top-inside">
            <a href="<?php echo $K->SITE_URL?>"><div class="moption <?php echo($D->opcSelected==1?'mactive':''); ?>"><?php echo $this->lang('options_home')?></div></a>
            <a href="<?php echo $K->SITE_URL?>products"><div class="moption <?php echo($D->opcSelected==2?'mactive':''); ?>"><?php echo $this->lang('options_allproducts')?></div></a>
            <a href="<?php echo $K->SITE_URL?>mostviewed"><div class="moption <?php echo($D->opcSelected==3?'mactive':''); ?>"><?php echo $this->lang('options_mostviewed')?></div></a>
            <a href="<?php echo $K->SITE_URL?>toplist"><div class="moption noline <?php echo($D->opcSelected==4?'mactive':''); ?>"><?php echo $this->lang('options_toplist')?></div></a>
        </div>
    </div>
    <script>
        function toggleMobileMenu() {
            var $mobileMenu = $('#mobile-menu-top-inside');	
            $mobileMenu.slideToggle('fast');
        }
    
        $(document).ready(function() {
            $('#b-hamburguer').on('click', toggleMobileMenu);
        });
    </script>