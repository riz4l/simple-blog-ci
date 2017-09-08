<a href="javascript:" id="return-to-top"><img src="<?php echo base_url()?>/assets/img/arrow.png" width="50" height="50"></a>
<footer>
		<div class="container">
			<div class="box-footer">
				<div class="col-md-6">
					<p>Copyright © Acode 2016</p>
				</div>
				<div class="col-md-6">
					<ul>
						<?php 
						$query = $this->Mdl_front->get_page_menu();
						foreach($query as $row){?>
						<li><a href="<?php echo base_url()?>page/show/<?php echo $row->page_slug?>"><?php echo $row->page_judul?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	 <!-- jQuery -->  
     <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/prism.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.sticky.js"></script>
    <!-- Script to Activate the Carousel -->

    <script type="text/javascript">
    // STICKY
    $(document).ready(function(){

      $(window).load(function(){
         $("#sticky-menu").sticky({ topSpacing: 0 });
        });

     // ===== Scroll to Top ==== 
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });

     });
    </script>
</body>

	
</html>