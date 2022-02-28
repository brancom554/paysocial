        	<?php 
			$cont = 0;
			foreach($D->prods as $oneprod) {
			?>
            <div class="col-md-3 col-sm-6 col-xs-6">
            	<a href="<?php echo $K->SITE_URL?>product/p:<?php echo $oneprod->code?>">
            	<div class="one-prod">
                	<div><img src="<?php echo $K->STORAGE_THUMBNAIL_URL?>thumb1/<?php echo $oneprod->imageproduct?>" class="prod_img"></div>
                    <div class="title_prod"><?php echo stripslashes(trim($oneprod->title))?></div>
                    <div class="mini_title"><?php echo $this->lang('prods_square_txt_paywith')?></div>
                    <div class="icos_payes"><?php echo $this->pivot->getSocialPayinProduct($oneprod->idproduct)?></div>
                </div>
                </a>
            </div>
            	<?php
            	$cont++;
				if ($cont > 0 && $cont % 4 == 0) {
				?>
            <div class="clearfix visible-lg visible-md"></div>
				<?php
				}

				if ($cont > 0 && $cont % 2 == 0) {
				?>
            <div class="clearfix visible-xs"></div>
                <?php
				}
				?>

            <?php
			}
			?>
