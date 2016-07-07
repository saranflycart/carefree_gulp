<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');
include_once(JPATH_ADMINISTRATOR.'/components/com_j2store/version.php');
class plgJ2StoreApp_directcheckoutInstallerScript {
	function preflight( $type, $parent ) {
		if(!JComponentHelper::isEnabled('com_j2store')) {
			Jerror::raiseWarning(null, 'J2Store not found. Please install J2Store before installing this plugin');
			return false;
		}
		jimport('joomla.filesystem.file');
		$version_file = JPATH_ADMINISTRATOR.'/components/com_j2store/version.php';
		require_once($version_file);
		if (JFile::exists ( $version_file )) {
			// abort if the current J2Store release is older
			if (version_compare ( J2STORE_VERSION, '3.1.1', 'lt' )) {
				Jerror::raiseWarning ( null, 'You are using an old version of J2Store. Please upgrade to the latest version' );
				return false;
			}
		}else{
			Jerror::raiseWarning ( null, 'J2Store not found or the version file is not found. Make sure that you have installed J2Store before installing this plugin' );
			return false;
		}

	}
}
