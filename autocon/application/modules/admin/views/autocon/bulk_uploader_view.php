<script>
function sendFileToServer(formData,status)
{
    var uploadURL = '<?php echo site_url("admin/autocon/uploadgalleryfile");?>'; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                       // jQuery('#myModal').modal('show');
                       
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        beforeSend: function() {
            jQuery('#myModal').modal('show');
        },
        success: function(data){
            status.setProgress(100);
 
            //$("#status1").append("File upload Done<br>"); 
            var response = jQuery.parseJSON(data);
            var base_url  = '<?php echo base_url();?>';
            var target = '.multiple-uploads';
            var input  = 'gallery';

            var image_url = base_url+'uploads/gallery/'+response.name;
            var html = '<li style="margin:10px 10px 0 0;overflow:hidden">'+
                        '<input type="hidden" name="'+input+'[]" value="'+response.name+'" />'+
                        '<image src="'+image_url+'" style="height:100%"/>'+
                        '<div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>'+
                        '</li>';
            jQuery( target ).prepend(html);
            jQuery('#myModal').modal('hide');   
           // alert('end upload');
        }
    });
 
    status.setAbort(jqXHR);
}
 
var rowCount=0;
function createStatusbar(obj)
{
 
    this.setFileNameSize = function(name,size)
    {
    }
    this.setProgress = function(progress)
    {      
    }
    this.setAbort = function(jqxhr)
    {
    }
}
function handleFileUpload(files,obj)
{
   for (var i = 0; i < files.length; i++)
   {
        var fd = new FormData();
        fd.append('photoimg', files[i]);
 
        var status = new createStatusbar(obj); //Using this we can set progress.
        sendFileToServer(fd,status);
 
   }
}
$(document).ready(function()
{
var obj = $("#dragandrophandler");
obj.on('dragenter', function (e)
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e)
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e)
{
 
     $(this).css('border', '2px dotted #0B85A1');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     handleFileUpload(files,obj);
});
$(document).on('dragenter', function (e)
{
    e.stopPropagation();
    e.preventDefault();
});
$(document).on('dragover', function (e)
{
  e.stopPropagation();
  e.preventDefault();
  obj.css('border', '2px dotted #0B85A1');
});
$(document).on('drop', function (e)
{
    e.stopPropagation();
    e.preventDefault();
});
 
});
</script>