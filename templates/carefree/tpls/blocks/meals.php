<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($this->countModules('meals')) : ?>
	<!-- NAV HELPER -->
	<div class="wrap t3-meals <?php $this->_c('meals') ?>">
			<jdoc:include type="modules" name="<?php $this->_p('meals') ?>" />
	</div>
	<!-- //NAV HELPER -->
<?php endif ?>
