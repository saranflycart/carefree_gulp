<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */

// No direct access
defined('_JEXEC') or die;
?>


<?php echo $this->loadTemplate('images'); ?>

<div class="j2store-cart">
	
<?php if($this->params->get('catalog_mode', 0) == 0): ?>

<form action="<?php echo $this->product->cart_form_action; ?>"
		method="post" class="j2store-addtocart-form"
		id="j2store-addtocart-form-<?php echo $this->product->j2store_product_id; ?>"
		name="j2store-addtocart-form-<?php echo $this->product->j2store_product_id; ?>"
		data-product_id="<?php echo $this->product->j2store_product_id; ?>"
		data-product_type="<?php echo $this->product->product_type; ?>"
		enctype="multipart/form-data">

<?php $cart_type = $this->params->get('list_show_cart', 1); ?>

<?php if($cart_type == 1) : ?>
	<?php echo $this->loadTemplate('configurableoptions'); ?>
	<?php echo $this->loadTemplate('cart'); ?>

<?php elseif( ($cart_type == 2 && count($this->product->options)) || $cart_type == 3 ):?>
<!-- we have options so we just redirect -->
	<a href="<?php echo $this->product->product_link; ?>" class="<?php echo $this->params->get('choosebtn_class', 'btn btn-success'); ?>"><i class="fa fa-long-arrow-right"></i><?php echo JText::_('J2STORE_VIEW_PRODUCT_DETAILS'); ?></a>
<?php else: ?>
	<?php echo $this->loadTemplate('cart'); ?>
<?php endif; ?>

</form>

<?php endif; ?>

	<!-- QUICK VIEW OPTION -->
	<div class="quick-view">
		<?php if($this->params->get('list_enable_quickview',0)):?>
		<?php JHTML::_('behavior.modal', 'a.modal'); ?>																									<?php JHTML::_('behavior.modal', 'a.modal'); ?>
		<a title="Quick View" itemprop="url" style="display:inline;position:relative;"
				class="modal j2store-product-quickview-modal btn btn-default"
				rel="{handler:'iframe', size: {x: 700, y: 500}}"
				href="<?php echo JRoute::_('index.php?option=com_j2store&view=products&task=view&id='.$this->product->j2store_product_id.'&tmpl=component'); ?>">
				<i class="fa fa-eye"></i>
			</a>
		<?php endif;?>
	</div>
	
	<!-- IMAGE MODAL------->
	<div class="modal-image">
		<a href="<?php echo $this->product->thumb_image;?>" class="modal" style="display:inline; position:relative;">
			<i class="fa fa-picture-o"></i>
		</a>
	</div>
	<!-- J2STORE plugins---->
	<?php echo J2Store::plugin()->eventWithHtml('AfterAddToCartButton', array($this->product, J2Store::utilities()->getContext('default_cart'))); ?>

<?php if(isset($this->product->event->afterDisplayContent)) : ?>
	<?php echo $this->product->event->afterDisplayContent; ?>
<?php endif;?>

</div>
<div class="j2product-content">
	<?php echo $this->loadTemplate('title'); ?>

	<?php if(isset($this->product->event->afterDisplayTitle)) : ?>
			<?php echo $this->product->event->afterDisplayTitle; ?>
	<?php endif;?>

	<?php if(isset($this->product->event->beforeDisplayContent)) : ?>
		<?php echo $this->product->event->beforeDisplayContent; ?>
	<?php endif;?>

	<?php echo $this->loadTemplate('description'); ?>

	<?php echo $this->loadTemplate('price'); ?>

	<?php if($this->params->get('list_show_product_sku', 1)) : ?>
		<?php echo $this->loadTemplate('sku'); ?>
	<?php endif; ?>

	<?php if($this->params->get('list_show_product_stock', 1) && J2Store::product()->managing_stock($this->product->variant)) : ?>
		<?php echo $this->loadTemplate('stock'); ?>
	<?php endif; ?>
</div>
