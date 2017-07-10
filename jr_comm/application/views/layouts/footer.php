</div>
</div>
<footer id="footer">
			<div class="holder">
				<ul class="social-networks">
                <?php $social_links = social_links(); ?>
					    <?php if($social_links->soc_fb != ''){?>
						<li><a href="<?php echo $social_links->soc_fb;?>" target="_blank" class="icon-facebook"></a></li>
                        <?php } ?>
					    <?php if($social_links->soc_you != ''){?>
						<li><a href="<?php echo $social_links->soc_you;?>" target="_blank" class="icon-youtube"></a></li>
                        <?php } ?>
					   <?php if($social_links->soc_tw != ''){?>
						<li><a href="<?php echo $social_links->soc_tw;?>" target="_blank" class="icon-twitter"></a></li>
                        <?php } ?>
                        <?php if($social_links->soc_rss != ''){?>
						<li><a href="<?php echo $social_links->soc_rss;?>" target="_blank" class="icon-rss"></a></li>
                        <?php } ?>
                         <?php if($social_links->soc_printerest != ''){?>
						<li><a href="<?php echo $social_links->soc_printerest;?>" target="_blank" class="icon-pinterest"></a></li>
                        <?php } ?>
                         <?php if($social_links->soc_google != ''){?>
						<li><a href="<?php echo $social_links->soc_google;?>" target="_blank" class="icon-google"></a></li>
                        <?php } ?>
                         <?php if($social_links->soc_dribbble != ''){?>
						<li><a href="<?php echo $social_links->soc_dribbble;?>" target="_blank" class="icon-dribble"></a></li>
                        <?php } ?>
                        <?php if($social_links->soc_lin != ''){?>
						<li><a href="<?php echo $social_links->soc_lin;?>" target="_blank" class="icon-linkedin"></a></li>
                        <?php } ?>
                         <?php if($social_links->soc_ins != ''){?>
						<li><a href="<?php echo $social_links->soc_ins;?>" target="_blank" class="icon-instagram"></a></li>
                        <?php } ?>
                         
				</ul>
				<nav class="footer-nav">
					<ul>
						<li class="active"><a href="javascript:void(0);"><?php echo ($lang == 'eng' ? 'All rights are reserved' : 'جميع الحقوق محفوظة');?></a></li>
                        <?php echo menus(3,$page_id,$parent_id);?>
						
					</ul>
				</nav>
			</div>
		</footer>
        
        <script> 
		var lang_base_url = '<?php echo lang_base_url();?>';
        var base_url = '<?php echo base_url();?>';
		var lang = '<?php echo $lang;?>';
        </script>
	<script src="<?php echo base_url();?>assets/frontend/tajeer/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/tajeer/js/jquery.main.js" defer></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/tajeer/js/wow.js" defer></script>
	<!-- please include this file only home page -->
    <?php if($contents[0]->tpl == 'home'){?>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/tajeer/js/rangeSlider.js" defer></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/tajeer/js/jquery-ui.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/tajeer/js/tajeer.js"></script>
    <!--<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/tajeer/js/jquery.ui.slider-rtl.js" defer></script>-->
     <script>
	
	
	function redirect(lang)
	  {
		  if(lang == 'eng')
		  {
			  <?php 
			  $url = '';
			  $uri_string = explode('/', uri_string());
				for($i=1;$i<sizeof($uri_string);$i++){
					if($uri_string[$i] != ''){
						$url .= $uri_string[$i] . '/';
					}
				}
				?>
			window.location.href = '<?php  echo base_url() . $url; ?>'; 
		  }else
		  {
			 window.location.href = '<?php  echo base_url() .'ar/'. uri_string(); ?>';  
		  } 
		  
	  }
	  
   var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo getGAtrackingID()?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

	

</script>
    
</body>
</html>