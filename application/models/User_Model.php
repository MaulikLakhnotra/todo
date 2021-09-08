<?php
    class User_Model extends MY_Model
    {

        //SIGN UP DATA STORES
        function New_User($data)
        {
            $this->db->insert('Users',$data);
            return;
        }

        //CHECK LOGIN CRIATERIA
        function Login($data)
        {
            $all = $this->db->select('*')
                                ->where('email',$data['email'])
                                ->get('Users')->result();
            if(!empty($all))
            {
                if($data['password'] == $all[0]->password)
                {
                    
                    $id = $all[0]->id;
                    $this->get_todo($id);
                    $this->session->set_userdata('alldata',$all);
                    return;
                }
                else
                {
                    $key = "wrongpassword";
                    $this->session->set_flashdata('msg',$key);
                    return;
                }
            }
            else{
                $key = "wrongemail";
                $this->session->set_flashdata('msg',$key);
            }
            return;
        }

        //ADD NEW TODO
        function Add_New_Event($postData)
        {
            $data = $this->db->insert('events',$postData);
            return $data;
        }

        //DASHBOARD DATA REFRESH
        function refresh_dash($id = NULL)
        {
            if(!empty($id))
            {
                $this->get_todo($id);
                return;
            }
            else
            {
                return;
            }
        }

        //FETCH ALL TODOS
        function fetch_all_events($id)
        {
            $this->db->select('*');
            $this->db->where('userid',$id);
            return $this->db->get('events');
        }

        //UPDATE TODOS
        function Update_Event($postData)
        {
            $this->db->where('id',$postData['id']);
            $this->db->update('events',$postData);
        }

        //FETCH AND RETURNS DATA FOR EDIT POP-UP
        function fetch_edit_data($id)
        {
            $this->db->select('*');
            $this->db->where('id',$id);
            return $this->db->get('events')->result_array();
        }

        //WILL DELETE THE EXPIRED EVENT
        function Delete_Me($id)
        {
            $this->db-> where('id',$id);
		    $this->db-> delete('events');
            return;
        }

        //FETCH AND RETURN ALL TODOS
        function Fetch_All_ToDo()
        {
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            $this->db->select('events.*,users.name');
            $this->db->from('events');
            $this->db->join('users', 'users.id = events.userid');
            $this->db->where('date',$date);
            $this->db->order_by('time1');
            return $this->db->get()->result_array();
        }
    } 
?>