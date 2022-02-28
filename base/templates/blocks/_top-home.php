
	<div class="container">
    	<div class="row">
        	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            	<div id="logo-top"><a href="<?php echo $K->SITE_URL?>"><img src="<?php echo $K->BASE_URL?>images/<?php echo $D->colortheme?>/logo.png"></a></div>
            </div>
        	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            	<div id="menu-top" class="nav nav-pills hidden-xs the-opc">
                	<span class="toption active"><a href="<?php echo $K->SITE_URL?>"><?php echo $this->lang('options_home')?></a></span>
					<span class="toption"><a href="<?php echo $K->SITE_URL?>products"><?php echo $this->lang('options_allproducts')?></a></span>
					<span class="toption"><a href="<?php echo $K->SITE_URL?>mostviewed"><?php echo $this->lang('options_mostviewed')?></a></span>
					<span class="toption nopadding"><a href="<?php echo $K->SITE_URL?>toplist"><?php echo $this->lang('options_toplist')?></a></span>
                </div>
                
                <div id="hamburguer" class="visible-xs">

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
        <div id="mobile-menu-top">
            <a href="<?php echo $K->SITE_URL?>"><div class="moption mactive"><?php echo $this->lang('options_home')?></div></a>
            <a href="<?php echo $K->SITE_URL?>products"><div class="moption"><?php echo $this->lang('options_allproducts')?></div></a>
            <a href="<?php echo $K->SITE_URL?>mostviewed"><div class="moption"><?php echo $this->lang('options_mostviewed')?></div></a>
            <a href="<?php echo $K->SITE_URL?>toplist"><div class="moption noline"><?php echo $this->lang('options_toplist')?></div></a>
        </div>
    </div>

    
    <div id="msgs-top">
    	<div class="container">
        	<div class="row">
            	<div id="msgs-top-line01" class="col-xs-12"><?php echo $this->lang('home_banner_line_01')?></div>
            </div>
        	<div id="msgs-top-line02" class="row">
            	<div id="msgs-top-line02-1" class="col-xs-5">
                	<p><?php echo $this->lang('home_banner_line_02_col01_01')?></p>
                	<p><?php echo $this->lang('home_banner_line_02_col01_02')?></p>
                	<p><?php echo $this->lang('home_banner_line_02_col01_03')?></p>
                </div>
            	<div id="msgs-top-line02-2" class="col-xs-7">
                	<p id="msgs-top-line02-2-1"><?php echo $this->lang('home_banner_line_02_col02_01')?></p>
                    <p id="msgs-top-line02-2-2"><?php echo $this->lang('home_banner_line_02_col02_02')?></p>
                    <p id="msgs-top-line02-2-3"><?php echo $this->lang('home_banner_line_02_col02_03')?></p>
                </div>
            </div>
        	<div id="msgs-top-separator-1" class="row">
            	<div class="col-xs-12">
                	<a href="products" class="btn btn-custom btn-home"><?php echo $this->lang('home_banner_button')?></a>
                </div>
            </div>
        </div>
    </div>


	<script>
        function toggleMobileMenu() {
            var $mobileMenu = $('#mobile-menu-top');	
            $mobileMenu.slideToggle('fast');
        }
    
        $(document).ready(function() {
            $('#b-hamburguer').on('click', toggleMobileMenu);
        });
    </script>

