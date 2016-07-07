<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 *
 * Bootstrap 2 layout of products
 */
// No direct access
defined('_JEXEC') or die;

$currency = J2Store::currency()->getSymbol();
$catid = JFactory::getApplication()->input->get('catid',array(),'Array');

$session = JFactory::getSession();
$session_manufacturer_ids = $session->get('manufacturer_ids',array(), 'j2store');
$session_vendor_ids = $session->get('vendor_ids',array(), 'j2store');
$session_productfilter_ids = $session->get('productfilter_ids',array(), 'j2store');

$currency = $this->currency->getSymbol();
$catid = JFactory::getApplication()->input->get('catid',array(),'Array');
?>

<div id="j2store-product-loading" style="display:none;"></div>

<form
	action="<?php echo JRoute::_('index.php');?>"
	method="post"
	class="form-horizontal"
	id="productsideFilters"
	name="productsideFilters"
	enctype="multipart/form-data">
	<input type="hidden" name="catid[]" id="filter_catid"  value ="" />
	<!-- Price Filters Starts Here -->
	<?php if($this->params->get('list_show_filter_price', 0) && isset($this->filters['pricefilters']) && count($this->filters['pricefilters'])): ?>
		<?php
		$min_price = $this->filters['pricefilters']['min_price'];
		$max_price = $this->filters['pricefilters']['max_price'];
		$range = $this->filters['pricefilters']['range'];
		$pricefrom = isset($this->state->pricefrom) && $this->state->pricefrom ? $this->state->pricefrom : $min_price;
		$priceto = isset($this->state->priceto) && $this->state->priceto ? $this->state->priceto : $max_price;
		?>
		<div class="t3-sidebar">
			<div class="t3-module">
				<div class="module-inner">
				<div class="j2store-product-filters price-filters">
					<h3 class="module-title product-filter-heading">
						<?php echo JText::_('J2STORE_PRODUCT_FILTER_PRICE_TITTLE'); ?>
					</h3>
					<div id="j2store-slider-range" style="width:100%;"></div>
					<br/>
					<!-- Price Filters Ends Here -->
					<div class="price-input-box">
						<input class="btn btn-success" type="submit"   id="filterProductsBtn"  value="<?php echo JText::_('J2STORE_FILTER_GO');?>" />
							<div class="pull-right">
								<?php echo $currency;?><span id="min_price"><?php echo $pricefrom;?></span>
								<?php echo JText::_('J2STORE_TO');?>
								<?php echo $currency;?><span id="max_price"><?php echo $priceto;?></span>
								<?php echo J2Html::hidden('pricefrom',$pricefrom ,array('id'=>'min_price_input'));?>
								<?php echo J2Html::hidden('priceto',$priceto,array('id'=>'max_price_input'));?>
							</div>
					</div>
				</div>
			</div>
		</div>
	 </div>
	<?php endif;?>


	<?php if($this->params->get('list_show_filter_category', 0)):?>
		<!-- Module Categories Filters -->
	<?php if(!empty($this->filters['filter_categories']) && count($this->filters['filter_categories'])):?>
	<div class="t3-sidebar">
		<div class="t3-module">
			<div class="module-inner">
				<div class="j2store-product-filters category-filters">
		<h3 class="module-title product-filter-heading">
			<?php echo JText::_('J2STORE_PRODUCT_FILTER_CATEGORY_TITTLE'); ?>
		</h3>
		<div id="j2store_category">
			<ul id="j2store_categories_mod" class="nav nav-list nav-stacked j2store-category-list">
					<?php ?>
					<li class="<?php echo (empty($catid[0]) && $catid[0]== 0 ) ? 'active' : '' ; ?> j2product-categories">
						<a onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('filter_catid').value='' ; document.getElementById('productsideFilters').submit();">
							<span class="j2store-item-rootcategory">
								<i class="fa fa-long-arrow-right"></i>
								<?php echo JText::_('J2STORE_PRODUCT_ALL');?>
							</span>
						</a>
					</li>
				<?php foreach ($this->filters['filter_categories'] as $item) : ?>
					<li class="<?php echo (count($catid[0] < 2) && $catid[0]== $item->id) ? 'active' : '' ; ?> j2product-categories  level<?php echo $item->level?>">
						<?php if($item->level >1):?>
							<a class="j2store-item-rootcategory"
									onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('filter_catid').value='<?php echo $item->id?>' ; document.getElementById('productsideFilters').submit();">
									<i class="fa fa-long-arrow-right"></i>
									<?php echo str_repeat("", $item->level);?><?php echo $item->title; ?></a>
						<?php else:?>
							<a class="j2store-item-category"
								onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('filter_catid').value='<?php echo $item->id?>' ; document.getElementById('productsideFilters').submit();">
								<i class="fa fa-long-arrow-right"></i>
								<?php echo $item->title; ?>
							</a>
						<?php endif;?>
					</li>
				<?php endforeach; ?>
			</ul>
			
			<!--<ul id="j2store_categories_mod" class="nav nav-list nav-stacked j2store-category-list">
					<?php ?>
					<li class="j2product-categories">
						<a href="<?php echo JRoute::_("index.php"); ?>">
							<span class="j2store-item-rootcategory">
								<i class="fa fa-long-arrow-right"></i>
								<?php echo JText::_('J2STORE_PRODUCT_ALL');?>
							</span>
						</a>
					</li>
				<?php foreach ($this->filters['filter_categories'] as $item) : ?>
				<li class="<?php echo (count($catid[0] < 2) && $catid[0]== $item->id) ? 'active' : '' ; ?> j2product-categories  level<?php echo $item->level?>">
						<?php if($item->level >1):?>
							<a class="j2store-item-rootcategory" href="<?php echo JRoute::_("&j2storesource=category&catid[]=".$item->id."&category_title=".$item->title); ?>">
									<i class="fa fa-long-arrow-right"></i>
									<?php echo str_repeat(" ", $item->level);?><?php echo $item->title; ?>
								</a>
						<?php else:?>
							<a class="j2store-item-category" href="<?php echo JRoute::_( "&j2storesource=category&catid[]=".$item->id."&category_title=".$item->title); ?>">
								
						<i class="fa fa-long-arrow-right"></i>
								<?php echo $item->title; ?>
								
							</a>
						<?php endif;?>
					</li>
				<?php endforeach; ?>
			</ul> -->
	</div>
</div>
			</div>
		</div>
	</div>
	
<?php endif;?>
<?php endif;?>

	<!-- Manufacturer -->

	<?php if($this->params->get('list_show_manfacturer_filter', 0)):?>
	<?php if(count($this->filters['manufacturers'])): ?>
		<!-- Brand / Manufacturer Filters -->
		<div class="j2store-product-filters manufacturer-filters">

		<div class="j2store-product-filter-title j2store-product-brand-title">
			<h4 class="product-filter-heading"><?php echo JText::_('J2STORE_PRODUCT_FILTER_BY_BRAND');?></h4>
			<span>
				<?php if(!empty($session_manufacturer_ids)):?>
					<a href="javascript:void(0);"  onclick="resetJ2storeBrandFilter();" >
						<?php echo JText::_('J2STORE_CLEAR');?>
					</a>

				<?php endif; ?>
			</span>
		</div>

			<div class="control-group">
				<?php
					foreach($this->filters['manufacturers'] as $k => $brand):
						$checked ='';
						if(!empty($session_manufacturer_ids) &&  in_array($brand->j2store_manufacturer_id , $session_manufacturer_ids) ){
							$checked ="checked ='checked'";
						}
					?>
					<label class="j2store-product-brand-label">
						<input type="checkbox" class="j2store-brand-checkboxes" name="manufacturer_ids[]"
								id="brand-input-<?php echo $brand->j2store_manufacturer_id ;?>"
								onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('productsideFilters').submit()"
								<?php echo $checked;?>
						       value="<?php echo $brand->j2store_manufacturer_id ;?>"  />
						<?php echo $brand->company;?>
					</label>
				<?php
				endforeach;?>
			</div>
		</div>
		<?php endif;?>
	<?php endif;?>

	<!-- Vendors -->
		<?php if($this->params->get('list_show_vendor_filter', 0) && !empty($this->filters['vendors'])):?>
	<div class="j2store-product-filters j2store-product-vendor-filters">
		<div class="j2store-product-filters-header">
			<h4 class="product-filter-heading"><?php echo JText::_('J2STORE_PRODUCT_FILTER_BY_VENDOR'); ?></h4>
			<?php if(!empty($session_vendor_ids)):?>
				<a href="javascript:void(0);" onclick="resetJ2storeVendorFilter();" >
					<?php echo JText::_('J2STORE_CLEAR');?>
				</a>
			<?php endif; ?>
		</div>
		<div class="control-group ">
		<?php foreach($this->filters['vendors'] as $key => $vendor):
				$checked ='';
				if(!empty($session_vendor_ids) && in_array( $vendor->j2store_vendor_id , $session_vendor_ids)){
					$checked ="checked ='checked'";
				}
		?>
			<label class="j2store-product-vendor-label">
				<input type="checkbox" class="j2store-vendor-checkboxes"
					   id="vendor-input-<?php echo $vendor->j2store_vendor_id ;?>"
				       name="vendor_ids[]"
				       onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('productsideFilters').submit()"
				       onchange="jQuery('#j2store-product-loading').show();this.form.submit()"
					 <?php echo $checked;?>
	  				  value="<?php echo $vendor->j2store_vendor_id ;?>"  />
				   	<?php echo $vendor->first_name .' '.$vendor->last_name;?>
			</label>
		<?php endforeach;?>
		</div>
	</div>
	<?php endif;?>


	<?php if($this->params->get('list_show_product_filter', 0)):?>
	<!-- Product Filters  -->
	<div class="j2store-product-filters productfilters-list">
			<?php $active_class='';?>

			<?php foreach ($this->filters['productfilters'] as $filtergroup):?>
				<div class="product-filter-group <?php echo F0FInflector::underscore($filtergroup['group_name']);?>">
						<h4 class="product-filter-heading"><?php echo $filtergroup['group_name'];?></h4>
						<span>
						<?php if(!empty($session_productfilter_ids) ):?>
							<a href="javascript:void(0);"
							   id="product-filter-group-clear-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"
								onclick="resetJ2storeProductFilter('j2store-pfilter-checkboxes-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>');"
								style="display:none;"
								 >
								<?php echo JText::_('J2STORE_CLEAR');?>
							</a>
							<?php endif; ?>
						</span>
				</div>
				<div class="control-group j2store-productfilter-list">
					<?php foreach($filtergroup['filters'] as $i =>$filter):
						$checked ='';
						if(!empty($session_productfilter_ids) && in_array( $filter->filter_id ,$session_productfilter_ids)){
							$checked ="checked ='checked'";
						}
					?>
					<label class="j2store-productfilter-label">
						<input class="j2store-pfilter-checkboxes-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"
								id="j2store-pfilter-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>-<?php echo $filter->filter_id ;?>"
								type="checkbox" name="productfilter_ids[]"
								 onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('productsideFilters').submit()"
								onchange="getJ2storeFiltersSubmit();"
								<?php echo $checked;?>
						value="<?php echo $filter->filter_id ;?>"  />
							<?php echo $filter->filter_name; ?>
					</label>
					<?php endforeach; ?>
				</div>

			<?php endforeach; ?>

	</div>
	<?php endif;?>

	<?php echo J2Html::hidden('option','com_j2store');?>
	<?php echo J2Html::hidden('view','products');?>
	<?php echo J2Html::hidden('task','browse');?>
	<?php echo J2Html::hidden('Itemid', JFactory::getApplication()->input->getUint('Itemid'));?>
	<?php echo JHTML::_( 'form.token' ); ?>
</form>

<script type="text/javascript">



/**
 * Method to Submit the form when search Btn clicked
 */
jQuery("#filterProductsBtn").on('click',function(){
	jQuery("#j2store-product-loading").show();
	jQuery("#productsideFilters").submit();
}) ;

jQuery('document').ready(function (){
	<?php foreach ($this->filters['productfilters'] as $filtergroup):?>
	<?php foreach($filtergroup['filters'] as $i =>$filter):?>
	var size = jQuery('.j2store-pfilter-checkboxes-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>:checked').length;
		if(size > 0){
			jQuery('#product-filter-group-clear-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>').show();
		}
	<?php endforeach;?>
	<?php endforeach;?>
});
</script>

<script type="text/javascript">

	//assign the values for price filters
	var min_value = jQuery( "#min_price" ).html();
	var max_value = jQuery( "#max_price" ).html();


(function($) {

	$( "#j2store-slider-range" ).slider({
		range: true,
		min: <?php echo $min_price;?>,
		max: <?php echo $max_price;?>,
		values: [ min_value,max_value],
		slide: function( event, ui ) {
		$( "#amount1" ).val( "<?php echo $currency;?>" + ui.values[ 0 ] + " - <?php echo $currency;?>" + ui.values[ 1 ] );
			$( "#min_price" ).html(ui.values[ 0 ]);
			$( "#max_price" ).html(  ui.values[ 1 ] );

			$( "#min_price_input" ).attr('value', ui.values[ 0 ]);
			$( "#max_price_input" ).attr('value',  ui.values[ 1 ] );

		}
	});

})(j2store.jQuery);


</script>
