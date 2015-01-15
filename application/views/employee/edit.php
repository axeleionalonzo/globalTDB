<!DOCTYPE html>
<html lang="en">
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Edit Employee</h4>
</div>

    <?php echo form_open('home/update');?>
    <input type="hidden" name="employee_id" value="<?php echo $employee[0]->employee_id?>">
    <fieldset>
      <legend>
      </legend>
      
      
      <div class="form-group">
        <label for="name" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
          <input name="name" type="text" class="form-control" id="name" value="<?php echo $employee[0]->name;?>">
          <span class="help-block"><font color="red"><?php echo form_error('name');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="date_employed" class="col-lg-2 control-label">Date Employed</label>
        <div class="col-lg-10">
          <input name="date_employed" type="text" class="form-control" id="date_employed" value="<?php echo $employee[0]->date_employed;?>">
          <span class="help-block"><font color="red"><?php echo form_error('date_employed');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="date_terminated" class="col-lg-2 control-label">Date Terminated</label>
        <div class="col-lg-10">
          <input name="date_terminated" type="text" class="form-control" id="date_terminated" value="<?php echo $employee[0]->date_terminated;?>">
          <span class="help-block"><font color="red"><?php echo form_error('date_terminated');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="hourly_rate" class="col-lg-2 control-label">Hourly Rate</label>
        <div class="col-lg-10">
          <input name="hourly_rate" type="text" class="form-control" id="hourly_rate" value="<?php echo $employee[0]->hourly_rate;?>">
          <span class="help-block"><font color="red"><?php echo form_error('hourly_rate');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="overtime_rate" class="col-lg-2 control-label">Overtime Rate</label>
        <div class="col-lg-10">
          <input name="overtime_rate" type="text" class="form-control" id="overtime_rate" value="<?php echo $employee[0]->overtime_rate;?>">
          <span class="help-block"><font color="red"><?php echo form_error('overtime_rate');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="witholding_tax" class="col-lg-2 control-label">Witholding Tax</label>
        <div class="col-lg-10">
          <input name="witholding_tax" type="text" class="form-control" id="witholding_tax" value="<?php echo $employee[0]->witholding_tax;?>">
          <span class="help-block"><font color="red"><?php echo form_error('witholding_tax');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="pagibig_no" class="col-lg-2 control-label">Pag-Ibig</label>
        <div class="col-lg-10">
          <input name="pagibig_no" type="text" class="form-control" id="pagibig_no" value="<?php echo $employee[0]->pagibig_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('pagibig_no');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="sss_no" class="col-lg-2 control-label">SSS</label>
        <div class="col-lg-10">
          <input name="sss_no" type="text" class="form-control" id="sss_no" value="<?php echo $employee[0]->sss_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('sss_no');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="philhealth_no" class="col-lg-2 control-label">PhilHealth</label>
        <div class="col-lg-10">
          <input name="philhealth_no" type="text" class="form-control" id="philhealth_no" value="<?php echo $employee[0]->philhealth_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('philhealth_no');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="insurance_no" class="col-lg-2 control-label">Insurance</label>
        <div class="col-lg-10">
          <input name="insurance_no" type="text" class="form-control" id="insurance_no" value="<?php echo $employee[0]->insurance_no;?>">
          <span class="help-block"><font color="red"><?php echo form_error('insurance_no');?></font></span>
        </div>
      </div>
       
    </fieldset>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success">Save changes</button>
    </div>
</form>
</html>