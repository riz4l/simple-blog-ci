	<footer>
		<div class="container">
			<hr></hr>
			<p>Copyright © 2016 Acode</p>
		</div>
	</footer>

	<!-- jQuery -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/tag_handler/jquery.taghandler.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/chosen2/chosen.jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/chosen2/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>

            <script type="text/javascript">
            var config = {
              '.chosen-select'           : {},
              '.chosen-select-deselect'  : {allow_single_deselect:true},
              '.chosen-select-no-single' : {disable_search_threshold:10},
              '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
              '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
              $(selector).chosen(config[selector]);
            }
            </script>
   
</html>