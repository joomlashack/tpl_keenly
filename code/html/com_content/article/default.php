<?php
/**
 * @package     Wright
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2014 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

$params = $this->item->params;
$images = json_decode($this->item->images);

$this->wrightElementsStructure = Array("image","title","icons","article-info","legendtop","content","legendbottom");

if ($params->get('access-view'))
{
	$imageExist = (isset($images->image_fulltext) && !empty($images->image_fulltext)) ? true : false;
	$imageFloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext;

	if ($imageExist && $imageFloat == 'none')
	{
		$this->wrightElementsStructure = Array("title","icons","article-info","legendtop","content","legendbottom");
	}
}

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';
include Overrider::getOverride('com_content.article');
