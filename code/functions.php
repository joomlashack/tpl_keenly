<?php
/**
* @package Keenly
* @subpackage Functions
*
* @copyright Copyright (C) 2005 - 2014 Joomlashack. Meritage Assets. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
*/
// Restrict Access to within Joomla
defined('_JEXEC') or die('Restricted access');

// Single article image (full image)
$wrightSingleArticleDisplay = false;
$wrightSingleArticleImage = '';

$app = JFactory::getApplication();
$input = $app->input;

$mountedImage = $this->params->get('mountedImage','');

$paramOption = $input->getVar('option', '');
$paramView = $input->getVar('view', '');
$paramLayout = $input->getVar('layout', 'default');
$paramId = $input->getVar('id', '');

if ($paramOption == 'com_content' && $paramView == 'article')
{
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select($db->qn('images'))
		->from($db->qn('#__content'))
		->where($db->qn('id') . ' = ' . (int) $paramId);
	$db->setQuery($query);
	$images = $db->loadResult();

	if ($images != '')
	{
		$imagesArray = json_decode($images);

		// If there is an image and the float is not set, it checks the global config
		if ($imagesArray->image_fulltext != '' && $imagesArray->float_fulltext == 'none')
		{
			$wrightSingleArticleDisplay = true;
		}
		elseif ($imagesArray->image_fulltext != '' && $imagesArray->float_fulltext == '')
		{
			$query->clear()
				->select($db->qn('params'))
				->from($db->qn('#__extensions'))
				->where($db->qn('name') . ' = ' . $db->q('com_content'));
			$db->setQuery($query);
			$config = $db->loadResult();
			$configArray = json_decode($config);

			if ($configArray->float_fulltext == 'none')
			{
				$wrightSingleArticleDisplay = true;
			}
		}

		if ($wrightSingleArticleDisplay)
		{
			$wrightSingleArticleImage = $imagesArray->image_fulltext;
			$wrightSingleArticleAlt = $imagesArray->image_fulltext_alt;
		}
	}
}