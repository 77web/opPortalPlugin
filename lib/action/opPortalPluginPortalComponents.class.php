<?php
/**
* opPortalPluginRanking components
*
* @package OpenPNE/opPortalPlugin
* @subpackage action
* @author Hiromi Hishida<info@77-web.com>
* @version 0.9
*/
class opPortalPluginPortalComponents extends sfComponents
{
  /*
   * Executes diary list component
   * @param sfWebRequest $request A request object
   */
  public function executeDiaryList($request)
  {
    $this->diaryList = array();
    if(opPlugin::getInstance('opDiaryPlugin')->getIsActive())
    {
      $max = $this->gadget->getConfig('max', 5);
      $this->diaryList = Doctrine::getTable('Diary')->getDiaryList($max, DiaryTable::PUBLIC_FLAG_OPEN);
    }
  }
  
  /*
   * Executes community topic list component
   * @param sfWebRequest $request A request object
   */
  public function executeTopicList($request)
  {
    $this->communityTopic = array();
    if(opPlugin::getInstance('opCommunityTopicPlugin')->getIsActive())
    {
      $max = $this->gadget->getConfig('max', 5);
      $table = Doctrine::getTable('CommunityTopic');
      $query = $table->createQuery('t')->orderBy('t.updated_at DESC');
      $pager = $table->getResultListPager($query, 1, $max);
      $this->communityTopic = $pager->getResults();
    }
  }

  /*
   * Executes community event list component
   * @param sfWebRequest $request A request object
   */
  public function executeEventList($request)
  {
    $this->communityEvent = array();
    if(opPlugin::getInstance('opCommunityTopicPlugin')->getIsActive())
    {
      $max = $this->gadget->getConfig('max', 5);
      $table = Doctrine::getTable('CommunityEvent');
      $query = $table->createQuery('t')->orderBy('t.updated_at DESC');
      $pager = $table->getResultListPager($query, 1, $max);
      $this->communityEvent = $pager->getResults();
    }
  }
}