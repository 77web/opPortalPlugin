<?php if ($isEnabled): ?>
<?php
$list = array();
foreach ($communityEvent as $event)
{
  $list[] = sprintf("[%s] %s<br>%s",
    op_format_date($event->getUpdatedAt(), 'XShortDate'),
    $event->getCommunity()->getName(),
    link_to(sprintf("%s(%d)",
        op_truncate($event->getName(), 28),
        $event->getCommunityEventComment()->count()
      ), '@communityEvent_show?id='.$event->getId()
    )
  );
}
$options = array(
  'title' => __('Recently Community Events'),
  'border' => true,
  'moreInfo' => array(
    link_to(__('More'), '@communityTopic_search_all?type=event')
  ),
);

if(count($communityEvent)==0)
{
  $options['partsInfo'] = __('No data');
  unset($options['moreInfo']);
}

op_include_list('communityList', $list, $options);
?>

<?php endif; ?>
