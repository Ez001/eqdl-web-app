	<!-- core:js -->
	<script src="<?= $server_name ?>/assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<script src="<?= $server_name ?>/assets/js/dashboard-light.js"></script>
	<!-- Plugin js for this page -->
	<script src="<?= $server_name ?>/assets/vendors/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/inputmask/jquery.inputmask.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/select2/select2.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/dropzone/dropzone.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/dropify/dist/dropify.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/pickr/pickr.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/moment/moment.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/flatpickr/flatpickr.min.js"></script>
	<script src="<?= $server_name ?>/assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="<?= $server_name ?>/assets/vendors/feather-icons/feather.min.js"></script>
	<script src="<?= $server_name ?>/assets/js/template.js"></script>
	<!-- endinject -->

	<script type="text/javascript">
		const server_name = <?= json_encode( $server_name ) ?>;
	</script>  

	<!-- Custom js for this page -->
	<script src="<?= $server_name ?>/assets/js/app.js"></script>
	
	<?php
		/*dynamically loading all js_modules*/
		$js_scripts = '';

		foreach ( $js_modules as $js_mod ) 
		{
			$js_scripts .= "<script src='$server_name/assets/js/$js_mod.js'></script>";
		}

		echo $js_scripts;
	?>
	<!-- End custom js for this page -->
</body>
</html>