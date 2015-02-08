<?php


class PayrollModel extends CI_Model {
    var $pay_period_from = '';
    var $pay_period_to = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries($limit, $start)
    {
        $this->db->order_by('payroll_id','desc');
        $query = $this->db->get('payroll', $limit, $start);

        return $query->result();
    }

    function get_employee_onPayroll($limit, $start)
    {
        $this->db->order_by('id_num','asc');
        $query = $this->db->get('employee_on_payroll', $limit, $start);

        return $query->result();
    }

    function search($payroll)
    {
        $this->db->order_by('payroll_id','asc');
        $sql = "SELECT * FROM payroll WHERE payroll_id || pay_period_to || pay_period_from || grand_total LIKE ('%$payroll%') order by payroll_id";
        $query = $this->db->query($sql, array($payroll));
       
        return $query->result();
    }

    function recordsCount() {
        return $this->db->count_all('payroll');
    }

    function recordsCount_employee_Onpayroll() {
        return $this->db->count_all('employee_on_payroll');
    }

    function insert_payroll()
    {
        $this->pay_period_from = $_POST['pay_period_from'];
        $this->pay_period_to = $_POST['pay_period_to'];
        $this->grand_total = $_POST['grand_total'];

        $this->db->insert('payroll', $this);
    }

    function insert_employee_Onpayroll()
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
        $this->pay_period_from = $_POST['pay_period_from'];
        $this->pay_period_to = $_POST['pay_period_to'];


        $this->db->insert('employee_on_payroll', $this);
    }


    function update_payroll()
    {
        $this->pay_period_from = $_POST['pay_period_from'];
        $this->pay_period_to = $_POST['pay_period_to'];
        $this->grand_total = $_POST['grand_total'];

        $this->db->update('payroll', $this, array('payroll_id' => $_POST['payroll_id']));
    }

    function update_employee_Onpayroll()
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
        $this->pay_period_from = $_POST['pay_period_from'];
        $this->pay_period_to = $_POST['pay_period_to'];

        $this->db->update('employee_on_payroll', $this, array('employee_on_payroll' => $_POST['employee_on_payroll']));
    }

    function getPayroll($payroll_id){
        $sql = "SELECT * FROM payroll WHERE payroll_id = ?";
        $query =$this->db->query($sql, array($payroll_id)); 
       
        return $query->result();
    }

    function delete_entry($payroll_id)
    {
        $this->db->delete('payroll', array('payroll_id' => $payroll_id));
    }

    function remove_employee($employee_on_payroll)
    {
        $this->db->delete('employee_on_payroll', array('employee_on_payroll' => $employee_on_payroll));
    }

}
?>