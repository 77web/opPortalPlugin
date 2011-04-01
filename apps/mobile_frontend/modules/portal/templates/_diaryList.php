<?php if ($isEnabled): ?>
<?php use_helper('opDiary') ?>
<?php

$options = array(
  'title'  => __('Recently Posted Diaries of All'),
  'border' => true,
  'moreInfo' => array(link_to(__('More'), 'diary/list')),
);
$list = array();

if(count($diaryList)==0)
{
  $options['partsInfo'] = __('No data');
  unset($options['moreInfo']);
}
else
{
  foreach ($diaryList as $diary)
  {
    $list[] = sprintf("[%s] %s<br>%s",
              op_format_date($diary->created_at, 'XShortDate'),
              $diary->Member->name,
              link_to(op_diary_get_title_and_count($diary, false, 28), 'diary_show', $diary)
            );
  }
}

op_include_list('diaryList', $list, $options);
?>

<?php endif; ?>
