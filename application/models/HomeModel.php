<?php


class HomeModel extends CI_Model {

    var $name = '';
    var $hourly_rate = '';
    var $overtime_rate = '';
    var $witholding_tax = '';
    var $pagibig_no = '';
    var $sss_no = '';
    var $philhealth_no = '';
    var $insurance_no = '';
    var $date_employed = '';
    var $date_terminated = '';
    var $special_balance = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries($limit, $start)
    {
        $this->db->order_by('id_num','asc');
        $query = $this->db->get('employee', $limit, $start);

        return $query->result();
    }

    function get_employees()
    {
        $this->db->order_by('id_num','asc');
        $query = $this->db->get('employee');

        return $query->result();
    }

    function getpayroll($limit, $start)
    {
        $this->db->order_by('payroll_id','asc');
        $query = $this->db->get('payroll', $limit, $start);

        return $query->result();
    }

    function search($employee)
    {
        $this->db->order_by('employee_id','asc');
        $sql = "SELECT * FROM employee WHERE employee_id || name || id_num || contact_no || address || hourly_rate || overtime_rate || witholding_tax || pagibig || sss || sss_no || philhealth || philhealth_no || insurance || insurance_no || date_employed || date_terminated LIKE ('%$employee%') order by employee_id";
        $query = $this->db->query($sql, array($employee));
       
        return $query->result();
    }

    function search_payroll($payroll)
    {
        $this->db->order_by('payroll_id','asc');
        $sql = "SELECT * FROM payroll WHERE payroll_id || date_prepared || pay_period LIKE ('%$payroll%') order by payroll_id";
        $query = $this->db->query($sql, array($payroll));
       
        return $query->result();
    }

    function recordsCount() {
        return $this->db->count_all('employee');
    }

    function get($employee_id){
        $sql = "SELECT * FROM employee WHERE employee_id = ?";
        $query =$this->db->query($sql, array($employee_id)); 
       
        return $query->result();
    }


    function getEmployees(){
        $query = $this->db->get('employee');

        return $query->result();
    }

    function getallrecords()
    {
        $query = $this->db->get('employee');

        return $query->result();
    }

    function update_payroll()
    {
        $this->pay_period = $_POST['pay_period'];

        $this->db->update('payroll', $this, array('payroll_id' => $_POST['payroll_id']));
    }

    function insert_entry()
    {
        $this->name = $_POST['name'];
        $this->id_num = $_POST['id_num'];
        $this->contact_no = $_POST['contact_no'];
        $this->address = $_POST['address'];
        $this->days_worked = $_POST['days_worked'];
        $this->overtime_hours = $_POST['overtime_hours'];
        $this->hourly_rate = $_POST['hourly_rate'];
        $this->overtime_rate = $_POST['overtime_rate'];
        $this->witholding_tax = $_POST['witholding_tax'];
        $this->pagibig_no = $_POST['pagibig_no'];
        $this->pagibig = $_POST['pagibig'];
        $this->sss_no = $_POST['sss_no'];
        $this->sss = $_POST['sss'];
        $this->philhealth_no = $_POST['philhealth_no'];
        $this->philhealth = $_POST['philhealth'];
        $this->insurance_no = $_POST['insurance_no'];
        $this->insurance = $_POST['insurance'];
        $this->uniforms = $_POST['uniforms'];
        $this->cash_advance = $_POST['cash_advance'];
        $this->gtech_ca = $_POST['gtech_ca'];
        $this->others = $_POST['others'];
        $this->special_balance = $_POST['special_balance'];
        $this->date_employed = $_POST['date_employed'];
        $this->date_terminated = $_POST['date_terminated'];
        
        $this->db->insert('employee', $this);
    }

    function update_entry()
    {
        $this->name = $_POST['name'];
        $this->id_num = $_POST['id_num'];
        $this->contact_no = $_POST['contact_no'];
        $this->address = $_POST['address'];
        $this->days_worked = $_POST['days_worked'];
        $this->overtime_hours = $_POST['overtime_hours'];
        $this->hourly_rate = $_POST['hourly_rate'];
        $this->overtime_rate = $_POST['overtime_rate'];
        $this->witholding_tax = $_POST['witholding_tax'];
        $this->pagibig_no = $_POST['pagibig_no'];
        $this->pagibig = $_POST['pagibig'];
        $this->sss_no = $_POST['sss_no'];
        $this->sss = $_POST['sss'];
        $this->philhealth_no = $_POST['philhealth_no'];
        $this->philhealth = $_POST['philhealth'];
        $this->insurance_no = $_POST['insurance_no'];
        $this->insurance = $_POST['insurance'];
        $this->uniforms = $_POST['uniforms'];
        $this->cash_advance = $_POST['cash_advance'];
        $this->gtech_ca = $_POST['gtech_ca'];
        $this->others = $_POST['others'];
        $this->special_balance = $_POST['special_balance'];
        $this->date_employed = $_POST['date_employed'];
        $this->date_terminated = $_POST['date_terminated'];

        $this->db->update('employee', $this, array('employee_id' => $_POST['employee_id']));
    }

    function delete_entry($employee_id)
    {
        $this->db->delete('employee', array('employee_id' => $employee_id));
    }
}
?>