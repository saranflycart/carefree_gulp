<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');
require_once (JPATH_ADMINISTRATOR . '/components/com_j2store/library/appmodel.php');
class J2StoreModelAppProductCompares extends J2StoreAppModel
{
	
	public $_element = 'app_productcompare';

	
	function getCompareProducts($list) {
		$variant_ids = array();
		foreach($list as $variant_id => $product_id) {
			
		} 
		
	}
	
}