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


$template = $app->getTemplate(true);
$templateSpanValue = intval ($template->params->get('imageSpan'));

$imageSpan = 'span' . $templateSpanValue;
$contentSpan = 'span' . (12 - $templateSpanValue); 

$float = json_decode($this->items['0']->images);

if ($float->image_intro !== '') {

	switch ($float->float_intro)
	  {
	  	case 'left':
			$this->wrightLeadingItemElementsStructure = Array(
			'div.item-container',
				'div.'. $imageSpan,
					'div.image-container',
					"image",
					'/div',
				'/div',
				'div.' . $contentSpan,
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
			break;
		case 'right':
		$this->wrightLeadingItemElementsStructure = Array(
			'div.item-container',
				'div.' . $contentSpan,
					'div.content-wrapper-left',
					"title",
					"icons",
					"legendtop",
					"article-info",
					"content",
					"legendbottom",
					'/div',
				'/div',
				'div.'. $imageSpan,
					'div.image-container-right',
					"image",
					'/div',
				'/div',
			'/div'
			);
		break;
		default:
		$this->wrightLeadingItemElementsStructure = Array(
		"image",
		"title",
		"icons",
		"legendtop",
		"article-info",
		"content",
		"legendbottom");
	}
} else {

$this->wrightLeadingItemElementsStructure = Array(
	"image",
	"title",
	"icons",
	"legendtop",
	"article-info",
	"content",
	"legendbottom");

}

$this->wrightElementsStructure = Array(
	"image",
	"title",
	"icons",
	"legendtop",
	"content",
	"article-info",
	"legendbottom"
);

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';
include Overrider::getOverride('com_content.featured');
