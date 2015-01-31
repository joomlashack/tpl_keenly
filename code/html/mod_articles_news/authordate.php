<?php
/**
 * @package     Wright
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2015 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

$wrightNewsEnableIcons = false;
$wrightDisplayAuthor = true;
$wrightDisplayPublishedDate = true;
$wrightEnableIntroText = false;
$wrightUsePageHeader = false;

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';
include Overrider::getOverride('mod_articles_news');
