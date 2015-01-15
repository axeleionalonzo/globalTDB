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

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries($limit, $start)
    {
        $this->db->order_by('employee_id','desc');
        $query = $this->db->get('employee', $limit, $start);

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

    function getallrecords()
    {
        $query = $this->db->get('employee');

        return $query->result();
    }

    function insert_entry()
    {
        $this->name = $_POST['name'];
        $this->hourly_rate = $_POST['hourly_rate'];
        $this->overtime_rate = $_POST['overtime_rate'];
        $this->witholding_tax = $_POST['witholding_tax'];
        $this->pagibig_no = $_POST['pagibig_no'];
        $this->sss_no = $_POST['sss_no'];
        $this->philhealth_no = $_POST['philhealth_no'];
        $this->insurance_no = $_POST['insurance_no'];
        $this->date_employed = $_POST['date_employed'];
        $this->date_terminated = $_POST['date_terminated'];
        
        $this->db->insert('employee', $this);
    }

    function update_entry()
    {
        $this->name = $_POST['name'];
        $this->hourly_rate = $_POST['hourly_rate'];
        $this->overtime_rate = $_POST['overtime_rate'];
        $this->witholding_tax = $_POST['witholding_tax'];
        $this->pagibig_no = $_POST['pagibig_no'];
        $this->sss_no = $_POST['sss_no'];
        $this->philhealth_no = $_POST['philhealth_no'];
        $this->insurance_no = $_POST['insurance_no'];
        $this->date_employed = $_POST['date_employed'];
        $this->date_terminated = $_POST['date_terminated'];

        $this->db->update('employee', $this, array('employee_id' => $_POST['employee_id']));
    }

    function delete_entry($employee_id)
    {
        $this->db->delete('report', array('employee_id' => $employee_id));
    }
}
?>