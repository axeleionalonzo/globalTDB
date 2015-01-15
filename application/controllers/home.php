<?php
class Home extends CI_Controller {

    public function index()
    {   
        $this->load->model('HomeModel');


        $limit = $config['per_page'] = 50;
        $start = $this->uri->segment(3);

        if (isset($_POST['employee'])){
            $employees=$this->HomeModel->search($_POST['employee']);
        } else {
            $employees=$this->HomeModel->get_last_ten_entries($limit, $start);
        }


        $data['employees']=$employees;
        $this->load->view('home_view', $data);
    }

    public function insert()
    {

        $this->load->model('HomeModel');
            $this->HomeModel->insert_entry();
            $this->index();
        
        
    }


    public function view($employee_id)
    {
        $this->load->model('HomeModel');
        
        $employee=$this->HomeModel->get($employee_id);

        $data['employee']=$employee;
        $this->load->view('employee/view', $data);
    }
}
?>