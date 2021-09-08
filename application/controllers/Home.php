<?php
    class Home extends CI_Controller
    {
        //CONSTRUCTOR FUNCTION
        public function __construct()
        {
            parent::__construct();
            $this->load->model('User_Model');
        }

        // LOAD THE LOGIN VIEW
        function index()
        {
            $this->load->view('Login');
        }

        //SIGN-UP
        function Sign_Up()
        {
            $data['name'] = $this->input->post('sname');
            $data['email'] = $this->input->post('semail');
            $data['password'] = md5($this->input->post('spassword'));
            $this->User_Model->New_User($data);
            $key = "added";
            $this->session->set_flashdata('msg',$key);
            return redirect('Home');
        }

        //LOG-IN FUNCTION
        function Log_in()
        {
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $this->User_Model->Login($data);
            $alldata = $this->session->userdata('alldata');
            if(!empty($alldata))
            {
                redirect ('dashboard');
            }
            else{
                return redirect('Home');
            }
        }

        //LOG-OUT FUNCTION
        function log_out()
        {
            $this->session->sess_destroy ();
            redirect('Home');
        }

        //LOADS DASHBOARD
        function dashboard($id = NULL)
        {
            $this->User_Model->refresh_dash($id);
            $this->load->view('Dashboard');
        }

        //LOADS CALENDAR
        function calender($edit_data = NULL)
        {
            $this->load->view('calender');
        }

        //ADDS TODO BY AJAX
        function addevent()
        {
            $postData = $this->input->post();
            $data = $this->User_Model->Add_New_Event($postData);
            echo json_encode($data);
        }

        //LOAD/RELODE CALENDAR
        function loadcalender($id = NULL)
        {
            $event_data = $this->User_Model->fetch_all_events($id);
            foreach($event_data->result_array() as $row)
            {
                $start_time = $row['date']. ' ' .$row['time1'];
                $end_time = $row['date']. ' ' .$row['time2'];
                $start = date('Y-m-d H:i:s', strtotime($start_time));
                $end = date('Y-m-d H:i:s', strtotime($end_time));
                $data[] = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'start' => $start,
                    'end' => $end
                );
            }
            echo json_encode($data);
        }

        //THIS WILL UPDATE DATA BY BOTH POP-UP AND BY AJAX
        function Update()
        {   
            $postData = $this->input->post();
            $data = $this->User_Model->Update_Event($postData);
            
            if(!empty($postData['priority']))
            {
                redirect ('calender');
            }       
            else{
                echo json_encode($data);    
            }
        }

        //THIS FUNCTION WILL FETCH EDIT DATA
        function edit($id = NULL)
        {
            $edit_data = $this->User_Model->fetch_edit_data($id);
            $this->session->set_flashdata('edit', $edit_data);
            redirect('calender');
        }

        //DELETE TODO
        function DeleteEvent()
        {
            $id = $this->input->post('id');
            $this->User_Model->Delete_Me($id);
            $this->User_Model->refresh_dash($id);
            $this->load->view('Dashboard');
        }

        //FETCH ALL TODOS
        function AllToDos()
        {
            $all['ToDo'] = $this->User_Model->Fetch_All_ToDo();
            $this->load->view('All_ToDos',$all);
        }

        //MANAGE WITH PDF
        function PDF()
        {
        $all['ToDo'] = $this->User_Model->Fetch_All_ToDo();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $this->load->View("pdf_view", $all);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$date.pdf", array("Attachment"=>0));
        }
    }
?>