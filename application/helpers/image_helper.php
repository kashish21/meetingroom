<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// if ( ! function_exists('check_task_status'))
// {
//     function check_task_status($task_id,$userid)
//     {
    	 
//         $ci=& get_instance();
// 	    $ci->load->database(); 

// 	    $sql = "select * from  task_history  where task_id = ".$task_id." AND user_id=".$userid.""; 
// 	    $query = $ci->db->query($sql);
// 	    $row = $query->result();
// 	    return $row;
//     }   
// }

if ( ! function_exists('upload_single_image'))
{
     function upload_single_image($files,$upload_folder){
         
        $data = array();
        // If file upload form submitted
        if(!empty($files['name'])){

            $_FILES['file']['name']     = time().$files['name'];
                $_FILES['file']['type']     = $files['type'];
                $_FILES['file']['tmp_name'] = $files['tmp_name'];
                $_FILES['file']['error']     = $files['error'];
                $_FILES['file']['size']     = $files['size'];

                $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);//get extension

                if (!file_exists ($upload_folder))
                {

                        mkdir($upload_folder,0777,true);  

                }

               $uploadPath = $upload_folder;
                move_uploaded_file($_FILES['file']['tmp_name'],$uploadPath.$_FILES['file']['name']);

                return $_FILES['file']['name'];
            
           
        }

        return false;        
   
    }
 
}
