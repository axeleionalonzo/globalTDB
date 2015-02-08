<?php
class Home extends CI_Controller {

    public function index()
    {   
        $this->load->model('HomeModel');

        if (isset($_POST['employee'])){
            $employees=$this->HomeModel->search($_POST['employee']);
            $data['paginate']="";
        } else {
            $config['base_url'] = 'http://localhost/globalTDB/index.php/home/index';
            $config['total_rows'] = $this->HomeModel->recordsCount();
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['next_link'] = '»';
            $config['prev_link'] = '«';

            $limit = $config['per_page'] = 100;
            $start = $this->uri->segment(3);
            $config['num_links'] = 100;
            $this->pagination->initialize($config);

            $employees=$this->HomeModel->get_last_ten_entries($limit, $start);
            $paginate=$this->pagination->create_links();
            $data['paginate']=$paginate;
        }


        $data['employees']=$employees;

        $this->load->view('home_view', $data);
    }

    public function insert()
    {
        $this->load->model('HomeModel');

        $this->form_validation->set_rules('name', 'Employee Name', 'trim|required|is_unique[employee.name]|xss_clean');
        $this->form_validation->set_rules('id_num', 'ID Number', 'trim|required|is_unique[employee.id_num]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->HomeModel->insert_entry();
            $this->index();
        }
    }

    public function insert_payroll()
    {
        $this->load->model('HomeModel');

        $this->form_validation->set_rules('pay_period', 'Pay Period', 'trim|required|is_unique[payroll.pay_period]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->view_payroll();
        } else {
            $this->HomeModel->insert_payroll_entry();
            $this->view_payroll();
        }
    }


    public function update()
    {
        $this->load->model('HomeModel');
        $employee_id = $_POST['employee_id'];

        $this->form_validation->set_rules('name', 'Employee Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_num', 'ID Number', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->view($employee_id);
        } else {
            $this->HomeModel->update_entry();
            $this->view($employee_id);
        }
    }

    public function updatePayroll()
    {
        $this->load->model('PayrollModel');

        $this->PayrollModel->update_payroll();
        $this->viewPayrollList();

    }

    public function updateReceipt()
    {
        $receipt_id = $_POST['receipt_id'];
        $this->load->model('ReceiptModel');

        $this->ReceiptModel->update_receipt();
        $this->viewReceipt($receipt_id);

    }

    public function updateEmployee()
    {
        $this->load->model('PayrollModel');

        $this->form_validation->set_rules('name', 'Employee Name', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->addEmployees();
        } else {
            $this->PayrollModel->insert_employee_Onpayroll();
            $this->addEmployees();
        }
    }

    public function updateEmployeeViapayroll()
    {
        $this->load->model('PayrollModel');
        $payroll_id = $_POST['payroll_id'];

        $this->form_validation->set_rules('name', 'Employee Name', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->viewPayroll($payroll_id);
        } else {
            $this->PayrollModel->update_employee_Onpayroll();
            $this->viewPayroll($payroll_id);
        }
    }

    public function createPayroll()
    {
        $this->load->model('PayrollModel');

        $this->form_validation->set_rules('pay_period_from', 'Pay Period From', 'trim|required|is_unique[payroll.pay_period_from]|xss_clean');
        $this->form_validation->set_rules('pay_period_to', 'Pay Period To', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->viewPayrollList();
        } else {
            $this->PayrollModel->insert_payroll();
            $this->addEmployees();
        }
    }

    public function createReceipt()
    {
        $this->load->model('ReceiptModel');

        $this->form_validation->set_rules('offered_by', 'Ordered to', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sold_to', 'Ordered by', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sold_to_date', 'Date Ordered', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->viewReceiptList();
        } else {
            $this->ReceiptModel->insert_receipt();
            $this->viewReceiptList();
        }
    }


    public function view($employee_id)
    {
        $this->load->model('HomeModel');
        $this->load->model('PayrollModel');

        $limit = $config['per_page'] = 500;
        $start = $this->uri->segment(1);
        $config['num_links'] = 100;

        $employee=$this->HomeModel->get($employee_id);
        $employees_onPayroll=$this->PayrollModel->get_employee_onPayroll($limit, $start);

        $data['employee']=$employee;
        $data['employees_onPayroll']=$employees_onPayroll;
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

    public function editReceipt($receipt_id)
    {   
        $this->load->model('ReceiptModel');

        $receipt=$this->ReceiptModel->get($receipt_id);

        $data['receipt']=$receipt;
        $this->load->view('receipt/edit_receipt', $data);
    }


    public function delete($employee_id)
    {
        $this->load->model('HomeModel');
        
        $this->HomeModel->delete_entry($employee_id);

        $this->index();  
    }

    public function deleteReceipt($receipt_id)
    {
        $this->load->model('ReceiptModel');
        
        $this->ReceiptModel->delete_entry($receipt_id);

        $this->viewReceiptList();  
    }

    public function deletePayroll($payroll_id)
    {
        $this->load->model('PayrollModel');
        
        $this->PayrollModel->delete_entry($payroll_id);

        $this->viewPayrollList();  
    }

    public function removeEmployee($employee_on_payroll, $payroll_id)
    {
        $this->load->model('PayrollModel');
        
        $this->PayrollModel->remove_employee($employee_on_payroll);

        $this->viewPayroll($payroll_id);  
    }

    public function view_payroll()
    {
        $this->load->model('HomeModel');

        if (isset($_POST['payroll'])){
            $payrolls=$this->HomeModel->search_payroll($_POST['payroll']);
            $data['paginate']="";
        } else {
            $config['base_url'] = 'http://localhost/globalTDB/index.php/home/view_payroll/index';
            $config['total_rows'] = $this->HomeModel->recordsCount();
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['next_link'] = '»';
            $config['prev_link'] = '«';

            $limit = $config['per_page'] = 50;
            $start = $this->uri->segment(3);
            $config['num_links'] = 100;
            $this->pagination->initialize($config);

            $payrolls=$this->HomeModel->get_last_ten_entries_payroll($limit, $start);
            $paginate=$this->pagination->create_links();
            $data['paginate']=$paginate;
        }


        $data['payrolls']=$payrolls;

        $this->load->view('payroll/view', $data);
    }

    public function viewPayroll($payroll_id)
    {
        $this->load->model('HomeModel');
        $this->load->model('PayrollModel');

        $limit = $config['per_page'] = 500;
        $start = $this->uri->segment(1);
        $config['num_links'] = 100;

        $employees=$this->HomeModel->get_last_ten_entries($limit, $start);
        $employees_onPayroll=$this->PayrollModel->get_employee_onPayroll($limit, $start);
        $payroll=$this->PayrollModel->getPayroll($payroll_id);
        $payrolls=$this->PayrollModel->get_last_ten_entries($limit, $start);

        $data['payrolls']=$payrolls;
        $data['employees']=$employees;
        $data['employees_onPayroll']=$employees_onPayroll;
        $data['payroll']=$payroll;
        $data['payroll_id']=$payroll_id;
        $this->load->view('payroll/add_payroll', $data);
    }

    public function viewReceipt($receipt_id)
    {
        $this->load->model('ReceiptModel');

        $receipt=$this->ReceiptModel->getReceipt($receipt_id);

        $data['receipt']=$receipt;

        $this->load->view('receipt/view_receipt', $data);
    }

    public function viewPayrollList()
    {
        $this->load->model('PayrollModel');
        $this->load->model('HomeModel');

        if (isset($_POST['payroll'])){
            $payrolls=$this->PayrollModel->search($_POST['payroll']);
            $data['paginate']="";
        } else {
            $config['base_url'] = 'http://localhost/globalTDB/index.php/home/viewPayrollList';
            $config['total_rows'] = $this->PayrollModel->recordsCount();
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['next_link'] = '»';
            $config['prev_link'] = '«';

            $limit = $config['per_page'] = 100;
            $start = $this->uri->segment(3);
            $config['num_links'] = 100;
            $this->pagination->initialize($config);

            $payrolls=$this->PayrollModel->get_last_ten_entries($limit, $start);
            $employees=$this->HomeModel->get_last_ten_entries($limit, $start);
            $paginate=$this->pagination->create_links();
            $data['employees']=$employees;
            $data['paginate']=$paginate;
        }


        $data['payrolls']=$payrolls;
        $this->load->view('payroll/payrollList', $data);
    }

    public function addEmployees()
    {
        $this->load->model('PayrollModel');
        $this->load->model('HomeModel');


        $limit = $config['per_page'] = 500;
        $start = $this->uri->segment(3);

        $payrolls=$this->PayrollModel->get_last_ten_entries($limit, $start);
        $employees_withpayroll=$this->PayrollModel->get_employee_onPayroll($limit, $start);
        $employees=$this->HomeModel->get_last_ten_entries($limit, $start);

        $data['payrolls']=$payrolls;
        $data['employees']=$employees;
        $data['employees_withpayroll']=$employees_withpayroll;
        $this->load->view('payroll/addEmployee_payroll', $data);
    }

    public function viewReceiptList()
    {
        $this->load->model('ReceiptModel');

        if (isset($_POST['receipt'])){
            $receipts=$this->ReceiptModel->search($_POST['receipt']);
            $data['paginate']="";
        } else {
            $config['base_url'] = 'http://localhost/globalTDB/index.php/home/index';
            $config['total_rows'] = $this->ReceiptModel->recordsCount();
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['next_link'] = '»';
            $config['prev_link'] = '«';

            $limit = $config['per_page'] = 50;
            $start = $this->uri->segment(3);
            $config['num_links'] = 100;
            $this->pagination->initialize($config);

            $receipts=$this->ReceiptModel->get_last_ten_entries($limit, $start);
            $paginate=$this->pagination->create_links();
            $data['paginate']=$paginate;
        }


        $data['receipts']=$receipts;
        $this->load->view('receipt/receiptList', $data);
    }

    public function payslip($payroll_id)
    {
        $this->load->model('HomeModel');
        $this->load->model('PayrollModel');

        $limit = $config['per_page'] = 500;
        $start = $this->uri->segment(1);
        $config['num_links'] = 100;

        $employees=$this->HomeModel->get_last_ten_entries($limit, $start);
        $employees_onPayroll=$this->PayrollModel->get_employee_onPayroll($limit, $start);
        $payroll=$this->PayrollModel->getPayroll($payroll_id);
        $payrolls=$this->PayrollModel->get_last_ten_entries($limit, $start);

        $data['payrolls']=$payrolls;
        $data['employees']=$employees;
        $data['employees_onPayroll']=$employees_onPayroll;
        $data['payroll']=$payroll;

        $this->load->view('payroll/payslip', $data);
    }
}
?>