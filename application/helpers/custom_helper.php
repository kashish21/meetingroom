<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_video_by_videoId'))
{
    function get_video_by_videoId($video_id)
    {
    	 
        $ci=& get_instance();
	    $ci->load->database(); 
        
	    $sql = "select vid,name,embed,duration from  collection_album  where embed IN (".$video_id.")"; 
	    $query = $ci->db->query($sql);
	    $row = $query->result();
	    return $row;
        
    }  

    function get_quiz_by_quizId($quiz_id)
    {
         
        $ci=& get_instance();
        $ci->load->database(); 
        
        $sql = "select id,name,short_desc,total_question,correct_mark,correct_mark,duration from  quiz  where id IN (".$quiz_id.")"; 

        $query = $ci->db->query($sql);
        $row = $query->result();
        return $row;
        
    }  

     function get_subjective_by_subjectiveId($quiz_id)
    {
         
        $ci=& get_instance();
        $ci->load->database(); 
        
        $sql = "select id,name,short_desc,total_question,correct_mark,correct_mark,duration from  subjective_quiz  where id IN (".$quiz_id.")"; 

        $query = $ci->db->query($sql);
        $row = $query->result();
        return $row;
        
    } 


     function getCorrectOptions($question_id,$correct_option_id)
    {
         
        $ci=& get_instance();
        $ci->load->database(); 
        
        $sql = "select id,options,no_of_options From practice_quiz_options where id = ".$correct_option_id." AND  practice_question_id = ".$question_id.""; 
        $query = $ci->db->query($sql);
        $row = $query->row();
        return $row;
        
    }  

     function getAllOptions($question_id)
    {
         
        $ci=& get_instance();
        $ci->load->database(); 
        
        $sql = "select id,options,no_of_options From practice_quiz_options where practice_question_id = ".$question_id.""; 
        $query = $ci->db->query($sql);
        $row = $query->result();
        return $row;
        
    }  



    

}

