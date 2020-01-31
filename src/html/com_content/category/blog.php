<?php
/**
 * @package     Keenly
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2015 Joomlashack.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$this->wrightIntroRowsClass = 'row-fluid';

$this->wrightIntroItemElementsStructure = Array(
    'image',
    'title',
    'icons',
    'article-info',
    'legendtop',
    'content',
    'legendbottom',
    'article-info-below',
    'article-info-split'
);

// Wright v.3: Layout options for the moreitmes and subcaterogies modules, (active, div span class 1,2,3 etc for the (1) moreitems and the (2)subcategories on a row oriented layout).
$this->MoreItemsGridOrientation = Array('activeLayout' => true, 'moreitemsLayout' => 8, 'subcategoriesLayout' => 4);

$template = $app->getTemplate(true);
$specialHomeLayout = ($template->params->get('categoryBlogSpecialLayout', '0') == '1' ? true : false);

if ($specialHomeLayout)
{
    $this->wrightIntroRowsClass = 'row-fluid extra-border';
    $this->specialItroItemsLayout = Array('activeLayout' => true, 'layoutitemscolums' => 3);
    $this->layoutSpanorder = Array(3,6,3);
}

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';
include Overrider::getOverride('com_content.category', 'blog');
