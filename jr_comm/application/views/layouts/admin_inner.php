<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<base href="<?php echo base_url();?>">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<title><?php echo site_name('1');?> Admin Panel</title>

<link href="<?php echo base_url();?>assets/css/main_style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>assets/css/msgBoxLight.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>assets/css/kendo.common.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>assets/css/kendo.default.min.css" renableel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>assets/ico/favicon.ico" rel="shortcut icon"  type="image/ico" />

<!-- for time picker start -->

<!--<link rel="stylesheet" href="<?php echo base_url();?>assets/timepicker/jqx.base.css" type="text/css" /> -->

<script src="<?php echo base_url();?>assets/js/jquery-1.8.3.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

<link rel="stylesheet" href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css" type="text/css" />

<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mjs.nestedSortable.js"></script>

<!-- for time picker end -->

<script type="text/javascript" src="<?php echo base_url();?>assets/js/html5.js"></script>

<!--<script type="text/javascript" src=<?php echo base_url();?>"assets/js/jquery.js"></script>-->



<script type="text/javascript" src="<?php echo base_url();?>assets/js/kendo.web.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/ajaxfileupload.js"></script>

<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.datepick.js"></script>-->

 <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.tablednd.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>





<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>assets/js/jquery.dataTables.rowReordering.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.msgBox.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.selectbox-0.2.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js" ></script>

<script src="<?php echo base_url();?>assets/script/mlib-includes/js/init.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/script/mlib-includes/js/mce_mlib.js"></script>

<script>
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}


var backPages = [];

var currentPage = '<?php echo uri_string(); ?>';

var currentPageID = '<?php echo $this->uri->segment(4); ?>';



if(currentPage.split('/')[1] == 'content'){

	localStorage.removeItem('back_pages');

}



if(localStorage.length > 0 && (localStorage.key('back_pages') != null)){

	if(localStorage.getItem('back_pages') == ''){

		localStorage.clear();

	}else{

		if(localStorage.getItem('back_pages') != null){

			backPages = (localStorage.getItem('back_pages')).split(',');

			}

		

		

	}

}



function setBackPage(backPage){

	if(backPages[backPages.length - 1] != backPage){

		backPages.push(backPage);

		localStorage.setItem('back_pages',backPages);

	}

}



function getBackPage(){

	if(backPages.length > 0){

		var page = backPages.pop();

		localStorage.setItem('back_pages',backPages);

		return page;

	}

	return;

}



$(function(){

	$('.back_btn').click(function(){

		var back_page_url = '<?php echo base_url(); ?>' + getBackPage();

		location.href = back_page_url;

	});

});

function initMCEexact(e,a){



	tinyMCE.init({

	theme : "modern",

	mode: "exact",

	selector : e,

	theme_advanced_toolbar_location : "top",

	directionality : a,	

	width:500,

	plugins: [

		"advlist autolink link image lists charmap print preview hr anchor pagebreak",

		"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",

		"table contextmenu directionality emoticons paste textcolor mce_mlib code "

	],

	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

	 toolbar2: 'print preview media | forecolor backcolor emoticons',

	toolbar: 'mce_mlib',

	toolbar3: 'fontsizeselect',

    fontsize_formats: "8px 10px 12px 14px 18px 24px 36px"	



	});

}

var result =new Array();

function checkUniquePageTitle(check_form_type){ // check_form_type 0 for add 1 for edit



//alert("dfsgdfgedrfg");

//	return false;

	

	title = document.getElementById('eng_title').value;

	if(check_form_type == 1){

		page_title_before_change = document.getElementById('page_title_before_change').value;

	if(title == page_title_before_change){

		return true;

		

		}

	} 

	

	$.ajax({

		type: "post",

		url: "<?php echo base_url();?>ems/ajaxCon/checkUniquePageTitle",

		async: false,

		data: 'page_title='+title,

		success: function(data){

		 result = data.split('@@');

		}

	});

		

		if(result[0] == 1){

			document.getElementById('show_error').innerHTML = '<font color="#009900">Page title must be unique!</font>';

			return false;

		}else{

			return true;

			

			}

	

	}



</script>



<?php 

$segment1 = $this->uri->segment(1);

$segment2 = $this->uri->segment(2);

$segment3 = $this->uri->segment(3);

$segment4 = $this->uri->segment(4);

?>

 <?php if($segment2=='showrooms' || $segment2=='contactUs'){?>

  <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyBD_B9itndeM-jNoZBgIP6C8FnxBgUVrMc&sensor=false'></script>

<?php }?>



 <script src="<?php echo base_url();?>assets/js/jquery.icheck.min.js?v=0.9"></script>



<script>

$(document).ready(function(){

	

	$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });	

	

		show_div('<?php echo $result->tpl;?>');

			

		initMCEexact('textarea.eng','');

		initMCEexact('textarea.arb','rtl');

		initMCEexact('textarea.chn','');

		 

$("#preview").click(function (){

	

	var id = $("#page_id").val();

	if($("#tpl_id").val() > 0){

		

		$("#updateAbout").attr("action", "<?php echo lang_base_url();?>page/preview/"+id);

		}else{

			

			$("#updateAbout").attr("action", "<?php echo lang_base_url();?>page/preview/"+id);

			}

	

	

	$("#updateAbout").attr("target", "_blank");

	$("#updateAbout").submit();

	});

	

	 var i = 1;

	$("#add_row").click(function (){

		

		var eng_row = '<div id="rows'+i+'"><div class="edit_data_table_row"><div class="edit_data_table_col1">Full Name</div><div class="edit_data_table_col2"><input type="text" class="input_field"  value="" name="eng_name[]" id="eng_name'+i+'"></div></div><div class="edit_data_table_row"> <div class="edit_data_table_col1"> Contact#</div><div class="edit_data_table_col2"><input type="text" class="input_field"  value="" name="eng_no[]" id="eng_no'+i+'"></div></div><div style="margin: 10px; padding-left: 486px;"><img src="<?php echo base_url() . 'assets/images/'; ?>minus.png"  alt="Remove Row" title="Remove Row" onclick="remove_row('+i+')"></div></div><input type="hidden" value="" name="con_id[]">';

		

	var arb_row ='<div id="rows'+i+'"><div class="edit_data_table_row"><div class="edit_data_table_col1">Full Name</div><div class="edit_data_table_col2"><input type="text" class="input_field"  value="" name="arb_name[]" id="arb_name"  dir="rtl"></div></div><div class="edit_data_table_row"><div class="edit_data_table_col1"> Contact#</div><div class="edit_data_table_col2"><input type="text" class="input_field"  value="" name="arb_no[]" id="arb_no" dir="rtl"></div></div></div><input type="hidden" value="" name="con_id[]">';	

		i++;

		$("#eng_rows").append(eng_row);

		$("#arb_rows").append(arb_row);

		

		

		}); 

		

		/*$('.bg').mlibready({returnto:'#returned_gallery_imgs_bg', maxselect:1});

		$('.ceo').mlibready({returnto:'#returned_gallery_imgs_ceo', maxselect:1});

		$('.health').mlibready({returnto:'#returned_gallery_imgs_health', maxselect:1});

		$('.mission').mlibready({returnto:'#returned_gallery_imgs_mission', maxselect:1});

	 	$('.overview').mlibready({returnto:'#returned_gallery_imgs_overview', maxselect:1});

		$('.eng_img').mlibready({returnto:'#returned_gallery_imgs', maxselect:99});

		$('.arb_img').mlibready({returnto:'#returned_gallery_imgs_arb', maxselect:99});*/

 });

 

 function hide_all_divs()

 {

	$(".hide").hide(hideCallback);

	

 }



 function show_div(template_name){

	

	hide_all_divs();

	

	if(template_name == "about_us"){

	  $(".about_page").show(showCallback);

	}else if(template_name == "comm_partners"){

	  $(".partner_page").show(showCallback);

	}else if(template_name == "products"){

	  $(".product_page").show(showCallback);

	}else if(template_name == "accessories"){

	  $(".acc_page").show(showCallback);

	}else if(template_name == "solutions"){

	  $(".solution_page").show(showCallback);

	}else if(template_name == "where_we_are"){

		$(".where_page").show(showCallback);

	}else if(template_name == "contact_us"){

		$(".contact_page").show(showCallback);

	}else{

		hide_all_divs();

	} 

 }

 

 function showCallback(){

	 $(this).find('input, textarea, button, select').prop('disabled', false);

 }

 

 function hideCallback(){

	 $(this).find('input, textarea, button, select').prop('disabled', true);

 }

 

  function remove_row(a){ 

	$("#rows"+a).remove(); 

	$("#rows"+a).remove();

 }

 

var BASEPATH='<?php echo base_url();?>';

function enable(){

	



	   

	        if ( $("#example tbody tr td").hasClass('black_bar') ) {

			

                $("#example tbody tr td").removeClass('black_bar');

				$("#example tbody tr td.sorting_2").addClass('blue_bar');

				

				}

			

			



$('#enable').hide();	

$('#disable').show();	

}

function disable(){

	       if ( $("#example tbody tr td.sorting_2").hasClass('blue_bar') ) {

                $("#example tbody tr td.sorting_2").removeClass('black_bar');

				$("#example tbody tr td.sorting_2").addClass('black_bar');

            }

$('#ToolTables_example_1').click();	

$('#disable').hide();	

$('#enable').show();	

}



function highlight(id){

	

	 if ( $("#bar_"+id).hasClass('black_bar') ) {

		 

		 $("#bar_"+id).removeClass('black_bar');

		 $("#bar_"+id).addClass('blue_bar');

		 

	 }else  {

		 

		 $("#bar_"+id).removeClass('blue_bar');

		  $("#bar_"+id).addClass('black_bar');

	 }

}

function RemoveFilter(val){

			  

			 $(val).hide('slow');   

			   

		   }

		   

		   

		   		   

		 	   

			

			

function CreateJQGridCustomPaging() {

	

	 

	

    if (document.getElementsByClassName("PageSizeContainer").length == 0) {

        var selectbox = document.getElementsByName('example_length')[0];

        var PageSizeDiv;

        var PageSizeContainer = document.createElement("div");

        PageSizeContainer.className = "PageSizeContainer";

		var newFreeformLabel = document.createElement('p');

        newFreeformLabel.innerHTML = 'Display:';

		

         PageSizeContainer.appendChild(newFreeformLabel);

        for (var i = 0; i < selectbox.options.length; i++) {

            

			PageSizeDiv = document.createElement("div");

            PageSizeDiv.className = "PageSize";

            PageSizeDiv.innerHTML = selectbox.options[i].value + " | ";

            PageSizeDiv.setAttribute("page-size", selectbox.options[i].value);

            

			PageSizeDiv.onclick = function () {

			

                selectbox.value = this.attributes["page-size"].value; $('select[Name=example_length]').change();

                var AllPageDivs = document.getElementsByClassName("PageSize");

                for (var i = 0; i < AllPageDivs.length; i++) {

                    AllPageDivs[i].className = "PageSize";

				

				    if(AllPageDivs[0]){

						

					

					}else{

						

						 AllPageDivs[0].className = "PageSize";

					}

					

                }

				

                this.className = "PageSize Selected";

            };

            	

			

			PageSizeContainer.appendChild(PageSizeDiv);

			

		

        }

//        selectbox.parentNode.appendChild(PageSizeContainer);



document.getElementById("example_paginate").appendChild(PageSizeContainer);

        selectbox.style.display = "none";

		$(".PageSizeContainer div[page-size=5000]").text('Show All');

    }

	    

}



          $(document).ready(function(){

			  

			  // create ComboBox from select HTML element

                    $("#published").kendoComboBox();

					$("#position").kendoComboBox();

					

					$("#title_drop").kendoComboBox();

					$("#yr_drop").kendoComboBox();

					

					$("#sdate").kendoComboBox();

					$("#edate").kendoComboBox();

					$("#stime").kendoComboBox();

					$("#etime").kendoComboBox();

					$("#area").kendoComboBox();

					$("#dept").kendoComboBox();

					$("#position").kendoComboBox();

					$("#gender").kendoComboBox();

					$("#nationality").kendoComboBox();

					$("#jobtype").kendoComboBox();

					$("#view").kendoComboBox();

						$("#groups").kendoComboBox();

					

					 var select = $("#published").data("kendoComboBox");

					 var select2 = $("#position").data("kendoComboBox");

					  

					 var select3 = $("#title_drop").data("kendoComboBox");

					 var select4 = $("#yr_drop").data("kendoComboBox");

					  

					 var select5 = $("#sdate").data("kendoComboBox");

					 var select6 = $("#edate").data("kendoComboBox");

					 var select7= $("#stime").data("kendoComboBox");

					 var select8= $("#etime").data("kendoComboBox");

					 var select9= $("#etime").data("area");

					   

					 var select10= $("#dept").data("dept");

					 var select11= $("#position").data("position");

					 var select12= $("#gender").data("gender");

					 var select13= $("#nationality").data("nationality");

					 var select14= $("#jobtype").data("jobtype");

					 var select14= $("#view").data("view");

					 var select15= $("#view").data("groups");

					  

			  

            var callbacks_list = $('.demo-callbacks ul');

            function callback_log(id, type) {

              callbacks_list.prepend('<li><span>#' + id + '</span> is ' + type.replace('if', '').toLowerCase() + '</li>');

            };

            $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){

			$("#pub_val").val($('.demo-list input').val());

              callback_log(this.id, event.type);

            }).iCheck({

              checkboxClass: 'icheckbox_square-blue',

              radioClass: 'iradio_square-blue',

              increaseArea: '20%'

            });

			

			

			

				$( ".edit_data_table_row").on("click",".close_button_arb img", function() {

				  if(confirm("Are you sure to delete image? \nNote: After deleting you should need to save form!")){  

				$(this).parents(".row_data").remove();

				  

				var imgsrcs = "";

				$(".gallery-images-eng img.img-thumbs").each(function (index, element){

					var value = $(this).attr('src');

					value = value.split("script/");

					new_value = value[1];

					if(imgsrcs!="") imgsrcs += ",";

					imgsrcs += new_value;

					

				});

				$("#arb_img").val(imgsrcs);

				  }

			});

			//==============

			

			/*$('#returned_gallery_imgs').change( function() {  

			    alert('Change!'); 

			});*/

			

			/*$('#returned_gallery_imgs').bind("change", function() {

		       alert($(this).val()); 

 			});*/

			var count_image_thumb = 0;

			$('#returned_gallery_imgs').bind("DOMSubtreeModified",function(){

			 

			  var vaule = new Array();

			  var val = $("#eng_img").val();

			  var new_val = $("#returned_gallery_imgs").html();

			  new_val = new_val.split(",");

			  for (i = 0; i < new_val.length; i++) { 

                    text = new_val[i];

                    new_text =  text.split("script/");

					vaule[i] =  new_text[1];

					

					

					//var div_img_thumb = $("<div class=\"row_data bgImg\"><div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\"assets/script/"+vaule[i]+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">1920×1027</div></div></div><div class=\"close_button\"><img src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div></div>");

					

					

					$( '.gallery-images-eng' ).append( "<div class=\"row_data bgImg\"><div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\"assets/script/"+vaule[i]+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">1920×1027</div></div></div><div class=\"close_button\"><img src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div></div>" );

					

					/*

					var thumb_src = "assets/script/"+vaule[i];

					

					

					$('.gallery-images-eng').append(

						$('<div/>', {'class': 'row_data bgImg'}).append(

							$('<div/>', {'class': 'user_pic_panel'}).append(

								$('<div/>', {'class': 'user_pic_wrap_'}).append(

									$('<img class="img-thumbs" src="assets/script/'+vaule[i]+'" width="112px" height="108px">')

								)

							)

						)

						.append(

							$('<div/>', {'class': 'close_button'}).append(

								$('<img src="assets/images/close.png" width="19" height="17">')

							)

						)

					);

																				*/					

					

					

				   } 

				  new_val =  vaule.join(); 

			      

			  if(val != ''){

				  val = val + ','+  new_val ;  

				  }else{

				   val = new_val ;	  

					  }

			  

			   $("#eng_img").val(val);

			   

			   

			   count_image_thumb++;

			   

			});

			

				$('#returned_gallery_imgs_arb').bind("DOMSubtreeModified",function(){

			   var vaule = new Array();

			   var val = $("#arb_img").val();

			   var new_val_arb = $("#returned_gallery_imgs_arb").html();

			 

			   new_val_arb = new_val_arb.split(",");

			  for (i = 0; i < new_val_arb.length; i++) { 

                    text = new_val_arb[i];

                    new_text =  text.split("script/");

					vaule[i] =  new_text[1];

				  $( '.gallery-images-ar' ).append( '<div class="row_data bgImg"><div class="user_pic_panel" id="user_pic_panel"><div class="user_pic_wrap_"><img src="assets/script/'+vaule[i]+'" width="112px" height="108px"><div class="pic_size">1920×1027</div></div></div><div class="close_button_arb" id="remove_pic"><img src="assets/images/close.png" width="19" height="17"></div></div>' );

				   } 

				  new_val_arb =  vaule.join();

			 

			  if(val != ''){

				  val = val + ','+  new_val_arb ;  

				  }else{

				   val = new_val_arb ;	  

					  }

			  

			   $("#arb_img").val(val);

			});

			//============================================ Sarfraz edit Single page ============================================

				$('#returned_banner_image').bind("DOMSubtreeModified",function(){

			 

			    var new_val = $("#returned_banner_image").html();

			      if( $("#thumbdiv_banner_image").length != 0 ) {					

		

				$( "#thumbdiv_banner_image" ).html("<div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\""+new_val+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">1500×284</div></div></div><div style=\"width:10%;float:left;position:absolute;bottom:0px;left:112px;\"><img onclick=\"removeImage('thumbdiv_banner_image')\" src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div>");

			}

						

			$("#banner_image_mkey_hdn").val(new_val);			   			   

			   

		    });

			

			

			

			$('#returned_news_image').bind("DOMSubtreeModified",function(){

			 

			    var new_val = $("#returned_news_image").html();

			      if( $("#thumbdiv_news_image").length != 0 ) {					

		

				$( "#thumbdiv_news_image" ).html("<div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\""+new_val+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">1500×284</div></div></div><div style=\"width:10%;float:left;position:absolute;bottom:0px;left:112px;\"><img onclick=\"removeImage('thumbdiv_news_image')\" src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div>");

			}

						

			$("#news_image_mkey_hdn").val(new_val);			   			   

			   

		    });

		

		$('#returned_nesma_airlines_fleet_second').bind("DOMSubtreeModified",function(){

			 

			    var new_val = $("#returned_nesma_airlines_fleet_second").html();

			      if( $("#thumbdiv_nesma_airlines_fleet_second").length != 0 ) {					

		

				$( "#thumbdiv_nesma_airlines_fleet_second" ).html("<div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\""+new_val+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">487×274</div></div></div><div style=\"width:10%;float:left;position:absolute;bottom:0px;left:112px;\"><img onclick=\"removeImage('thumbdiv_nesma_airlines_fleet_second')\" src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div>");

			}

						

			$("#nesma_airlines_fleet_second_mkey_hdn").val(new_val);			   			   

			   

		});

					

		var count_image_thumb = 0;

		$('#returned_media_gallery_album_img_btn').bind("DOMSubtreeModified",function(){

		 

		  var vaule = new Array();

		  var val = $("#media_gallery_album_img_mkey_hdn").val();

		  var new_val = $("#returned_media_gallery_album_img_btn").html();

		  new_val = new_val.split(",");

		  for (i = 0; i < new_val.length; i++) { 

				text = new_val[i];

				new_text =  text.split("script/");

				vaule[i] =  new_text[1];

				if( $("#thumbdiv_media_gallery_album_image").length != 0 ) {

					$( '#thumbdiv_media_gallery_album_image' ).append( "<div class=\"row_data bgImg\"><div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\"assets/script/"+vaule[i]+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">1920×1027</div></div></div><div class=\"close_button\"><img onclick=\"removeImage('thumbdiv_media_gallery_album_image')\" src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div></div>" );

				}

			} 

			  new_val =  vaule.join(); 

			  

		  if(val != ''){

			  val = val + ','+  new_val ;  

			  }else{

			   val = new_val ;	  

				  }

		  

		   $("#media_gallery_album_img_mkey_hdn").val(val);



		   count_image_thumb++;

		});

		//================================================end===============================================================	

    });

		  

function removeImage(id){

	

	id_div = id;

	if(confirm("Are you sure to delete image? \nNote: After deleting you should need to save form!")){

	//$( "div" ).remove( "#"+id_div );

	$( "#"+id_div ).html("");

	var id_of_hdn_value = id_div.split('thumbdiv_');

	id_of_hdn_value = id_of_hdn_value[1];

	id_of_hdn_value = id_of_hdn_value+'_mkey_hdn';

	$("#"+id_of_hdn_value).val('');

	

	}

	}		       

          </script>

<script type="text/javascript">

 

$(document).ready(function(){

    

    

    var segment3 = "<?php echo $segment3;?>";

//////////// change publication status on grind - start /////////////

if(segment3 !='subcategory')

{

        $('input[id ^="pub_status_"]').click(function(){

        	  var id = this.id.replace('pub_status_','');

				if ($('#pub_status_'+id).is(":checked"))

				{

					publishStatus=1;

				}

				else

				{

					publishStatus=0;

				}

        	  url ='<?php echo base_url().'ems/'.$this->uri->segment(2).'/publish'; ?>';

                  $.post(url, {id:id,pub_status:publishStatus}, function(data){

                  $("#example").dataTable().fnDraw(true);

              });

        	 

            });

            

}

//////////// change publication status on grind - end /////////////            

    	

$('#submit_form').click(function(){

$('#overlay_form').submit();

});

$('#overlay_form').validate();		

			

//open popup

$("#pop").click(function(){

$("#overlay_form").fadeIn(1000);

positionPopup();



});



$("#pop2").click(function(){

$("#overlay_form").fadeIn(1000);

positionPopup();

});

 

//close popup

$("#close").click(function(){

$("#overlay_form").fadeOut(500);

});

});

 

//position the popup at the center of the page

function positionPopup(){

if(!$("#overlay_form").is(':visible')){

return;

}

$("#overlay_form").css({

left: ($(window).width() - $('#overlay_form').width()) / 2,

top: ($(window).height() - $('#overlay_form').height()) / 2,

height:385,

width:400,

position:'absolute'

});

}

 

//maintain the popup at center of the page when browser resized

$(window).bind('resize',positionPopup);

 $("#overlay_form").focus();







</script>

                <script language="javascript">

                    function links(va) {



                        if (va == 1) {

                            var id = '<?php echo $id ?>';

                            window.location.href = 'ems/gallery/edit/id/' + id;

                        } else if (va == 2) {

                            var id = '<?php echo $id ?>';

                            window.location.href = 'ems/gallery/gal_thumb/id/' + id;

                        } else {

                            var id = '<?php echo $id ?>';

                            window.location.href = 'ems/gallery/gal_detail/id/' + id;



                        }



                    }

                </script>

</head>



<body>



<form id="overlay_form"  name="overlay_form" style="display:none" method="post" action="ems/dashboard/contact" >

<table width="100%"  border="0" class="edit_table">

	  <tbody>

	   <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php  echo $msg?> </font></td></tr>

	  <tr class="blue_row">

	    <td width="2%">&nbsp;</td>

	    <td width="98%">Help</td><div class="forgot_button"><a id="close"><img src="assets/images/close.png"></a></div>

	  </tr>

	  <tr class="gray_row">

	    <td>&nbsp;</td>

	    <td>

    

    

    

      <!--edit_data_table-->

       <div class="edit_data_table">

       

       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1"> Name</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="" name="name" id="name" placeholder="name"></div>

             

             

             </div>

             

               <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1"> Email</div>

               <div class="edit_data_table_col2"><input placeholder="email" type="text" class="input_field required email"  value="" name="email" id="email"></div>

             

             

             </div>

             

               <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1"> Phone No</div>

               <div class="edit_data_table_col2"><input placeholder="phone" type="text" class="input_field required"  value="" name="phone" id="phone"></div>

             

             

             </div>

             

             

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1"> Description</div>

               <div class="edit_data_table_col2"><textarea name="desc" id="desc" rows="10" cols="25" placeholder="description"></textarea></div>

             

             

             </div>

             

                 <div class="edit_data_table_row">

             

               <div ></div>

               <div class="edit_data_table_coln"><a id="submit_form"><img src="assets/images/submitBtn.png"></a></div>

             

             

             </div>

               

       

       

       </div><!--edit_data_table-->

    

    

    

    </td>

  </tr>

</tbody></table>





</form>

















<?php

                                         $module = $this->uri->segment(2);	



					 $access = $this->uri->segment(5);

                                         $gal_module=$this->session->userdata('gal_module');

                                         $this->session->unset_userdata('gal_module');

					 if($access=='access'){

					 $this->session->set_userdata(array('access' => '1','usr_level' => '2','site_id' => '1'));

					 }

                                         

                                         $uid_level=$this->session->userdata('usr_level');

					 $admin_access=$this->session->userdata('access');

                                         

?>

<div id="wrapper">



<!--header-->

 <div id="header">

   <!--header_wrap-->

    <div id="header_wrap">

    

     <div class="header_blue_line"></div>

    

      <div class="header_shadow"></div>

    

    </div><!--header_wrap-->

    </div><!--header-->





		<!--content-->

        <div id="content">

        <!--middle_body_wrap-->

        <div class="middle_body_wrap">

               

               

               

               <div class="content_row">

               

                 <div class="logo_wrap"><img src="assets/images/logo_backend.png" width="153" height="69" /></div> 

                 

                 <div class="cms_icon"><img src="assets/images/cms.png" width="70" height="41" /></div>

                 

                 </div>

               

               

               

                 

                   <div class="content_rowinner">

                   

                   

                           <!--user_nav_wrap-->

                           <div class="user_nav_wrap">

                           

                           <div class="menu">

                            <ul>

                            <li> <span class="user_name">Hi, <?php echo $this->session->userdata('usr_uname');?></span></li>

                             <li>|</li>

                              <li><a href="ems/dashboard/manage">Dashboard</a></li>

                              <li>|</li>

                               <li ><a href="ems/admin_login/logout"><span class="blue_small">Logout</span></a></li>

                            </ul>

                            </div>

                           </div><!--user_nav_wrap-->

                   

                   </div>

        <?php if($template == 'contactus' || true){ ?>

			<script type="text/javascript">

				

			function forma(){

			$("#overlay_map").fadeIn(1000);

			$("#overlay_map").css("visibility","visible");

			positionPopup();



			}



			$(document).ready(function() {



			$("#closemap").click(function(){

			$("#overlay_map").fadeOut(500);

			});

			});

			//position the popup at the center of the page

			function positionPopup(){

			if(!$("#overlay_map").is(':visible')){

			return;

			}

			$("#overlay_map").css({

			//left: 500,

			//top: ($(window).height() - $('#overlay_map').height()) / 2,

			height:420,

			width:420,

			position:'absolute'

			});

			}

			 

			//maintain the popup at center of the page when browser resized

			$(window).bind('resize',positionPopup);

			 $("#overlay_map").focus();

			 

			 

			 

			</script>

			<?php echo $map['js']; ?>

			<form id="overlay_map"  name="overlay_map"  style=" visibility: hidden; z-index:1; position: absolute; left: 50%; margin:0 0 0 -210px" method="post" action="ems/dashboard/contact" >

			<table width="420px"  border="0" class="edit_table">

				  <tbody>

				   <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php  echo $msg?> </font></td></tr>

				  <tr class="blue_row">

					<td width="2%">&nbsp;</td>

					<td width="98%">Location</td><div class="forgot_button"><a id="closemap"><img src="assets/images/close.png"></a></div>

				  </tr>

				  <tr class="gray_row">

					<td>&nbsp;</td>

					<td>

				  <!--edit_data_table-->

				   <div class="edit_data_table">

				   

				  <?php echo $map['html']; ?>

				   

				   

				   </div><!--edit_data_table-->

				   

				</td>

			  </tr>

			</tbody></table>





			</form>



			<?php } ?>

       

		{content}

        

        <?php

		

	//echo $gal_module;

		/*print_r($this->session->userdata); */

		  /*$site_id=$this->session->userdata();*/

		

	    $url=$this->uri->segment(3);

		

			

	   if ( $url == '' && $module == 'dashboard'){?> 

         <!--side_left-->

        <?php }else{?>             

             <div class="side_left">

                               

                                

                                 

                                   <!--search_bar_panel-->

                                   <div class="search_bar_panel">

                                   

                                    <div class="left_men">



                                     <ul>

                                         <li <?php if($module=='dashboard'){?> class="selective"<?php }?>><a href="ems/dashboard/manage" >Dashboard</a></li>                                        

                                        <?php 

                                        $modules_data = get_modules_list();

                                        $mod_counter=1;

                                        $content_id = $this->uri->segment(4);

                                        $content_controller = $module.'/manage/'.$content_id;

                                       

                                         foreach($modules_data as $val){

                                            $module_id = $val['id'];

                                            $controller_name = $val['controller_name'];

                                            $module_title = $val['sec_title'];

                                            

                                            ////// fetch parent of current node //////

                                            $get_child_row = get_section_row('controller_name',$module);

                                        



                                            $parent_id = $get_child_row->parent;

                                            $get_parent_row = get_section_row('id',$parent_id);

                                            $parent_controller = $get_parent_row->controller_name;

                                            //echo $gal_module;

                                            //////// checking menu permissions ////////

                                            if(get_menu_permission($module_id) || $uid_level==2)

                                            {

												 

												if($controller_name != 'list_content'){

                                            ?>

                                            <li <?php if($module== $controller_name OR $controller_name == $parent_controller OR $controller_name==$content_controller){?> class="selective"<?php }?>><a href="ems/<?php echo $controller_name;?>"><?php echo $module_title;?></a></li>

                                            <?php

                                            }

											}

                                        $mod_counter++;

                                        }// foreach ends		  

                                        ?>                                         

                                      

                                     </ul>

                                    

                                    </div>

                                   

                                   </div><!--search_bar_panel-->

                              

                               

                               

                               </div>

                              <?php } ?>

             </div><!--gray_panel-->

        

                

        </div><!--middle_body_wrap-->

      

         </div>

         <!--content-->

         





</body>

</html>



<script language="javascript">

function link(va){



       if(va==1){

            var id='<?php echo  $id?>';

            window.location.href='ems/gallery/edit/id/'+id;

        }else if(va==2){

             var id='<?php echo  $id?>';

            window.location.href='ems/gallery/gal_thumb/id/'+id;

        }else{

             var id='<?php echo  $id?>';

             window.location.href='ems/gallery/gal_detail/id/'+id;

        

        }

          

}

</script>



<script language="javascript"> 

$().ready(function() {

	// validate the comment form when it is submitted

	$('#submit').click(function(e) {

  e.preventDefault();

  

    $("#site_form").submit(); 

	$("#siteup_form").submit(); 

  }); 

    $("#site_form").validate();

    $("#siteup_form").validate();

});



function get_help(){

	src='http://www.google.com';

$.modal('<iframe src="' + src + '" height="450" width="830" style="border:0">', {

    closeHTML:"",

    containerCss:{

        backgroundColor:"#fff",

        borderColor:"#fff",

        height:450,

        padding:0,

        width:830

    },

    overlayClose:true

});



}

function alert_user(){

	

$.msgBox({

    title: "Alert",

    content: "You do not have rights!!!",

	showButtons: true,

	type: "info",

	opacity:0.6,

	autoClose:false,

   

});	

	

}



$(document).ready(function(){



	

     $("#select_all1").click(function(){

      var checked_status = this.checked;

      $("input[id='select']").each(function(){

        this.checked = checked_status;

      });

	  

    });

	

	 $("#select_all2").click(function(){

      var checked_status = this.checked;

      $("input[id='select2']").each(function(){

        this.checked = checked_status;

      });

	  

    });

	

	 $("#select_all3").click(function(){

      var checked_status = this.checked;

      $("input[id='select3']").each(function(){

        this.checked = checked_status;

      });

	  

    });

	 $("#select_all4").click(function(){

      var checked_status = this.checked;

      $("input[id='select4']").each(function(){

        this.checked = checked_status;

      });

	  

    });

	 $("#select_all5").click(function(){

      var checked_status = this.checked;

      $("input[id='select5']").each(function(){

        this.checked = checked_status;

      });

	  

    });

	 $("#select_all6").click(function(){

      var checked_status = this.checked;

      $("input[id='select6']").each(function(){

        this.checked = checked_status;

      });

	  

    });

	  

	

  });

  

  function pub_status(vals){

            //alert(vals);

	  $("#pub_val").val(vals);

  }

  

  function randomPassword() {

  var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$_+?%^&)";

  var size = 10;

  var i = 1;

  var ret = ""

  while ( i <= size ) {

   $max = chars.length-1;

   $num = Math.floor(Math.random()*$max);

   $temp = chars.substr($num, 1);

   ret += $temp;

   i++;

  }

   $('#usr_pass').attr('type', 'text');

   $("#usr_pass").val(ret);

 }

 

 

  function generateVoucher() {

  var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789)";

  var size = 10;

  var i = 1;

  var ret = ""

  while ( i <= size ) {

   $max = chars.length-1;

   $num = Math.floor(Math.random()*$max);

   $temp = chars.substr($num, 1);

   ret += $temp;

   i++;

  }

   $('#vouc_code').attr('type', 'text');

   $("#vouc_code").val(ret);

 }





 function hidemaster(i,vals){

	 

    var cr = site_form.elements["create_"+vals];

	var re = site_form.elements["read_"+vals];

	var up = site_form.elements["upd_"+vals];

	var de = site_form.elements["del_"+vals];

	var pu = site_form.elements["pub_"+vals];

	 



	 

	  if (cr.checked == true && re.checked==true && up.checked==true && de.checked==true && pu.checked==true)

    {

       	    $("input[name='select["+i+"]']").prop('checked', true);

			$("input[name='select["+i+"]']").css("opacity","");

    }

    else

    {              

	               $("input[name='select["+i+"]']").prop('checked', true); 

		     	   $("input[name='select["+i+"]']").fadeTo('slow', 0.5);

           	

	}

	

   

 }

 



	

 </script>

<script>



<?php 

 $id  = $this->uri->segment(4)? $this->uri->segment(4):1;



?>

		$().ready(function(){

			var ns = $('ol.sortable').nestedSortable({

				forcePlaceholderSize: true,

				handle: 'div',

				helper:	'clone',

				items: 'li',

				opacity: .6,

				placeholder: 'placeholder',

				revert: 250,

				tabSize: 25,

				tolerance: 'pointer',

				toleranceElement: '> div',

				maxLevels: 2,

				isTree: true,

				expandOnHover: 700,

				startCollapsed: false,

				update: function () {



				var arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});

					$.post("<?php echo base_url();?>ems/menu/menu_pos_update/",

				          {sortable:arraied,id:<?php echo $id;?>},

				           function (data) { location.reload();}

						   );

				    }

				

			});

			

			$('.expandEditor').attr('title','Click to show/hide item editor');

			$('.disclose').attr('title','Click to show/hide children');

			$('.deleteMenu').attr('title', 'Click to delete item.');

		

			$('.disclose').on('click', function() {

				$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');

				$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');

			});

			

			$('.expandEditor, .itemTitle').click(function(){

				var id = $(this).attr('data-id');

				$('#menuEdit'+id).toggle();

				$(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');

			});

			

			$('.deleteMenu').click(function(){

				var id = $(this).attr('data-id');

				$('#menuItem_'+id).remove();

			});

			

		});			

	

	</script>