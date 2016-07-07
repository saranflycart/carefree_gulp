<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($this->countModules('travels')) : ?>
	<!-- NAV HELPER -->
	<div class="wrap t3-travels <?php $this->_c('travels') ?>">
			<jdoc:include type="modules" name="<?php $this->_p('travels') ?>" />
	</div>
	<!-- //NAV HELPER -->
<?php endif ?>
