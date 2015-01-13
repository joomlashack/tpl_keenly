<?php
/**
 * @package     Elan
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2014 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

$this->wrightElementsStructure = Array(
	"image",
    "title",
    "icons",
    "legendtop",
    "content",
    "article-info",
    "legendbottom"
	);

$this->wrightLeadingItemElementsStructure = Array(
	"image",
    "title",
    "icons",
    "legendtop",
    "article-info",
    "content",
    "legendbottom"
	);

require_once(JPATH_THEMES.'/'.$app->getTemplate().'/'.'wright'.'/'.'html'.'/'.'overrider.php');
include(Overrider::getOverride('com_content.featured'));
?>
