<section class="sliderSec"> <!--another class "innerpagesSlide" -->
	<div class="container">
        <div id="firstSlider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
             <ol class="carousel-indicators">
                    <li data-target="#firstSlider" data-slide-to="0" class="active"></li>
                    <li data-target="#firstSlider" data-slide-to="1"></li>
                    <li data-target="#firstSlider" data-slide-to="2"></li>
                </ol>        
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $i=0;
				
                 foreach($sliderList as $slide){
					 if($slide->pub_status == 1){
					 ?>
                        <div class="item <?php if($i==0){echo "active";} ?>">
                 <?php  $photos = homeImage($slide->id);
                     foreach ($photos as $image) { 
                         if($lang=='eng' && $image->eng_image!='') { ?>
                            <img src="<?php echo base_url(). 'thumbcreator/timthumb.php?src=';?><?php echo base_url() . 'uploads/content/'.$image->eng_image;?>&w=1400&h=593&q=100&zc=2" alt="slider" width="1400" height="593"/>
                         <?php }elseif($lang=='arb' && $image->arb_image!=''){ ?>
                        <img src="<?php echo base_url(). 'thumbcreator/timthumb.php?src=';?><?php echo base_url() . 'uploads/content/'.$image->arb_image;?>&w=1400&h=593&q=100&zc=2" alt="slider" width="1400" height="593"/>
                    <?php } } ?>
                     </div>
                    <?php $i++; } }?>
            </div>        
            <!-- Controls -->
            <a class="left carousel-control" href="#firstSlider" role="button" data-slide="prev"><img src="<?php echo base_url() . 'assets/frontEnd/edesign/'; ?>images/prev.png" alt="Prev" height="25" width="13" /></a>
            <a class="right carousel-control" href="#firstSlider" role="button" data-slide="next"><img src="<?php echo base_url() . 'assets/frontEnd/edesign/'; ?>images/next.png" alt="Next" height="25" width="13" /></a>
    	</div>
   </div>
</section>