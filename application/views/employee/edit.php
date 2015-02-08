<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="utf-8">
      <title>Edit Employee</title>

</head>

<body>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Edit Employee</h4>
</div>

    <?php echo form_open('home/update');?>
    <input type="hidden" name="employee_id" value="<?php echo $employee[0]->employee_id?>">
    <fieldset>
      <legend></legend>

          <input name="id_num" type="hidden" class="form-control" id="id_num" value="<?php echo $employee[0]->id_num;?>">
          
      <div class="form-group">
        <label for="name" class="col-lg-3 control-label">Name</label>
        <div class="col-lg-9">
          <input name="name" type="text" class="form-control" id="name" value="<?php echo $employee[0]->name;?>">
          <span class="help-block"><font color="red"><?php echo form_error('name');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="contact_no" class="col-lg-3 control-label">Contact No.</label>
        <div class="col-lg-9">
          <input name="contact_no" type="text" class="form-control" id="contact_no" value="<?php echo $employee[0]->contact_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('contact_no');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="date_employed" class="col-lg-3 control-label">Date Employed</label>
                <div class="col-lg-9 controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-dd-mm">
          <input name="date_employed" type="text" class="form-control" id="date_employed" value="<?php echo $employee[0]->date_employed;?>">
          <span class="help-block"><font color="red"><?php echo form_error('date_employed');?></font></span>
          <span class="add-on"><i class="icon-remove"></i></span>
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="date_terminated" class="col-lg-3 control-label">Date Terminated</label>
                <div class="col-lg-9 controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-dd-mm">
          <input name="date_terminated" type="text" class="form-control" id="date_terminated" value="<?php echo $employee[0]->date_terminated;?>">
          <span class="help-block"><font color="red"><?php echo form_error('date_terminated');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-lg-3 control-label">Address</label>
        <div class="col-lg-9">
          <input name="address" type="text" class="form-control" id="address" value="<?php echo $employee[0]->address;?>">
          <span class="help-block"><font color="red"><?php echo form_error('address');?></font></span>
          <span class="add-on"><i class="icon-remove"></i></span>
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="hourly_rate" class="col-lg-3 control-label">Hourly Rate</label>
        <div class="col-lg-9">
          <input name="hourly_rate" type="text" class="form-control" id="hourly_rate" value="<?php echo $employee[0]->hourly_rate;?>">
          <span class="help-block"><font color="red"><?php echo form_error('hourly_rate');?></font></span>
        </div>
      </div>

      <div class="form-group">
        <label for="overtime_rate" class="col-lg-3 control-label">Overtime Rate</label>
        <div class="col-lg-9">
          <input name="overtime_rate" type="text" class="form-control" id="overtime_rate" value="<?php echo $employee[0]->overtime_rate;?>">
          <span class="help-block"><font color="red"><?php echo form_error('overtime_rate');?></font></span>
        </div>
      </div>

      <div class="form-group">
        <label for="witholding_tax" class="col-lg-3 control-label">Witholding Tax</label>
        <div class="col-lg-9">
          <input name="witholding_tax" type="text" class="form-control" id="witholding_tax" value="<?php echo $employee[0]->witholding_tax;?>">
          <span class="help-block"><font color="red"><?php echo form_error('witholding_tax');?></font></span>
        </div>
      </div>

          <input name="days_worked" type="hidden" class="form-control" id="days_worked" value="<?php echo $employee[0]->days_worked;?>">
          <input name="overtime_hours" type="hidden" class="form-control" id="overtime_hours" value="<?php echo $employee[0]->overtime_hours;?>">
          <input name="uniforms" type="hidden" class="form-control" id="uniforms" value="<?php echo $employee[0]->uniforms;?>">
          <input name="cash_advance" type="hidden" class="form-control" id="cash_advance" value="<?php echo $employee[0]->cash_advance;?>">
          <input name="gtech_ca" type="hidden" class="form-control" id="gtech_ca" value="<?php echo $employee[0]->gtech_ca;?>">
          <input name="others" type="hidden" class="form-control" id="others" value="<?php echo $employee[0]->others;?>">
          <input name="special_balance" type="hidden" class="form-control" id="special_balance" value="<?php echo $employee[0]->special_balance;?>">

      <div class="form-group">
        <label for="pagibig_no" class="col-lg-3 control-label">Pag-Ibig No.</label>
        <div class="col-lg-5">
          <input name="pagibig_no" type="text" class="form-control" id="pagibig_no" value="<?php echo $employee[0]->pagibig_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('pagibig_no');?></font></span>
        </div>
        <div class="col-lg-4">
          <input name="pagibig" type="text" class="form-control" id="pagibig" value="<?php echo $employee[0]->pagibig;?>">
          <span class="help-block"><font color="red"><?php echo form_error('pagibig_no');?></font></span>
        </div>
      </div>


      <div class="form-group">
        <label for="sss_no" class="col-lg-3 control-label">SSS No.</label>
        <div class="col-lg-5">
          <input name="sss_no" type="text" class="form-control" id="sss_no" value="<?php echo $employee[0]->sss_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('sss_no');?></font></span>
        </div>
        <div class="col-lg-4">
          <input name="sss" type="text" class="form-control" id="sss" value="<?php echo $employee[0]->sss;?>">
          <span class="help-block"><font color="red"><?php echo form_error('sss_no');?></font></span>
        </div>
      </div>


      <label for="philhealth_no" class="col-lg-3 control-label">PhilHealth No.</label>
        <div class="col-lg-5">
          <input name="philhealth_no" type="text" class="form-control" id="philhealth_no" value="<?php echo $employee[0]->philhealth_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('philhealth_no');?></font></span>
        </div>
        <div class="col-lg-4">
          <input name="philhealth" type="text" class="form-control" id="philhealth" value="<?php echo $employee[0]->philhealth;?>">
          <span class="help-block"><font color="red"><?php echo form_error('philhealth_no');?></font></span>
        </div>
      </div>


      <div class="form-group">
        <label for="insurance_no" class="col-lg-3 control-label">Insurance No.</label>
        <div class="col-lg-5">
          <input name="insurance_no" type="text" class="form-control" id="insurance_no" value="<?php echo $employee[0]->insurance_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('insurance_no');?></font></span>
        </div>
        <div class="col-lg-4">
          <input name="insurance" type="text" class="form-control" id="insurance" value="<?php echo $employee[0]->insurance;?>">
          <span class="help-block"><font color="red"><?php echo form_error('insurance_no');?></font></span>
        </div>
      </div>


       
    </fieldset>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success">Save changes</button>
    </div>
</form>
      
      <!-- bootstrap -->
      <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
      <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>
</body>
</html>