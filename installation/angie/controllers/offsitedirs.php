<?php
/**
 * @package angi4j
 * @copyright Copyright (C) 2009-2016 Nicholas K. Dionysopoulos. All rights reserved.
 * @author Nicholas K. Dionysopoulos - http://www.dionysopoulos.me
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v3 or later
 */

defined('_AKEEBA') or die();

class AngieControllerOffsitedirs extends AController
{
	public function move()
	{
        // We have to use the HTML filter, since the key could contain a forward slash
        // e.g. virtual_folders/first_folder
		$key = $this->input->get('key', null, 'html');

		if (empty($key))
		{
			$result = array(
				'percent'	=> 0,
				'error'		=> AText::_('OFFSITEDIRS_ERR_INVALIDKEY'),
				'done'		=> 1,
			);
			echo json_encode($result);
			return;
		}

		try
		{
            $this->getThisModel()->moveDir($key);

			$result = array(
				'percent'	=> 100,
				'error'		=> '',
				'done'		=> 1,
			);
		}
		catch (Exception $exc)
		{
			$result = array(
				'percent'	=> 0,
				'error'		=> $exc->getMessage(),
				'done'		=> 1,
			);
		}

		echo json_encode($result);
	}
}