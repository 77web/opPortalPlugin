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
}