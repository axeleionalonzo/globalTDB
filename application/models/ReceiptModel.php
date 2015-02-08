<?php


class ReceiptModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries($limit, $start)
    {
        $this->db->order_by('receipt_id','desc');
        $query = $this->db->get('receipt', $limit, $start);

        return $query->result();
    }

    function search($receipt)
    {
        $this->db->order_by('receipt_id','desc');
        $sql = "SELECT * FROM receipt WHERE receipt_id || offered_by || invoice_no || sold_to || address || sold_to_date || quantity || unit || articles || unit_price || amount || vat || for_use || total LIKE ('%$receipt%') order by receipt_id";
        $query = $this->db->query($sql, array($receipt));
       
        return $query->result();
    }

    function recordsCount() {
        return $this->db->count_all('receipt');
    }

    function insert_receipt()
    {
        $this->offered_by = $_POST['offered_by'];
        $this->invoice_no = $_POST['invoice_no'];
        $this->address = $_POST['address'];
        $this->sold_to = $_POST['sold_to'];
        $this->sold_to_date = $_POST['sold_to_date'];
        $this->quantity = $_POST['quantity'];
        $this->unit = $_POST['unit'];
        $this->articles = $_POST['articles'];
        $this->unit_price = $_POST['unit_price'];
        $this->amount = $_POST['amount'];
        $this->vat = $_POST['vat'];
        $this->total = $_POST['total'];
        $this->for_use = $_POST['for_use'];

        $this->db->insert('receipt', $this);
    }


    function update_receipt()
    {
        $this->offered_by = $_POST['offered_by'];
        $this->invoice_no = $_POST['invoice_no'];
        $this->address = $_POST['address'];
        $this->sold_to = $_POST['sold_to'];
        $this->sold_to_date = $_POST['sold_to_date'];
        $this->quantity = $_POST['quantity'];
        $this->unit = $_POST['unit'];
        $this->articles = $_POST['articles'];
        $this->unit_price = $_POST['unit_price'];
        $this->amount = $_POST['amount'];
        $this->vat = $_POST['vat'];
        $this->total = $_POST['total'];
        $this->for_use = $_POST['for_use'];

        $this->db->update('receipt', $this, array('receipt_id' => $_POST['receipt_id']));
    }

    function getreceipt($receipt_id){
        $sql = "SELECT * FROM receipt WHERE receipt_id = ?";
        $query =$this->db->query($sql, array($receipt_id)); 
       
        return $query->result();
    }

    function get($receipt_id){
        $sql = "SELECT * FROM receipt WHERE receipt_id = ?";
        $query =$this->db->query($sql, array($receipt_id)); 
       
        return $query->result();
    }
    function delete_entry($receipt_id)
    {
        $this->db->delete('receipt', array('receipt_id' => $receipt_id));
    }

}
?>