<tr data-href="<?php echo $D->urlProduct; ?>">
	<td>
        <div style="float:left"><img src="<?php echo $K->STORAGE_THUMBNAIL_URL?>thumb3/<?php echo $D->imageproduct?>" class="iconprod"></div>
		<div style="font-weight:600; padding-left:110px; padding-top:55px;">
            <?php echo $D->title; ?>
        </div>
    </td>
    <td class="center"><?php echo $this->pivot->getSocialPayinProduct($D->idproduct)?></td>
    <td class="center grey"><?php echo $D->numviews; ?></td>
    <td class="center green"><?php echo $D->numactionsok; ?></td>
</tr>