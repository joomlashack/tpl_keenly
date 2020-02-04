<?php
/**
 * @package     Keenly
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2020 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';

$template = $app->getTemplate(true);
$specialHomeLayout = ($template->params->get('categoryBlogSpecialLayout', '0') == '1' ? true : false);

$templateSpanValue = $template->params->get('imageSpan', '2');
$imageSpan = 'span' . $templateSpanValue;
$contentSpan = 'span' . (12 - $templateSpanValue);


$wrightRowValue = $template->params->get('bs_rowmode');

if (JModuleHelper::getModules('sidebar1') || JModuleHelper::getModules('sidebar2'))
{
    $wrightRowValue = 'row-fluid';
}

if ($specialHomeLayout && $this->item->wrightType == 'leading')
{
    $float = getIntroImageFloat($this->item);
    $itemImages = json_decode($this->item->images);

    switch ($float)
    {
        case 'left':

            if ($itemImages->image_intro !== '') {
                $this->item->wrightElementsStructure = Array(
                    'div.item-container',
                        'div.'.$wrightRowValue,
                            'div.'.$imageSpan,
                                'div.image-container',
                                    'image',
                                '/div',
                            '/div',
                            'div.divider-container',
                            'div.divider-vertical',
                            '/div',
                            '/div',
                            'div.'.$contentSpan,
                                'div.content-wrapper',
                                    'title',
                                    'icons',
                                    'article-info',
                                    'legendtop',
                                    'content',
                                    'legendbottom',
                                    'article-info-below',
                                    'article-info-split',
                                '/div',
                            '/div',
                        '/div',
                    '/div'
                );
            }
            break;

        case 'right':

            if ($itemImages->image_intro !== '') {
                $this->item->wrightElementsStructure = Array(
                    'div.item-container',
                        'div.'.$wrightRowValue,
                            'div.'.$contentSpan,
                                'div.content-wrapper-left',
                                    'title',
                                    'icons',
                                    'article-info',
                                    'legendtop',
                                    'content',
                                    'legendbottom',
                                    'article-info-below',
                                    'article-info-split',
                                '/div',
                            '/div',
                            'div.divider-container',
                                'div.divider-vertical',
                                '/div',
                            '/div',
                            'div.'.$imageSpan,
                                'div.image-container-right',
                                    'image',
                                '/div',
                            '/div',
                        '/div',
                    '/div'
                );
            }
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
                        'div.'.$wrightRowValue,
                            'div.span6',
                                'div.image-container',
                                    'image',
                                '/div',
                            '/div',
                            'div.divider-container',
                            'div.divider-vertical',
                            '/div',
                            '/div',
                            'div.span6',
                                'div.content-wrapper',
                                    'title',
                                    'icons',
                                    'article-info',
                                    'legendtop',
                                    'content',
                                    'legendbottom',
                                    'article-info-below',
                                    'article-info-split',
                                '/div',
                            '/div',
                            '/div',
                        '/div'
                    );
                    break;

                case 'right':
                    $this->item->wrightElementsStructure = Array(
                        'div.item-container',
                        'div.'.$wrightRowValue,
                            'div.span6',
                                'div.content-wrapper-left',
                                    'title',
                                    'icons',
                                    'article-info',
                                    'legendtop',
                                    'content',
                                    'legendbottom',
                                    'article-info-below',
                                    'article-info-split',
                                '/div',
                            '/div',
                            'div.divider-container',
                            'div.divider-vertical',
                            '/div',
                            '/div',
                            'div.span6',
                                'div.image-container-right',
                                    'image',
                                '/div',
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
