<?php
    class MY_Model extends CI_Model
    {
        function get_todo($id)
        {
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            $todo = $this->db->select('*')
                                ->where(['userid'=>$id,'date'=>$date])
                                ->get('events')->result_array();
            $this->session->set_userdata('today',$todo);
            return;
        }
    }
?>