<?php if($isEnabled): ?>

<?php use_helper('opAlbum') ?>

<div id="homeRecentList_<?php echo $gadget->getId() ?>" class="dparts homeRecentList"><div class="parts">
<div class="partsHeading"><h3><?php echo __('Recently Posted Albums of All') ?></h3></div>
<div class="block">

<?php if(count($albumList)>0): ?>
<ul class="articleList">
<?php foreach ($albumList as $album): ?>
<li><span class="date"><?php echo op_format_date($album->getCreatedAt(), 'XShortDateJa') ?></span><?php echo link_to($album->title, 'album_show', $album) ?> (<?php echo $album->getMember()->getName() ?>)</li>
<?php endforeach; ?>
</ul>

<div class="moreInfo">
<ul class="moreInfo">
<li><?php echo link_to(__('More'), 'album_list') ?></li>
</ul>
</div>

<?php else: ?>

  <p><?php echo __('No data'); ?></p>

<?php endif; ?>

</div>
</div></div>
<?php endif; ?>

