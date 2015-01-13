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

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';

if ($this->item->wrightType == 'leading')
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
							'article-info',
							'icons',
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
						'div.content-wrapper',
							'title',
							'article-info',
							'icons',
							'content',
						'/div',
					'/div',
					'div.span6',
						'div.image-container',
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

include Overrider::getOverride('com_content.category', 'blog_item');
