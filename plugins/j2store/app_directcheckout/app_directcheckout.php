<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');
require_once(JPATH_ADMINISTRATOR.'/components/com_j2store/library/plugins/app.php');
class plgJ2StoreApp_directcheckout extends J2StoreAppPlugin
{
	/**
	 * @var $_element  string  Should always correspond with the plugin's filename,
	 *                         forcing it to be unique
	 */
	var $_element   = 'app_directcheckout';

	function __construct( &$subject, $config )
	{
		parent::__construct( $subject, $config );
	}

	/**
	 * Overriding
	 *
	 * @param $options
	 * @return unknown_type
	 */
	function onJ2StoreGetAppView( $row )
	{

		if (!$this->_isMe($row))
		{
			return null;
		}

		$html = $this->viewList();


		return $html;
	}


	function viewList()
	{
		$app = JFactory::getApplication();
		JToolBarHelper::title(JText::_('J2STORE_APP').'-'.JText::_('PLG_J2STORE_'.strtoupper($this->_element)),'j2store-logo');
		JToolBarHelper::back('PLG_J2STORE_BACK_TO_APPS', 'index.php?option=com_j2store&view=apps');
		JToolBarHelper::back('J2STORE_BACK_TO_DASHBOARD', 'index.php?option=com_j2store');
		$vars = new JObject();
		//model should always be a plural
		$this->includeCustomModel('AppDirectcheckouts');

		$model = F0FModel::getTmpInstance('AppDirectcheckouts', 'J2StoreModel');
		$vars->model = $model;
		$id = $app->input->getInt('id', '0');
		$vars->id = $id;
		$html = $this->_getLayout('default', $vars);
		return $html;
	}


	public function onJ2StoreGetCartlink(&$url){

		$app = JFactory::getApplication();
		$view = $app->input->getString('view','');
		$task = $app->input->getString('task','');
		//only do this when not in cart view.
		if(!in_array($view, array('cart', 'carts')) || in_array($task,array('addItem'))) {
			$url = JRoute::_('index.php?option=com_j2store&view=checkout',false);
		}

	}

	/**
	 * Method to get the redirect link for
	 * @param unknown_type $product
	 */
	public function onJ2storeProductCheckoutLink($product)
	{
		$product->checkout_link = JRoute::_('index.php?option=com_j2store&view=checkout',false);
	}


}

