<?php if ($isEnabled): ?>
<div id="homeRecentList_<?php echo $gadget->getId() ?>" class="dparts homeRecentList"><div class="parts">
<div class="partsHeading"><h3><?php echo __('Recently Community Events') ?></h3></div>
<div class="block">

<?php if(count($communityEvent)>0): ?>
<ul class="articleList">
<?php foreach ($communityEvent as $event): ?>
<li><span class="date"><?php echo op_format_date($event->getUpdatedAt(), 'XShortDateJa') ?></span>
<?php echo sprintf('%s (%s)',
  link_to(sprintf('%s(%d)',
    op_truncate($event->getName(), 36),
    $event->getCommunityEventComment()->count()
  ), '@communityEvent_show?id='.$event->getId()),
  $event->getCommunity()->getName()
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
