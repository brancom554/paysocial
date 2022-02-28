<ul class="pagination">
    <li <?php echo($D->npage == 1?'class="disabled"':''); ?>>
		<?php if ($D->npage != 1) { ?><a href="<?php echo $K->SITE_URL?>products/<?php echo $D->paramInPagination?>p:<?php echo($D->npage-1); ?>"><?php } ?>
        <span>&laquo;</span>
		<?php if ($D->npage != 1) { ?></a><?php } ?>
    </li>
    
    <?php for ($i=1; $i<=$D->totalpages; $i++) { ?>
    
    <li <?php echo($D->npage == $i?'class="active"':''); ?>>
    	<?php if ($D->npage != $i) { ?><a href="<?php echo $K->SITE_URL?>products/<?php echo $D->paramInPagination?>p:<?php echo $i; ?>"><?php } ?>
		<span class="the-set"><?php echo $i; ?></span>
        <?php if ($D->npage != $i) { ?></a><?php } ?>
    </li>
    
	<?php } ?>
    
    <li <?php echo($D->npage == $D->totalpages?'class="disabled"':''); ?>>
    	<?php if ($D->npage != $D->totalpages) { ?><a href="<?php echo $K->SITE_URL?>products/<?php echo $D->paramInPagination?>p:<?php echo($D->npage+1); ?>"><?php } ?>
        <span>&raquo;</span>
        <?php if ($D->npage != $D->totalpages) { ?></a><?php } ?>
    </li>
</ul>