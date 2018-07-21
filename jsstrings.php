<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.labyrint3
 *
 * @copyright 	Copyright (C) 2016 Pierre Veelen. All rights reserved.
 *				This code is based on Beez3 template
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JText::script('TPL_LABYRINT3_ALTOPEN');
JText::script('TPL_LABYRINT3_ALTCLOSE');
JText::script('TPL_LABYRINT3_TEXTRIGHTOPEN');
JText::script('TPL_LABYRINT3_TEXTRIGHTCLOSE');
JText::script('TPL_LABYRINT3_FONTSIZE');
JText::script('TPL_LABYRINT3_BIGGER');
JText::script('TPL_LABYRINT3_RESET');
JText::script('TPL_LABYRINT3_SMALLER');
JText::script('TPL_LABYRINT3_INCREASE_SIZE');
JText::script('TPL_LABYRINT3_REVERT_STYLES_TO_DEFAULT');
JText::script('TPL_LABYRINT3_DECREASE_SIZE');
JText::script('TPL_LABYRINT3_OPENMENU');
JText::script('TPL_LABYRINT3_CLOSEMENU');
?>

<script type="text/javascript">
	var big        = '<?php echo (int) $this->params->get('wrapperLarge'); ?>%';
	var small      = '<?php echo (int) $this->params->get('wrapperSmall'); ?>%';
	var bildauf    = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/plus.png';
	var bildzu     = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/minus.png';
	var rightopen  = '<?php echo JText::_('TPL_LABYRINT3_TEXTRIGHTOPEN', true); ?>';
	var rightclose = '<?php echo JText::_('TPL_LABYRINT3_TEXTRIGHTCLOSE', true); ?>';
	var altopen    = '<?php echo JText::_('TPL_LABYRINT3_ALTOPEN', true); ?>';
	var altclose   = '<?php echo JText::_('TPL_LABYRINT3_ALTCLOSE', true); ?>';
</script>
