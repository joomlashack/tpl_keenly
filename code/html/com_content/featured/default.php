<?php
/**
 * @package     Keenly
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2015 Joomlashack. Meritage Assets.  All rights reserved.
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
	'div.item-container',
    'div.span9',
    'div.image-container',
    "image",
    '/div',
    '/div',
    'div.span3',
    'div.content-wrapper',
    "title",
    "icons",
    "legendtop",
    "article-info",
    "content",
    "legendbottom",
    '/div',
    '/div',
    '/div'
	);

require_once(JPATH_THEMES.'/'.$app->getTemplate().'/'.'wright'.'/'.'html'.'/'.'overrider.php');
include(Overrider::getOverride('com_content.featured'));
?>
