<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<!-- top bar -->
<nav id="t3-topbar" class="t3-topbar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 left-topbar">
				<div class="pull-left myaccount">
					<jdoc:include type="modules" name="<?php $this->_p('myaccount') ?>" />
				</div>
				<div class="pull-left currency">
					<jdoc:include type="modules" name="<?php $this->_p('currency') ?>" />
				</div>
				<div class="pull-left lanugage">
					<jdoc:include type="modules" name="<?php $this->_p('lanugage') ?>" />
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 right-topbar">
				<div class="pull-right">
					<jdoc:include type="modules" name="<?php $this->_p('signup') ?>" />
				</div>
				<div class="pull-right">
					<jdoc:include type="modules" name="<?php $this->_p('login') ?>" />
				</div>
			</div>
		</div>
	</div>
</nav>
	
<!-- //top bar -->
