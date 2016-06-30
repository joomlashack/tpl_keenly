<?php
/**
 * @package     Keenly
 * @subpackage  Template File
 *
 * @copyright   Copyright (C) 2005 - 2016 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * Do not edit this file directly. You can copy it and create a new file called
 * 'custom.php' in the same folder, and it will override this file. That way
 * if you update the template ever, your changes will not be lost.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<doctype>
<html>
<head>
	<w:head />
	<link href='//fonts.googleapis.com/css?family=Karma:300,400,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="<?php echo $wrightBodyClass ?>">
	<div class="frame"></div>
	<?php
		if ($this->countModules('toolbar'))
			:
	?>
	<!-- toolbar -->
	<w:nav containerClass="<?php echo $wrightContainerClass ?>" rowClass="<?php echo $wrightGridMode ?>" wrapClass="navbar-fixed-top navbar-inverse" type="toolbar" name="toolbar" />
	<?php
		endif;
	?>
	<div class="<?php echo $wrightContainerClass; ?>">
		<!-- Total menu -->
		<?php
			if ($this->countModules('total-menu'))
				:
		?>
		<div class="total-menu-wrapper">
            <div class="total-menu-container">
                <div class="menu-close"><span><?php echo JText::sprintf('TPL_JS_KEENLY_CLOSE_MENU'); ?></span><i class="icon-remove"></i></div>
                <div class="menu-items">
                    <div class="wrapper-items">
                        <ul class="menu unstyled"></ul>
                    </div>
                </div>
                <div class="submenu-items">
                    <div class="wrapper-submenu-items">
                        <w:module type="none" name="total-menu" chrome="xhtml" />
                    </div>
                    <div class="total-menu-inner">
                        <w:module type="none" name="total-menu-inner" chrome="xhtml" />
                    </div>
                </div>
            </div>
		</div>
		<?php
			endif;
		?>
		<?php
			if ($this->countModules('label'))
				:
		?>
		<div class="label label-position pull-left">
			<w:module type="none" name="label" chrome="xhtml" />
		</div>
		<?php
			endif;
		?>
		<?php
			if ($this->countModules('total-menu'))
				:
		?>
		<div class="total-menu-btn pull-right">
			<a class="btn btn-navbar collapsed">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
		</div>
		<div class="clear"></div>
		<?php
			endif;
		?>
		<!-- header -->
		<header id="header">
			<div class="<?php echo $wrightGridMode; ?> clearfix">
				<w:logo name="top" />
				<div class="clear"></div>
			</div>
		</header>
		<?php
			if ($this->countModules('menu'))
				:
		?>
		<!-- menu -->
   		<w:nav name="menu" />
		<?php
			endif;
		?>
		<!-- featured -->
		<?php
			if ($this->countModules('featured'))
				:
		?>
		<div id="featured">
			<w:module type="none" name="featured" chrome="xhtml" />
		</div>
		<?php
			endif;
		?>
		<!-- grid-top -->
		<?php
			if ($this->countModules('grid-top'))
				:
		?>
		<div id="grid-top">
			<w:module type="<?php echo $wrightGridMode; ?>" name="grid-top" chrome="wrightflexgrid" />
		</div>
		<?php
			endif;
		?>
		<?php
			if ($this->countModules('grid-top2'))
				:
		?>
		<!-- grid-top2 -->
		<div id="grid-top2">
			<w:module type="<?php echo $wrightGridMode; ?>" name="grid-top2" chrome="wrightflexgrid" />
		</div>
		<?php
			endif;
		?>
		<!-- single image -->
        <?php if ($wrightSingleArticleDisplay): ?>
            <div class="row-fluid">
	            <div class="full-image span12 <?php if (!$showMountedImage): ?>full-image-margin<?php endif; ?>">
	                <img id="full-image-img" src="<?php echo $wrightSingleArticleImage ?>" alt="<?php echo $wrightSingleArticleAlt ?>" />
	            </div>
            </div>
        <?php endif; ?>
        <!-- single image end -->
		<div id="main-content" class="<?php echo $wrightGridMode; ?> <?php if ($wrightSingleArticleDisplay && $showMountedImage): ?>full-image-position <?php echo $mainContentClass; endif; ?>">
			<!-- sidebar1 -->
			<aside id="sidebar1">
				<w:module name="sidebar1" chrome="xhtml" />
			</aside>
			<!-- main -->
			<section id="main" <?php if ($wrightSingleArticleDisplay && $showMountedImage): ?>style="margin-top: -<?php echo $mountedImage ?>px;"<?php endif; ?>>
				<?php
					if ($this->countModules('above-content')):
				?>
				<!-- above-content -->
				<div id="above-content">
					<w:module type="none" name="above-content" chrome="xhtml" />
				</div>
				<?php
					endif;
				?>
				<?php
					if ($this->countModules('breadcrumbs')):
				?>
				<!-- breadcrumbs -->
				<div id="breadcrumbs">
						<w:module type="single" name="breadcrumbs" chrome="none" />
				</div>
				<?php
					endif;
				?>
				<!-- component -->
				<w:content />
				<?php
					if ($this->countModules('below-content'))
						:
				?>
				<!-- below-content -->
				<div id="below-content">
					<w:module type="none" name="below-content" chrome="xhtml" />
				</div>
				<?php
					endif;
				?>
			</section>
			<!-- sidebar2 -->
			<aside id="sidebar2">
				<w:module name="sidebar2" chrome="xhtml" />
			</aside>
		</div>
		<?php
			if ($this->countModules('grid-bottom'))
				:
		?>
		<!-- grid-bottom -->
		<div id="grid-bottom" >
				<w:module type="<?php echo $wrightGridMode; ?>" name="grid-bottom" chrome="wrightflexgrid" />
		</div>
		<?php
			endif;
		?>
		<?php
			if ($this->countModules('grid-bottom2'))
				:
		?>
		<!-- grid-bottom2 -->
		<div id="grid-bottom2" >
				<w:module type="<?php echo $wrightGridMode; ?>" name="grid-bottom2" chrome="wrightflexgrid" />
		</div>
		<?php
			endif;
		?>

	</div>

	<!-- footer -->
	<div class="wrapper-footer">
	   <footer id="footer" <?php
		if ($this->params->get('stickyFooter', 1))
			:
			?> class="sticky"<?php
		endif;
			?>>

			<?php
				if ($this->countModules('bottom-menu'))
				:
			?>
			<!-- bottom-menu -->
			<div class="dropup">
			<w:nav containerClass="<?php echo $wrightContainerClass ?>" rowClass="<?php echo $wrightGridMode ?>" name="bottom-menu" />
			</div>
			<?php
				endif;
			?>

	   	 <div class="<?php echo $wrightContainerClass; ?> footer-content">
	   		<?php
				if ($this->countModules('footer'))
				:
			?>
					<w:module type="<?php echo $wrightGridMode; ?>" name="footer" chrome="wrightflexgrid" />
		 	<?php
				endif;
			?>
				<w:footer />
			</div>
	   </footer>
	</div>
	<?php if ($hoverActive): ?>
		<script type="text/javascript">
		isHoverEvent = true;
		</script>
	<?php endif; ?>
	<script type='text/javascript' src='<?php echo JURI::root(true) ?>/templates/js_keenly/js/jkeenly.js'></script>
</body>
</html>
