<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$utm_query ='utm_source=free&utm_medium=basic&utm_campaign=inline&utm_content=promotions';
$domain = 'https://www.j2store.org';
?>

<?php echo $this->getRenderedForm(); ?>

<div class="payment-content inline-content">
	<div class="row-fluid">

		<div class="span9">

			<div class="hero-unit">
				<h2>Get promotion apps for your store. Increase sales and customer engagement</h2>
				<p class="lead">
					Promotion apps will help you offer bulk discounts, reward your customers with redeemable points and sell gift certificates which can be redeemed.
				</p>
				<a target="_blank" class="app-button app-button-open j2-flat-button" href="<?php echo $domain;?>/extensions/apps.html?<?php echo $utm_query; ?>"><?php echo JText::_('J2STORE_GET_MORE_APPS'); ?></a>

			</div>

		</div>

	</div>

</div>