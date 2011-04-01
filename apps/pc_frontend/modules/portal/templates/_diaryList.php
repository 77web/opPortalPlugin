<?php if ($isEnabled): ?>
<?php use_helper('opDiary') ?>

<div id="homeRecentList_<?php echo $gadget->id ?>" class="dparts portalRecentList"><div class="parts">
<div class="partsHeading"><h3><?php echo __('Recently Posted Diaries of All') ?></h3></div>
<div class="block">

<?php if(count($diaryList)>0): ?>
<ul class="articleList">
<?php foreach ($diaryList as $diary): ?>
<li><span class="date"><?php echo op_format_date($diary->created_at, 'XShortDateJa') ?></span><?php echo op_diary_link_to_show($diary) ?></li>
<?php endforeach; ?>
</ul>

<div class="moreInfo">
<ul class="moreInfo">
<li><?php echo link_to(__('More'), 'diary/list') ?></li>
</ul>
</div>

<?php else: ?>
<p><?php echo __('No data'); ?></p>
<?php endif; ?>

</div>
</div></div>
<?php endif; ?>