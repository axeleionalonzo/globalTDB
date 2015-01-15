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


    public function update()
    {
        $this->load->model('HomeModel');

        $employee_id = $_POST['employee_id'];
            $this->HomeModel->update_entry();
            $this->view($employee_id);
    }


    public function view($employee_id)
    {
        $this->load->model('HomeModel');

        $employee=$this->HomeModel->get($employee_id);

        $data['employee']=$employee;
        $this->load->view('employee/view', $data);
    }

    public function edit($employee_id)
    {   
        $this->load->model('HomeModel');

        $employee=$this->HomeModel->get($employee_id);
        $employees=$this->HomeModel->getEmployees();

        $data['employee']=$employee;
        $data['employees']=$employees;
        $this->load->view('employee/edit', $data);
    }


    public function delete($employee_id)
    {
        $this->load->model('HomeModel');
        $this->HomeModel->delete_entry($employee_id);

        $this->index();  
    }
}
?>