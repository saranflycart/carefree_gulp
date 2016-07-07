<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();

if ($app->isSite())
{
	JSession::checkToken('get') or die(JText::_('JINVALID_TOKEN'));
}

$function  = $app->input->getCmd('function', 'jSelectProduct');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_j2store&view=products&layout=modal&tmpl=component&function=' . $function . '&' . JSession::getFormToken() . '=1');?>" method="post" name="adminForm" id="adminForm" class="form-inline">
	<?php if (empty($this->products)) : ?>
	<div class="alert alert-no-items">
		<?php echo JText::_('J2STORE_NO_ITEMS_FOUND'); ?>
	</div>
	<?php else:?>
		<?php $search = htmlspecialchars($this->state->search);?>
		<div class="input-prepend">
			<span class="add-on"><?php echo JText::_( 'J2STORE_FILTER_SEARCH' ); ?></span>
			<?php echo  J2Html::text('search',$search,array('id'=>'search' ,'class'=>'input j2store-product-filters'));?>

			<?php  echo  J2Html::button('go',JText::_( 'J2STORE_FILTER_GO' ) ,array('class'=>'btn btn-success','onclick'=>'this.form.submit();'));?>
			<?php  echo  J2Html::button('reset',JText::_( 'J2STORE_FILTER_RESET' ),array('id'=>'reset-filter-search','class'=>'btn btn-inverse',"onclick"=>"jQuery('#search').attr('value','');this.form.submit();"));?>
		</div>
		<?php echo $this->pagination->getLimitBox();?>
		<table class="table table-striped table-condensed">
			<thead>
			<tr>
				<th class="title">
					<?php echo JText::_('J2STORE_PRODUCT_NAME'); ?>
				</th>
				<th><?php echo JText::_('J2STORE_SKU');?></th>
			</tr>
			</thead>
			<tfoot>
			<tr>
				<td colspan="15">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
			</tfoot>
			<tbody>
				<?php
				foreach ($this->products as $i => $item) : ?>
					<tr>
					<td>
						<a href="javascript:void(0)" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $item->j2store_product_id; ?>', '<?php echo $this->escape(addslashes($item->title)); ?>', '<?php //echo $this->escape($item->catid); ?>', null, '<?php //echo $this->escape(ContentHelperRoute::getArticleRoute($item->id, $item->catid, $item->language)); ?>', '<?php //echo $this->escape($lang); ?>', null);">
							<?php echo $this->escape($item->title); ?></a>
					</td>
					<td>
						<?php echo $item->sku?>
					</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif;?>

</form>
