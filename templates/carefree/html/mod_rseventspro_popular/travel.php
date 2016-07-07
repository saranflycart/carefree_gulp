<?php
/**
* @package RSEvents!Pro
* @copyright (C) 2015 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<div class="rse_popular_module<?php echo $params->get('moduleclass_sfx'); ?>">
	<ul class="rse_popular_list">
	<?php foreach ($events as $event) { ?>
	
	<?php if (!empty($event->icon) && file_exists(JPATH_SITE.'/components/com_rseventspro/assets/images/events/thumbs/b_'.$event->icon)) { ?>
	<?php $image = JURI::root().'components/com_rseventspro/assets/images/events/thumbs/s_'.$event->icon.'?nocache='.uniqid(''); } ?>
		<li class="rs_box">
			<span class="plus"><a rel="{handler: 'image'}" class="rs_modal" href="<?php echo JRoute::_('index.php?option=com_rseventspro&task=image&id='.rseventsproHelper::sef($event->id,$event->name), false); ?>"><i class="fa fa-plus"></i></a></span>
			<span class="img-box"><a href="<?php echo rseventsproHelper::route('index.php?option=com_rseventspro&layout=show&id='.rseventsproHelper::sef($event->id,$event->name),false,$itemid) ?>"><img src="<?php echo JRoute::_('index.php?option=com_rseventspro&task=image&id='.rseventsproHelper::sef($event->id,$event->name), false); ?>" alt="<?php echo $event->name; ?>" /></a></span>
			<span class="title"><a href="<?php echo rseventsproHelper::route('index.php?option=com_rseventspro&layout=show&id='.rseventsproHelper::sef($event->id,$event->name),false,$itemid) ?>"><?php echo $event->name; ?></a></span>
			<span><?php // echo JText::plural('MOD_RSEVENTSPRO_POPULAR_HITS',$event->hits); ?></span>
			<?php error_reporting(0); JFactory::getApplication()->triggerEvent('rsepro_onAfterEventDisplay',array(array('event' => $event, 'categories' => $categories, 'tags' => $tags))); ?>
			
		</li>
	<?php } ?>
	</ul>
</div>
