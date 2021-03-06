<?php if ($isEnabled): ?>
<div id="homeRecentList_<?php echo $gadget->getId() ?>" class="dparts homeRecentList"><div class="parts">
<div class="partsHeading"><h3><?php echo __('Recently Community Topics') ?></h3></div>
<div class="block">

<?php if(count($communityTopic)>0): ?>
<ul class="articleList">
<?php foreach ($communityTopic as $topic): ?>
<li><span class="date"><?php echo op_format_date($topic->getUpdatedAt(), 'XShortDateJa') ?></span>
<?php echo sprintf('%s (%s)',
  link_to(sprintf('%s(%d)',
    op_truncate($topic->getName(), 36),
    $topic->getCommunityTopicComment()->count()
  ), '@communityTopic_show?id='.$topic->getId()),
  $topic->getCommunity()->getName()
) ?></li>
<?php endforeach; ?>
</ul>
<div class="moreInfo">
<ul class="moreInfo">
<li><?php echo link_to(__('More'), '@communityTopic_search_all?type=topic') ?></li>
</ul>
</div>

<?php else: ?>
  <p><?php echo __('No data'); ?></p>
<?php endif; ?>


</div>
</div></div>
<?php endif; ?>
