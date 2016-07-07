<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">

	<?php if ($this->checkSpotlight('footnav', 'footer-1, footer-2, footer-3, footer-4, footer-5, footer-6')) : ?>
		<!-- FOOT NAVIGATION -->
		<div class="container">
			<?php $this->spotlight('footnav', 'footer-1, footer-2, footer-3, footer-4, footer-5, footer-6') ?>
		</div>
		<!-- //FOOT NAVIGATION -->
	<?php endif ?>

	<section class="t3-copyright">
		<div class="container">
			<div class="row">
				<div class="<?php echo $this->getParam('t3-rmvlogo', 1) ? 'col-md-8' : 'col-md-12' ?> copyright <?php $this->_c('footer') ?>">
					<jdoc:include type="modules" name="<?php $this->_p('footer') ?>" />
         
				</div>
				
			</div>
		</div>
		<div class="map" id="info"><a href="#contact_Map"><i class="fa fa-map-marker"></i></a></div>
	</section>
</footer>
<!-- //FOOTER -->


<!-- BACK TOP TOP BUTTON -->
 
	<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs hidden-sm affix-top">
	 
		<button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
	 
	</div>
	 
	<script type="text/javascript">
	 
		(function($) {
		 
		// Back to top
		 
		$('#back-to-top').on('click', function(){
		 
		$("html, body").animate({scrollTop: 0}, 500);
		 
		return false;
		 
		});
		 
		})(jQuery);
		 
	</script>
	 
<!-- BACK TO TOP BUTTON -->

<!---- MAP -->
	
<div id="contact_Map" style="display: none;">
		<jdoc:include type="modules" name="<?php $this->_p('map-module') ?>" />
</div>
	<script type="text/javascript">
		var button = document.getElementById("info");
		var myDiv = document.getElementById("contact_Map");

		function show() {
			myDiv.style.display = "block";
		}

		function hide() {
			myDiv.style.display = "none";
		}

		function toggle() {
			if (myDiv.style.display === "none") {
				show();
			} else {
				hide();
			}
		}
		hide();
		button.addEventListener("click", toggle, false);
	</script>
<!-- //MAP -->
