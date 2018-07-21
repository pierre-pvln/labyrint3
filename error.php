<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.labyrint3
 *
 * @copyright 	Copyright (C) 2016 Pierre Veelen. All rights reserved.
 *				This code is based on Beez3 template
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * ###############################################################
 * Author:	Pierre Veelen
 * E-mail:	pierre.veelen@pvln.nl
 * Date:	2016-07-14
 *
 * Brief description of what is used for:
 * ======================================
 * custom error page for labyrint website
 *
 * See also https://docs.joomla.org/Custom_error_pages
 *
 * ###############################################################
 */

defined('_JEXEC') or die;

$showRightColumn = 0;
$showleft        = 0;
$showbottom      = 0;

// Get params
$app         = JFactory::getApplication();
$params      = $app->getTemplate(true)->params;
$logo        = $params->get('logo');
$color       = $params->get('templatecolor');
$navposition = $params->get('navposition');

// Get language and direction
$doc             = JFactory::getDocument();
$this->language  = $doc->language;
$this->direction = $doc->direction;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>

	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/position.css" type="text/css" media="screen,projection" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/layout.css" type="text/css" media="screen,projection" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/print.css" type="text/css" media="Print" />

	<?php $files = JHtml::_('stylesheet', 'templates/' . $this->template . '/css/general.css', null, false, true); ?>
	<?php if ($files) : ?>
		<?php if (!is_array($files)) : ?>
			<?php $files = array($files); ?>
		<?php endif; ?>
	<?php foreach ($files as $file) : ?>
		<link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
	<?php endforeach; ?>
	<?php endif; ?>

	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/<?php echo htmlspecialchars($color); ?>.css" type="text/css" />

	<?php if ($this->direction == 'rtl') : ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template_rtl.css" type="text/css" />
		<?php if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) : ?>
			<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/<?php echo $color ?>_rtl.css" type="text/css" />
		<?php endif; ?>
	<?php endif; ?>
	<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/media/cms/css/debug.css" type="text/css" />
	<?php endif; ?>
	<!--[if lte IE 6]>
		<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 7]>
		<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/error.css" type="text/css" />

</head>
	<body>
		<div id="all">
			<div id="back">
				<div id="header">
					<div class="logoheader">
						<h1 id="logo">
							<?php if ($logo) : ?>
								<a href="<?php echo JURI::base(); ?>">
								<img 	src="<?php echo $this->baseurl; ?>/<?php echo htmlspecialchars($logo); ?>"
										alt="<?php echo htmlspecialchars($params->get('sitetitle')); ?>" />
								</a>
							<?php else : ?>
								<?php echo htmlspecialchars($params->get('sitetitle')); ?>
							<?php endif; ?>
							<span class="header1">
								<?php echo htmlspecialchars($params->get('sitedescription')); ?>
							</span>
						</h1>
					</div><!-- end logoheader -->
					<ul class="skiplinks">
						<li>
							<a href="#wrapper2" class="u2">
								<?php echo JText::_('TPL_LABYRINT3_SKIP_TO_ERROR_CONTENT'); ?>
							</a>
						</li>
						<li>
							<a href="#nav" class="u2">
								<?php echo JText::_('TPL_LABYRINT3_ERROR_JUMP_TO_NAV'); ?>
							</a>
						</li>
					</ul>
					<div id="line">
					</div><!-- end line -->
				</div><!-- end header -->
				
				<div id="contentarea2" >
				
					<div class="left1" id="nav">
						<h2 class="unseen">
							<?php echo JText::_('TPL_LABYRINT3_NAVIGATION'); ?>
						</h2>
						<?php $module = JModuleHelper::getModule('menu'); ?>
						<?php echo JModuleHelper::renderModule($module); ?>
					</div><!-- end navi -->
					
					<div id="wrapper2">
						<div id="errorboxbody">
							<h2>
								<?php echo JText::_('TPL_LABYRINT3_PAGE_NOT_FOUND'); ?>
							</h2>
							<h3><?php echo JText::_('TPL_LABYRINT3_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h3>
							<p><?php echo JText::_('TPL_LABYRINT3_NOT_ABLE_TO_VISIT'); ?></p>
							<ul>
								<li><?php echo JText::_('TPL_LABYRINT3_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
								<li><?php echo JText::_('TPL_LABYRINT3_MIS_TYPED_ADDRESS'); ?></li>
								<li><?php echo JText::_('TPL_LABYRINT3_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
								<li><?php echo JText::_('TPL_LABYRINT3_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
							</ul>
							
							<?php if (JModuleHelper::getModule('search')) : ?>
								<div id="searchbox">
									<h3 class="unseen">
										<?php echo JText::_('TPL_LABYRINT3_SEARCH'); ?>
									</h3>
									<p>
										<?php echo JText::_('TPL_LABYRINT3_SEARCH'); ?>
									</p>
									<?php $module = JModuleHelper::getModule('search'); ?>
									<?php echo JModuleHelper::renderModule($module); ?>
								</div><!-- end searchbox -->
							<?php endif; ?>
							
							<div><!-- start gotohomepage -->
								<p>
								<a href="<?php echo $this->baseurl; ?>/index.php"
								   title="<?php echo JText::_('TPL_LABYRINT3_GO_TO_THE_HOME_PAGE'); ?>"
								   ><?php echo JText::_('TPL_LABYRINT3_HOME_PAGE_LINE_START') . JURI::base() . JText::_('TPL_LABYRINT3_HOME_PAGE_LINE_END'); ?>
								</a>
								</p>
							</div><!-- end gotohomepage -->
							<h3>
								<?php echo JText::_('TPL_LABYRINT3_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>
							</h3>
							<h2>#<?php echo $this->error->getCode(); ?>&nbsp;<?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
							</h2>
							<br />
						</div><!-- end errorboxbody -->
						
					</div><!-- end wrapper2 -->
				</div><!-- end contentarea2 -->
				<?php if ($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</div><!--end back -->
		</div><!--end all -->
		
		<div id="footer-outer">
			<div id="footer-sub">
				<div id="footer" >
					<?php $module = JModuleHelper::getModule('footer'); ?>
					<?php echo JModuleHelper::renderModule($module); ?>
				</div><!-- end footer -->
			</div><!-- end footer-sub -->
		</div><!-- end footer-outer-->
		
	</body>
</html>
