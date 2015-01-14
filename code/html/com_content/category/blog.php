<?php
/**
 * @package     Unlimited
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2014 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

$this->wrightIntroItemElementsStructure = Array(
	'image',
	'title',
	'icons',
	'article-info',
	'content'
);

$this->MoreItemsGridOrientation = Array('activeLayout' => true, 'moreitemsLayout' => 8, 'subcategoriesLayout' => 4); // Wright v.3: Layout options for the moreitmes and subcaterogies modules, (active, div span class 1,2,3 etc for the (1) moreitems and the (2)subcategories on a row oriented layout).


require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';
include Overrider::getOverride('com_content.category', 'blog');
