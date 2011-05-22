<?php
/**
* opPortalPluginRanking components
*
* @package OpenPNE/opPortalPlugin
* @subpackage action
* @author Hiromi Hishida<info@77-web.com>
* @version 0.9.1
*/
class opPortalPluginPortalComponents extends sfComponents
{
  /*
   * Executes diary list component
   * @param sfWebRequest $request A request object
   */
  public function executeDiaryList($request)
  {
    $this->isEnabled = opPlugin::getInstance('opDiaryPlugin')->getIsActive() && sfConfig::get('app_op_diary_plugin_is_open', true);
    if($this->isEnabled)
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
    $this->isEnabled = opPlugin::getInstance('opCommunityTopicPlugin')->getIsActive();
    if($this->isEnabled)
    {
      $max = $this->gadget->getConfig('col', 5);
      $table = Doctrine::getTable('CommunityTopic');
      $query = $table->createQuery('t')->orderBy('t.updated_at DESC')->leftJoin('t.Community c')->leftJoin('c.CommunityConfig cc')->addWhere('cc.name = ? AND cc.value != ?', array('public_flag', 'auth_commu_member'));
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
    $this->isEnabled = opPlugin::getInstance('opCommunityTopicPlugin')->getIsActive();
    if($this->isEnabled)
    {
      $max = $this->gadget->getConfig('col', 5);
      $table = Doctrine::getTable('CommunityEvent');
      $query = $table->createQuery('t')->orderBy('t.updated_at DESC')->leftJoin('t.Community c')->leftJoin('c.CommunityConfig cc')->addWhere('cc.name = ? AND cc.value != ?', array('public_flag', 'auth_commu_member'));
      $pager = $table->getResultListPager($query, 1, $max);
      $this->communityEvent = $pager->getResults();
    }
  }

  /*
   * Executes album list component
   * @param sfWebRequest $request A request object
   */
  public function executeAlbumList($request)
  {
    $this->isEnabled = opPlugin::getInstance('opAlbumPlugin')->getIsActive() && sfConfig::get('app_op_album_plugin_is_open', false);
    if($this->isEnabled)
    {
      $max = $this->gadget->getConfig('max', 5);
      $this->albumList = Doctrine::getTable('Album')->getAlbumList($max, AlbumTable::PUBLIC_FLAG_OPEN);
    }
  }
}