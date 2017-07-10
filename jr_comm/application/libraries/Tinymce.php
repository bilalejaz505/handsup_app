<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TinyMCE Inclusion Class
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    WYSIWUG
 * @author        WackyWebs.net - Tom Glover
 * @link        http://ellislab.com/codeigniter/user-guide/libraries/zip.html
 */

class Tinymce {
/*
* Create Head Code - this converts $mode value to TinyMCE editors
* $Mode is the mode TinyMCE runs in - Please view TinyMCE manual for more detail
* $Theme is this style of running, eg advance or basic, defult advance
* $ToolLoc is the vertical location of the toolbar, Defult = 'top'
* $ToolAligh is the Horizontal Location of the toolbar, DeFult = 'left'
* $Resizeabe - Can the Client resize it on there web page.
* use in controllers like so:
* $data ['head'] = $this->tinymce->createhead('mode','theme','toolbar loc','toolbar align','resizable')
*/
    function Createheadeng($Mode = 'textareas', $Theme = 'advanced', $ToolLoc = 'Top', $ToolAlign = 'left', $Resizable = FALSE)
    { 
    $ci     =& get_instance();
   $baseJs = $ci->config->item('base_url').'assets';
        return <<<EOF
        
        
    tinyMCE.init({
	editor_selector: "editor1",
	mode:'textareas',
    theme: "modern",

    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor "
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ],

			

		    paste_auto_cleanup_on_paste : true,
			



           });
        
EOF;

    }
	
	
	
	function Createheadarb($Mode = 'textareas', $Theme = 'advanced', $ToolLoc = 'Top', $ToolAlign = 'left', $Resizable = FALSE)
    { 
    $ci     =& get_instance();
   $baseJs = $ci->config->item('base_url').'assets';
        return <<<EOF
        
        
    tinyMCE.init({
	editor_selector: "editor2",
	mode:'textareas',
    theme: "modern",
	directionality : "rtl",
	

    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor "
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ],

			

		    paste_auto_cleanup_on_paste : true,
			



           });
        
EOF;

    }
/*
* Create Text Box
* Does not have to use variable in creation as can just return textarea, without
* $FullCode - True = Outputs full text area codein form tag! False = just the Tag no         
* Form Wrap - Defult = False
* $Methord - Post or Get - Required if FC=True - String
* $Action - Controller to Call on Submission - Required if FC=True - String - Can use 
* URL Helper
* $data ['head'] = $this->tinymce->createhead('Fullcode','Methord','Action')
*/
    function Textarea($FullCode = FALSE, $Methord = "POST", $Action = '') 
    
    {
        if ($FullCode === TRUE){        
        $mce  = "<form action=\"$Action\" method=\"$Methord\"></form>";
        $mce .= "<textarea name=\"TinyMCE\" cols=\"30\" rows=\"50\"></textarea>";
        $mce .= "<input name=\"Submit\" type=\"button\" value=\"Submit\">";
        $mce .= "</form>";
        return $mce ;// Outputs to view file - String
        }else{
        $mce  = "<textarea name=\"TinyMCE\" cols=\"30\" rows=\"50\"></textarea>";
        return $mce ;// Outputs to view file - String
        }
    }
}

?>