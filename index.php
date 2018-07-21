<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.labyrint3
 * 
 * @copyright 	Copyright (C) 2016 Pierre Veelen. All rights reserved.
 *				This code is based on Beez3 template and GoogleAnalytics plugin code
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @copyright   Copyright (C) 2012 PB Web Development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

JLoader::import('joomla.filesystem.file');

// Check modules
$showRightColumn = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom      = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft        = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn == 0 and $showleft == 0)
{
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// Get params
$color          = $this->params->get('templatecolor');
$logo           = $this->params->get('logo');
$navposition    = $this->params->get('navposition');
$headerImage    = $this->params->get('headerImage');
$doc            = JFactory::getDocument();
$app            = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
$config         = JFactory::getConfig();
$bootstrap      = explode(',', $templateparams->get('bootstrap'));
$jinput         = JFactory::getApplication()->input;
$option         = $jinput->get('option', '', 'cmd');

// Get analytics params       
$GAType 		= $this->params->get('AnalyticsType', '');
$trackerCode 	= $this->params->get('AnalyticsCode', '');
$domain 		= $this->params->get('AnalyticsDomain', 'auto');
$verify 		= $this->params->get('VerificationCode', '');
$analyticsjavascript = '';

if (in_array($option, $bootstrap))
{
	// Load optional rtl Bootstrap css and Bootstrap bugfixes
	JHtml::_('bootstrap.loadCss', true, $this->direction);
}

$doc->addStyleSheet($this->baseurl . '/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/print.css', $type = 'text/css', $media = 'print');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/general.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/' . htmlspecialchars($color) . '.css', $type = 'text/css', $media = 'screen,projection');

if ($this->direction == 'rtl')
{
	$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template_rtl.css');
	if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css'))
	{
		$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/' . htmlspecialchars($color) . '_rtl.css');
	}
}

JHtml::_('bootstrap.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/md_stylechanger.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/hide.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/respond.src.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/template.js', 'text/javascript');

// create the analytics string

if($verify)
{
	$analyticsjavascript .= "
	<meta name=\"google-site-verification\" content=\"".$verify."\" />
	";
}

$analyticsjavascript .= "
<!-- Google Analytics from Labyrint3 template by pvln.nl starts here. -->
";

if ($GAType == 'asynchronous')
{
    $analyticsjavascript .= "
<script type=\"text/javascript\"> 
var _gaq = _gaq || [];
 _gaq.push(['_setAccount', '" . $trackerCode . "']);
";
    $analyticsjavascript .= "_gaq.push(['_trackPageview']);
 (function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();
</script>
<!-- Asynchronous Google Analytics from Labyrint3 template by pvln.nl ends here. -->
";
}

if ($GAType == 'universal')
{
   $analyticsjavascript .= "
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '" . $trackerCode . "', '" . $domain . "');
  ga('send', 'pageview');

</script>
<!-- Universal Google Analytics from Labyrint3 template by pvln.nl ends here. -->
";
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		<?php require __DIR__ . '/jsstrings.php';?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
		<meta name="HandheldFriendly" content="true" />
		<meta name="apple-mobile-web-app-capable" content="YES" />

		<jdoc:include type="head" />

		<!--[if IE 7]>
		<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		
	<?php echo $analyticsjavascript ?>;
	
	</head>
	<body id="shadow">
		<?php if ($color == 'image'):?>
			<style type="text/css">
				.logoheader {
					background:url('<?php echo $this->baseurl . '/' . htmlspecialchars($headerImage); ?>') no-repeat right;
				}
				body {
					background: <?php echo $templateparams->get('backgroundcolor'); ?>;
				}
			</style>
		<?php endif; ?>

		<div id="all">
			<div id="back">
				<header id="header">
					<div class="logoheader">
						<h1 id="logo">
						<?php if ($logo) : ?>
							<a href="<?php echo JURI::base(); ?>">
							<img 	src="<?php echo $this->baseurl; ?>/<?php echo htmlspecialchars($logo); ?>"
									alt="<?php echo htmlspecialchars($templateparams->get('sitetitle')); ?>" />
							</a>		
						<?php endif;?>
						<?php if (!$logo AND $templateparams->get('sitetitle')) : ?>
							<?php echo htmlspecialchars($templateparams->get('sitetitle')); ?>
						<?php elseif (!$logo AND $config->get('sitename')) : ?>
							<?php echo htmlspecialchars($config->get('sitename')); ?>
						<?php endif; ?>
						<span class="header1">
						<?php echo htmlspecialchars($templateparams->get('sitedescription')); ?>
						</span></h1>
					</div><!-- end logoheader -->
					<ul class="skiplinks">
						<li><a href="#main" class="u2"><?php echo JText::_('TPL_LABYRINT3_SKIP_TO_CONTENT'); ?></a></li>
						<li><a href="#nav" class="u2"><?php echo JText::_('TPL_LABYRINT3_JUMP_TO_NAV'); ?></a></li>
						<?php if ($showRightColumn) : ?>
							<li><a href="#right" class="u2"><?php echo JText::_('TPL_LABYRINT3_JUMP_TO_INFO'); ?></a></li>
						<?php endif; ?>
					</ul>
					<h2 class="unseen"><?php echo JText::_('TPL_LABYRINT3_NAV_VIEW_SEARCH'); ?></h2>
					<h3 class="unseen"><?php echo JText::_('TPL_LABYRINT3_NAVIGATION'); ?></h3>
					<jdoc:include type="modules" name="position-1" />
					<div id="line">
						<div id="fontsize"></div>
						<h3 class="unseen"><?php echo JText::_('TPL_LABYRINT3_SEARCH'); ?></h3>
						<jdoc:include type="modules" name="position-0" />
					</div> <!-- end line -->
				</header><!-- end header -->
				<div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
					<div id="breadcrumbs">
						<jdoc:include type="modules" name="position-2" />
					</div>

					<?php if ($navposition == 'left' and $showleft) : ?>
						<nav class="left1 <?php if ($showRightColumn == null) { echo 'leftbigger';} ?>" id="nav">
							<jdoc:include type="modules" name="position-7" style="labyrintDivision" headerLevel="3" />
							<jdoc:include type="modules" name="position-4" style="labyrintHide" headerLevel="3" state="0 " />
							<jdoc:include type="modules" name="position-5" style="labyrintTabs" headerLevel="2"  id="3" />
						</nav><!-- end navi -->
					<?php endif; ?>

					<div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>>
						<div id="main">

							<?php if ($this->countModules('position-12')) : ?>
								<div id="top">
									<jdoc:include type="modules" name="position-12" />
								</div>
							<?php endif; ?>

							<jdoc:include type="message" />
							<jdoc:include type="component" />

						</div><!-- end main -->
					</div><!-- end wrapper -->

					<?php if ($showRightColumn) : ?>
						<div id="close">
							<a href="#" onclick="auf('right')">
							<span id="bild">
								<?php echo JText::_('TPL_LABYRINT3_TEXTRIGHTCLOSE'); ?>
							</span>
							</a>
						</div>

						<aside id="right">
							<h2 class="unseen"><?php echo JText::_('TPL_LABYRINT3_ADDITIONAL_INFORMATION'); ?></h2>
							<jdoc:include type="modules" name="position-6" style="labyrintDivision" headerLevel="3" />
							<jdoc:include type="modules" name="position-8" style="labyrintDivision" headerLevel="3" />
							<jdoc:include type="modules" name="position-3" style="labyrintDivision" headerLevel="3" />
						</aside><!-- end right -->
					<?php endif; ?>

					<?php if ($navposition == 'center' and $showleft) : ?>
						<nav class="left <?php if ($showRightColumn == null) { echo 'leftbigger'; } ?>" id="nav" >

							<jdoc:include type="modules" name="position-7"  style="labyrintDivision" headerLevel="3" />
							<jdoc:include type="modules" name="position-4" style="labyrintHide" headerLevel="3" state="0 " />
							<jdoc:include type="modules" name="position-5" style="labyrintTabs" headerLevel="2"  id="3" />

						</nav><!-- end navi -->
					<?php endif; ?>

					<div class="wrap"></div>
				</div> <!-- end contentarea -->
			</div><!-- back -->
		</div><!-- all -->

		<div id="footer-outer">
			<?php if ($showbottom) : ?>
				<div id="footer-inner" >

					<div id="bottom">
						<div class="box box1"> <jdoc:include type="modules" name="position-9" style="labyrintDivision" headerlevel="3" /></div>
						<div class="box box2"> <jdoc:include type="modules" name="position-10" style="labyrintDivision" headerlevel="3" /></div>
						<div class="box box3"> <jdoc:include type="modules" name="position-11" style="labyrintDivision" headerlevel="3" /></div>
					</div>

				</div>
			<?php endif; ?>

			<div id="footer-sub">
				<footer id="footer">
					<jdoc:include type="modules" name="position-14" />
				</footer><!-- end footer -->
			</div>
		</div>
		<jdoc:include type="modules" name="debug" />
	</body>
</html>
