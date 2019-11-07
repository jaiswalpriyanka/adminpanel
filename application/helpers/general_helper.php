<?php 
if ( ! function_exists('alertmsg')){
   function alertmsg(){
    $ci = get_instance();
     $success_msg= $ci->session->flashdata('successmsg');
     $error_msg= $ci->session->flashdata('errorsmsg');
     $result="";
      if($success_msg){ 
           $result= '<div class="alert alert-success">'.$success_msg.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }elseif($error_msg){ 
       $result='<div class="alert alert-danger">'.$error_msg.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
         }
           return $result;
         }
      }


  if (!function_exists('encode_id')) {

    function encode_id($id) {
        $ci = get_instance();
        $id = $ci->encryption->encrypt($id );
        $id = str_replace("=", "~", $id);
        $id = str_replace("+", "_", $id);
        $id = str_replace("/", "-", $id);
        return $id;
    }

}


if (!function_exists('decode_id')) {

    function decode_id($id) {
        $ci = get_instance();
        $id = str_replace("_", "+", $id);
        $id = str_replace("~", "=", $id);
        $id = str_replace("-", "/", $id);
        $id = $ci->encryption->decrypt($id);
        return $id;
       
    }
}

if (!function_exists('upload_image'))
{
    function upload_image($filename2='' , $upload_path='', $path_of_thumb='')
    {
        $allowed =  array('jpeg','JPEG','jpg','JPG','png','PNG');
 
        $filename = $_FILES[$filename2]['name'];
 
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
        if(!in_array($ext,$allowed))
        {
            return FALSE;
        }
        else
        {
            if ($_FILES[$filename2]["error"] > 0)
            {
                return FALSE; 
            }
            else
            {
               $name = uniqid();
               if(move_uploaded_file($_FILES[$filename2]['tmp_name'],$upload_path.$name.'.'.$ext))
               return $name.'.'.$ext;
               else
               return FALSE;
            }
 
        }
    }
}



?>