<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/dbcadmin.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/memento-responsive.css">

<!--Table-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/data-tables/bootstrap3/dataTables.bootstrap.css" />

<!--Gritter-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/gritter/css/jquery.gritter.css">

<!--Calendar-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/jquery-ui/jquery-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/fullcalendar/fullcalendar/fullcalendar.css"/>

<!--Rickh Text Editor-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

<!--Rickh Text Editor-->

<link href="<?php echo base_url();?>assets/admin/css/no-more-table.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/admin/css/custom-admin.css" rel="stylesheet">

<?php echo $this->session->flashdata('msg');?>
<h4>Edit <?php echo $type;?></h4>
<hr/>

<form action="<?php echo site_url('admin/autocon/updatebrandmodel');?>" method="post" id="save-brandmodel-form">
<input type="hidden" name="id" value="<?php echo $editbrandmodel->id;?>" />	
<input type="hidden" name="type" value="<?php echo $type;?>" />	
<?php if($type=='model'){?>
<label>Select brand</label>
<select name="brand" class="brand form-control brand-<?php echo $type;?>">
	<option value=""> Select a brand</option>
	<?php 
	$selbrand = (set_value('brand')!='')?set_value('brand'):$editbrandmodel->parent;
	foreach ($countries->result() as $row) {
		$sel = ($selbrand==$row->id)?'selected="selected"':'';
		echo '<option value="'.$row->id.'" '.$sel.' >'.$row->name.'</option>';
	}
	?>
</select>	
<?php echo form_error('brand');?>
<?php }?>


<label><?php echo $type;?> names :</label>
<input type="text" class="form-control" name="brandmodel" value="<?php echo $editbrandmodel->name;?>" >
<?php echo form_error('brandmodels');?>
<div class="clearfix"></div>
<input type="submit" value="Update" class="btn btn-success" style="margin-top:10px;" >
</form>


<script type="text/javascript">
	jQuery('#save-brandmodel-form').submit(function(event){
		event.preventDefault();
		var loadUrl = jQuery(this).attr('action');
		jQuery("#brandmodel-model  .modal-body").html("Updating...");
		jQuery.post(
			loadUrl,
			jQuery(this).serialize(),
			function(responseText){
				jQuery("#brandmodel-model  .modal-body").html(responseText);
			},
			"html"
		);

	});

	jQuery('.brand-city').change(function(e){
		var val = jQuery(this).val();		
		jQuery('.brand-drop').hide();
		jQuery('.brand-'+val).show();
		jQuery('.model-drop').val("");
	});

	<?php if($type=='city'){?>
	jQuery(document).ready(function(){
		var parent = jQuery('.model-drop > option:selected').attr('parent');
		if(parent!='')
			jQuery('.brand').val(parent);
	});
	<?php }?>
</script>	