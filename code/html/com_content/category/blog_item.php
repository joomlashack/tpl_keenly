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

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';

$template = $app->getTemplate(true);
$specialHomeLayout = ($template->params->get('categoryBlogSpecialLayout') == '1' ? true : false);

if ($specialHomeLayout && $this->item->wrightType == 'leading')
{
	$float = getIntroImageFloat($this->item);

	switch ($float)
	{
		case 'left':
			$this->item->wrightElementsStructure = Array(
				'div.item-container',
					'div.span9',
						'div.image-container',
							'image',
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
				'/div'
			);
			break;

		case 'right':
			$this->item->wrightElementsStructure = Array(
				'div.item-container',
					'div.span3',
						'div.content-wrapper-left',
							'title',
							'icons',
							'article-info',
							'content',
						'/div',
					'/div',
					'div.span9',
						'div.image-container-right',
							'image',
						'/div',
					'/div',
				'/div'
			);
			break;

		default:
			$this->item->wrightElementsStructure = Array();
	}
}
else
{
	if ($this->item->wrightType == 'leading')
	{
		$itemImages = json_decode($this->item->images);

		if ($itemImages->image_intro !== '')
		{
			$float = getIntroImageFloat($this->item);

			switch ($float)
			{
				case 'left':
					$this->item->wrightElementsStructure = Array(
						'div.item-container',
							'div.span6',
								'div.image-container',
									'image',
								'/div',
							'/div',
							'div.span6',
								'div.content-wrapper',
									'title',
									'icons',
									'article-info',
									'content',
								'/div',
							'/div',
						'/div'
					);
					break;

				case 'right':
					$this->item->wrightElementsStructure = Array(
						'div.item-container',
							'div.span6',
								'div.content-wrapper-left',
									'title',
									'icons',
									'article-info',
									'content',
								'/div',
							'/div',
							'div.span6',
								'div.image-container-right',
									'image',
								'/div',
							'/div',
						'/div'
					);
					break;

				default:
					$this->item->wrightElementsStructure = Array();
			}
		}
		else
		{
			$this->item->wrightElementsStructure = Array();
		}
	}
}

include Overrider::getOverride('com_content.category', 'blog_item');
