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

$params = $this->item->params;
$images = json_decode($this->item->images);

$this->wrightElementsStructure = Array("image","title","icons","article-info","legendtop","content","legendbottom");
$template = $app->getTemplate(true);
$wrightRowValue = $template->params->get('bs_rowmode');

if ($params->get('access-view'))
{
	$imageExist = (isset($images->image_fulltext) && !empty($images->image_fulltext)) ? true : false;
	$imageFloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext;

	if ($imageExist && $imageFloat == 'none')
	{
		$this->wrightElementsStructure = Array("title","icons","article-info","legendtop","content","legendbottom");
	} else {
		switch ($imageFloat) {
		case 'left':
			$this->wrightElementsStructure = Array(
				'div.item-container',
					'div.'.$wrightRowValue,
						'div.span9',
							'div.image-container',
								'image',
							'/div',
						'/div',
						'div.divider-container',
						'div.divider-vertical',
						'/div',
						'/div',
						'div.span3',
							'div.content-wrapper',
								'title',
								'icons',
								'article-info',
								'content',
							'/div',
						'/div',
					'/div',
				'/div'
			);
		break;
		case 'right':
			$this->wrightElementsStructure = Array(
				'div.item-container',
				'div.'.$wrightRowValue,
					'div.span3',
						'div.content-wrapper-left',
							'title',
							'icons',
							'article-info',
							'content',
						'/div',
					'/div',
					'div.divider-container',
						'div.divider-vertical',
						'/div',
					'/div',
					'div.span9',
						'div.image-container-right',
							'image',
						'/div',
					'/div',
					'/div',
				'/div'
			);
			break;
		}
	}
}

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';
include Overrider::getOverride('com_content.article');
