<?php
/**
 * @package     Wright
 * @subpackage  Template File
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack.   All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Access template parameters
$document = JFactory::getDocument();

// Don't modify this file!
// Set your variables overrides for variables-something.less.
// These variables overrides are defined on templateDetails.xml below 'style' field
$lessCustomizationVars = array (
    '@color_one'    => $document->params->get('color_one', '#006A75'),
    '@color_two'    => $document->params->get('color_two', '#548DAC'),
    '@color_three'  => $document->params->get('color_three', '#363636'),
    '@color_four'   => $document->params->get('color_four', '#A9A998'),
    '@color_five'   => $document->params->get('color_five', '#FAFAF5')
);

// Run the compiler - 'bubbly' is the default style
require_once dirname(__FILE__) . '/../wright/build/less/compiler.php';
$build = new WrightLessCompiler;
$build->start('bubbly', $lessCustomizationVars);