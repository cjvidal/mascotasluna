<?php
if (!$this->session->loginuser == TRUE){
      
    }
    else{
?>
		
		<footer>
				<hr>
			<center><em>&copy; Mascotas Luna 2015</em></center>
		</footer>
		<!--<script src="https://code.jquery.com/jquery.js"></script>-->
		
		<script src="<?PHP echo base_url()?>JS/jquery.js"></script>
		<script src="<?PHP echo base_url()?>bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
		
		<script src="<?PHP echo base_url()?>bower_components/bootstrap-material-design/dist/js/ripples.min.js"></script>
		<script src="<?PHP echo base_url()?>bower_components/bootstrap-material-design/dist/js/material.min.js"></script>
		         
        <script src="<?PHP echo base_url()?>bower_components/snackbar/snackbar.min.js"></script>


        <script src="<?PHP echo base_url()?>bower_components/nouislider/jquery.nouislider.min.js"></script>
       
<!-- cdn for modernizr, if you haven't included it already -->
<!--<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>-->
<!-- polyfiller file to detect and load polyfills -->
<!--<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>-->

<script src="<?PHP echo base_url()?>JS//webshim-1.15.7/js-webshim/dev/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
		<script>
		       $(function() {
		                $.material.init();
		                $(".shor").noUiSlider({
		                    start: 40,
		                    connect: "lower",
		                    range: {
		                        min: 0,
		                        max: 100
		                    }
		                });

		                $(".svert").noUiSlider({
		                    orientation: "vertical",
		                    start: 40,
		                    connect: "lower",
		                    range: {
		                        min: 0,
		                        max: 100
		                    }
		                });
		            });

		    /*function justNumbers(e)
            {
	            var keynum = window.event ? window.event.keyCode : e.which;
	            if ((keynum == 8) || (keynum == 46 ) || (keynum == 9) )
	            return true;
	             
	            return /\d/.test(String.fromCharCode(keynum));
            }*/
        </script>

        <!-- cdn for modernizr, if you haven't included it already -->


</body>

</html>
<?php }?>