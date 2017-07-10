<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');

function create_textarea($filedName, $name, $lang = 'eng', $edit=false, $id){
	
	if($lang == 'eng'){
		$class = 'class="required eng"';
	}else{
		$class = 'class="'.$lang.'"';
	}
	
	echo 
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$filedName.'</div>
		<div class="edit_data_table_col2 textareawdth"><textarea name="'.$lang.'_'.$name.'" '.$class.' rows="10" cols="55">'.($edit ? content_detail($lang.'_'.$name,$id) : '').'</textarea></div>
	</div>';
}

function create_datepicker($filedName, $name, $lang = 'eng', $edit=false, $id){
	
	if($lang == 'eng'){
		$class = 'class="datepicker input_field valid required"';
	}else{
		$class = 'class="datepicker input_field valid"';
	}
	
	echo 
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$filedName.'</div>
		<div class="edit_data_table_col2 textareawdth"><input type="text" name="'.$lang.'_'.$name.'" '.$class.' value="'.($edit ? content_detail($lang.'_'.$name,$id) : '').'" ></div>
	</div>';
}

function create_textfield($filedName, $name, $lang = 'eng', $edit=false, $id){
	
	if($lang == 'eng'){
		$class = 'class="input_field required"';
	}else{
		$class = 'class="input_field"';
	}
	
	echo 
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$filedName.'</div>
		<div class="edit_data_table_col2 textareawdth"><input type="text" name="'.$lang.'_'.$name.'" '.$class.' value="'.($edit ? content_detail($lang.'_'.$name,$id) : '').'" ></div>
	</div>';
}
function create_textfield_not_required($filedName, $name, $lang = 'eng', $edit=false, $id){
	
	if($lang == 'eng'){
		$class = 'class="input_field"';
	}else{
		$class = 'class="input_field"';
	}
	
	echo 
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$filedName.'</div>
		<div class="edit_data_table_col2 textareawdth"><input type="text" name="'.$lang.'_'.$name.'" '.$class.' value="'.($edit ? content_detail($lang.'_'.$name,$id) : '').'" ></div>
	</div>';
}

function create_videolink($filedName, $name, $lang = 'eng', $edit=false, $id){
	
	if($lang == 'eng'){
		$class = 'class="input_field required"';
	}else{
		$class = 'class="input_field"';
	}
	
	echo 
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$filedName.'</div>
		<div class="edit_data_table_col2 textareawdth"><input type="text" name="'.$lang.'_'.$name.'" '.$class.' value="'.($edit ? content_detail($lang.'_'.$name,$id) : '').'" ><p>sample:http://www.youtube.com/embed/otTx6KCEvcQ</p></div>
	</div>';
}

function create_externallink($filedName, $name, $lang = 'eng', $edit=false, $id){
	
	if($lang == 'eng'){
		$class = 'class="input_field"';
	}else{
		$class = 'class="input_field"';
	}
	
	echo 
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$filedName.'</div>
		<div class="edit_data_table_col2 textareawdth"><input type="text" name="'.$lang.'_'.$name.'" '.$class.' value="'.($edit ? content_detail($lang.'_'.$name,$id) : '').'" ><p>sample:http://careers.nesma.com/</p></div>
	</div>';
}

function create_image($fieldName, $name, $dimensions, $lang = 'eng', $edit=false, $id){
	if($edit){
		$scr = '';
		$remove = '';
		if(content_detail($lang.'_'.$name.'_mkey_hdn',$id) != ''){
			$scr = base_url().'assets/script/'.content_detail($lang.'_'.$name.'_mkey_hdn',$id);
		$remove = '<div style="width:10%;float:left;position:absolute;bottom:0px;left:112px;" id="remove_pic">
					<img src="assets/images/close.png" width="19" height="17" onclick="removeImage(\'thumbdiv_'.$lang.'_'.$name.'\')">
				</div>';	
		}
		
	}
	echo '<div id="returned_'.$lang.'_'.$name.'" style="display:none;"></div>';
	
	echo
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$fieldName.'</div>
		<div class="edit_data_table_col2">
		'.($edit ? 
			'<div class="row_data" id="thumbdiv_'.$lang.'_'.$name.'">
				<div class="user_pic_panel" id="user_pic_panel">
				   <div class="user_pic_wrap_175">
						<img src="'.$scr.'" width="112px" height="108px"><div class="pic_size">'.$dimensions.'</div>
					</div>
				</div>
				 '.$remove.'        
			</div>' : '').'
		   <button class="bg back_color" type="button" style="position: relative;left: 0px; float:left;" id="'.$lang.'_'.$name.'_btn">Upload Image</button><input type="hidden" value="'.($edit ? base_url().'assets/script/'.content_detail($lang.'_'.$name.'_mkey_hdn',$id) : '').'" id="'.$lang.'_'.$name.'_mkey_hdn" name="'.$lang.'_'.$name.'_mkey_hdn">
		  '.($edit ? '' : '<div class="pic_size" style="position:inherit; float:left; width:100%; margin-left:3px; margin-top:2px;">'.$dimensions.'</div>').'		  
		</div>
	</div>';
	
	echo
	'<script>
	$("#'.$lang.'_'.$name.'_btn").mlibready({returnto:\'#returned_'.$lang.'_'.$name.'\', maxselect:1});
	$("#returned_'.$lang.'_'.$name.'").bind("DOMSubtreeModified",function(){
			 
			var new_val = $("#returned_'.$lang.'_'.$name.'").html();
			  if( $("#thumbdiv_'.$lang.'_'.$name.'").length != 0 ) {					
	
			$( "#thumbdiv_'.$lang.'_'.$name.'" ).html("<div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\""+new_val+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">'.$dimensions.'</div></div></div><div style=\"width:10%;float:left;position:absolute;bottom:0px;left:112px;\"><img onclick=\"removeImage(\'thumbdiv_'.$lang.'_'.$name.'\')\" src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div>");
		}
						
		$("#'.$lang.'_'.$name.'_mkey_hdn").val(new_val);			   			   
		   
		});
	</script>';
}

function create_gallery($fieldName, $name, $dimensions, $lang = 'eng', $edit = false, $id){

	

	echo '<div id="returned_'.$lang.'_'.$name.'" style="display:none;"></div>';

	

	if(!$edit){

		echo

		'<div class="edit_data_table_row">

			<div class="edit_data_table_col1">'.$fieldName.'</div>           

			<div class="edit_data_table_col2">

			   <button class="bg back_color" type="button" style="position: relative;left: 0px; float:left;" id="'.$lang.'_'.$name.'_btn">Upload Images</button><input type="hidden" value="'.$lang.'_'.$name.'" id="'.$lang.'_'.$name.'" name="'.$lang.'_'.$name.'"><div class="pic_size" style="position:inherit; float:left; width:100%; margin-left:3px; margin-top:2px;">'.$dimensions.'</div>

			</div>

		</div>';

	}else{

		echo

		'<div class="edit_data_table_row">

		<div class="edit_data_table_col1">'.$fieldName.'</div>           

		<div class="edit_data_table_col2 gallery-images-eng gallery_video_block">';

		

		$photos =  content_detail($lang.'_'.$name,$id);

		$photos_array = explode(',',$photos);

		if(!empty($photos_array)){

			foreach ($photos_array as $imageData) { 

				if(!empty($imageData) || $imageData != ''){

					$image = explode('||',$imageData)[0];

					$video = explode('||',$imageData)[1];

					

					echo

					'<div class="row_data bgImg">

						<div class="user_pic_panel" id="user_pic_panel">

							<div class="user_pic_wrap_">

								<img class="img-thumbs" src="assets/script/'.$image.'" width="112px" height="108px">

								<div class="pic_size">'.$dimensions.'</div>

							</div>

						</div>

						<div class="close_button">

							<!--<img onclick="removeImage(\''.$image.'\',\'eng_img\',\''.$result->id.'\');" src="assets/images/close.png" width="19" height="17" />-->

							<img src="assets/images/close.png" width="19" height="17" />

						</div>

					</div>';

				}

			}

		}

		

		echo

		'</div></div>

			<div '.($photos=="" ? 'style=\'padding-left: 0;\'' : '').' class="upload_button whwrp"><button id="'.$lang.'_'.$name.'_btn" class="back_color" type="button" style="position: relative;left: -99px;" id="user_file">Upload Images</button><input type="hidden" value="'.$photos.'" id="'.$lang.'_'.$name.'" name="'.$lang.'_'.$name.'"></div>

			<div><font color="#FF0000">'.($error != '' ? $error : '').'</font></div>';

	}

	

	echo

	'<script>

	$("#'.$lang.'_'.$name.'_btn").mlibready({returnto:"#returned_'.$lang.'_'.$name.'", maxselect:99});

	

	var count_image_thumb = 0;

	$("#returned_'.$lang.'_'.$name.'").bind("DOMSubtreeModified",function(){

	 

	  var vaule = new Array();

	  var val = $("#'.$lang.'_'.$name.'").val();

	  var new_val = $("#returned_'.$lang.'_'.$name.'").html();

	  new_val = new_val.split(",");

	  for (i = 0; i < new_val.length; i++) { 

			text = new_val[i];

			new_text =  text.split("script/");

			vaule[i] =  new_text[1];

			if( $("#thumbdiv_'.$lang.'_'.$name.'").length != 0 ) {

				$( "#thumbdiv_'.$lang.'_'.$name.'").append( "<div class=\"row_data bgImg\"><div class=\"user_pic_panel\" id=\"user_pic_panel\"><div class=\"user_pic_wrap_\"><img class=\"img-thumbs\" src=\"assets/script/"+vaule[i]+"\" width=\"112px\" height=\"108px\"><div class=\"pic_size\">1920×1027</div></div></div><div class=\"close_button\"><img onclick=\"removeImage(\'thumbdiv_'.$lang.'_'.$name.'\')\" src=\"assets/images/close.png\" width=\"19\" height=\"17\"></div></div>" );

			}

		} 

		  new_val =  vaule.join(); 

		  

	  if(val != \'\'){

		  val = val + \',\'+  new_val ;  

		  }else{

		   val = new_val ;	  

			  }

	  

	   $("#'.$lang.'_'.$name.'").val(val);



	   count_image_thumb++;

	});

	

	$(".edit_data_table_row").on("click",".close_button img", function() {

				

		if(confirm("Are you sure to delete image? \nNote: After deleting you should need to save form!")){ 

		$(this).parents(".row_data").remove();

		  

		var imgsrcs = "";

		$(".gallery-images-eng img.img-thumbs").each(function (index, element){

			var value = $(this).attr(\'src\');

			value = value.split("script/");

			new_value = value[1];

			if(imgsrcs!="") imgsrcs += ",";

			imgsrcs += new_value;

			

		});

		$("#'.$lang.'_'.$name.'").val(imgsrcs);

		}

	});

	

	</script>';

}

function create_location($fieldName, $name, $edit = false, $id){

 echo

 '<div class="edit_data_table_row">

  <div class="edit_data_table_col1">'.$fieldName.'</div>

  <div class="edit_data_table_col5">

   <input name="'.$name.'" value="'.($edit ? content_detail($name, $id) : '').'" id="'.$name.'" type="text" class="input_field"/> 

  </div>

  <div class="edit_data_table_col3">

   <div class="maptip"><img src="assets/images/mapTip.png" width="14" height="23" border="0" alt="" onclick="forma();" />

   </div>

  </div>

 </div>';

}

/*function create_location($fieldName, $name, $edit = false, $id){
	echo
	'<div class="edit_data_table_row">
		<div class="edit_data_table_col1">'.$fieldName.'</div>
		<div class="edit_data_table_col5">
			<input name="'.$name.'" value="'.($edit ? content_detail($name, $id) : '').'" id="'.$name.'" type="text" class="input_field"/>	
		</div>
		<div class="edit_data_table_col3">
			<div class="maptip"><img src="assets/images/mapTip.png" width="14" height="23" border="0" alt="" onclick="forma();" />
			</div>
		</div>
	</div>';
}*/

?>