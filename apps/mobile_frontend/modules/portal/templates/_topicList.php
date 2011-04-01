<?php if ($isEnabled): ?>
<?php
$list = array();
foreach ($communityTopic as $topic)
{
  $list[] = sprintf("[%s] %s<br>%s",
    op_format_date($topic->getUpdatedAt(), 'XShortDate'),
    $topic->getCommunity()->getName(),
    link_to(sprintf("%s(%d)",
        op_truncate($topic->getName(), 28),
        $topic->getCommunityTopicComment()->count()
      ), '@communityTopic_show?id='.$topic->getId()
    )
  );
}
$options = array(
  'title' => __('Recently Community Topics'),
  'border' => true,
  'moreInfo' => array(
    link_to(__('More'), '@communityTopic_search_all?type=topic')
  ),
);

if(count($communityTopic)==0)
{
  $options['partsInfo'] = __('No data');
  unset($options['moreInfo']);
}

op_include_list('communityList', $list, $options);
?>

<?php endif; ?>
