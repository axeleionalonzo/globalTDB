<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-23019901-1']);
        _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);
      </script>
</head>
<body>
  
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo base_url();?>index.php/home" class="navbar-brand">Home</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="<?php echo base_url();?>index.php/home" id="themes">Global Tech. Design Builders, Inc</span></a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url();?>index.php/home/viewPayrollList">Payroll List</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container">
        
        <br><br><br>
        
        <?php if (form_error('pay_period')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Something went wrong while <font color=\"red\">Creating Payroll</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>

      </div>

      <div class="container">
      <!-- Tables
        ================================================== -->
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="home">
            <div class="bs-docs-section">
              <div class="row">

                <div class="col-lg-12">
                  <div class="bs-component">
                    <table class="table table-bordered table-hover ">

                      
                      <thead>
                        <tr>
                          <th><small>ID</small></th>
                          <th><small>Employee Name</small></th>
                          <th><small>No. of Days Work</small></th>
                          <th><small>Overtime Hours</small></th>
                          <th><small>Gross Pay</small></th>
                          <th><small>Uniforms</small></th>
                          <th><small>Cash Advance</small></th>
                          <th><small>Gtech (CA)</small></th>
                          <th><small>Others</small></th>
                          <th><small>CA (Special) Balance</small></th>
                          <th><small>Total Deductions</small></th>
                          <th><small>Net Pay</small></th>
                        </tr>
                      </thead>
                      
                      <tbody>

                      <?php
                          $grand_total = 0; ?>


                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <p><b>From: </b><?php echo $payroll[0]->pay_period_from;?></p>
                                <p><b>to: </b><?php echo $payroll[0]->pay_period_to;?></p>
                              </div>
                            </div>

                      <?php
                                if (count($employees_onPayroll)==0) {
                            echo "<center><h4><font color='red'>No Employee Found</font></h4></center>"; ?>
                              <?php } else {
                            echo "<center><h4><font color='red'>Payroll</font></h4></center>"; ?> <?php

                              for($i=0; $i<count($employees_onPayroll);$i++) {

                                if ($employees_onPayroll[$i]->pay_period_from==$payroll[0]->pay_period_from) {

                                ?>

                                <tr>
                                <td><?php echo $employees_onPayroll[$i]->id_num;?></td>

                                <?php
                                if (($payrolls[0]->pay_period_from==$payroll[0]->pay_period_from) || ($payrolls[0]->pay_period_to==$payroll[0]->pay_period_to)) {
                                  echo '<td><a href="#" data-toggle="modal" data-target="#';
                                  echo $employees_onPayroll[$i]->employee_on_payroll;
                                  echo '">';
                                  echo $employees_onPayroll[$i]->name;
                                  echo '</a></td>';
                                } else {
                                  echo "<td>";
                                  echo $employees_onPayroll[$i]->name;
                                  echo "</td>";
                                }

                                ?>

                                <td><?php echo $employees_onPayroll[$i]->days_worked;?></td>
                                <td><?php echo $employees_onPayroll[$i]->overtime_hours;?></td>
                                <?php 
                                $grosspay = (($employees_onPayroll[$i]->days_worked)*(($employees_onPayroll[$i]->hourly_rate)*8)) + ($employees_onPayroll[$i]->overtime_hours*$employees_onPayroll[$i]->overtime_rate)
                                ?>

                                <?php

                                      if (is_numeric($employees_onPayroll[$i]->pagibig)) { 
                                        $pagibig=$employees_onPayroll[$i]->pagibig; }
                                      else { $pagibig=0; }

                                      if (is_numeric($employees_onPayroll[$i]->sss)) { 
                                        $sss=$employees_onPayroll[$i]->sss; }
                                      else { $sss=0; }

                                      if (is_numeric($employees_onPayroll[$i]->philhealth)) { 
                                        $philhealth=$employees_onPayroll[$i]->philhealth; }
                                      else { $philhealth=0; }

                                      if (is_numeric($employees_onPayroll[$i]->insurance)) { 
                                        $insurance=$employees_onPayroll[$i]->insurance; }
                                      else { $insurance=0; }

                                      if (is_numeric($employees_onPayroll[$i]->uniforms)) { 
                                        $uniforms=$employees_onPayroll[$i]->uniforms; }
                                      else { $uniforms=0; }

                                      if (is_numeric($employees_onPayroll[$i]->cash_advance)) { 
                                        $cash_advance=$employees_onPayroll[$i]->cash_advance; }
                                      else { $cash_advance=0; }

                                      if (is_numeric($employees_onPayroll[$i]->gtech_ca)) { 
                                        $gtech_ca=$employees_onPayroll[$i]->gtech_ca; }
                                      else { $gtech_ca=0; }

                                      if (is_numeric($employees_onPayroll[$i]->others)) { 
                                        $others=$employees_onPayroll[$i]->others; }
                                      else { $others=0; }

                                      if (is_numeric($employees_onPayroll[$i]->special_balance)) { 
                                        $special_balance=$employees_onPayroll[$i]->special_balance; }
                                      else { $special_balance=0; }

                                      if ($special_balance==0) {
                                        $total_deductions = (($pagibig + $sss + $philhealth + $insurance)/4) + $uniforms + $gtech_ca + $others + $cash_advance;
                                      } else {
                                        $total_deductions = (($pagibig + $sss + $philhealth + $insurance)/4) + $uniforms + $gtech_ca + $others;
                                      }
                                      $net_pay[$i] = $grosspay - $total_deductions;

                                ?>
                                <td><?php if (is_numeric($grosspay)) 
                                          { if ($grosspay==0) {
                                            echo "";
                                            } else { ?> ₱ <?php echo number_format($grosspay, 2); 
                                              }
                                          } else { echo "N/A"; } ?></td>
                                <td><?php if (is_numeric($employees_onPayroll[$i]->uniforms)) { ?> ₱ <?php echo number_format($employees_onPayroll[$i]->uniforms, 2); } else { echo ""; } ?></td>
                                <td><?php if (is_numeric($employees_onPayroll[$i]->cash_advance)) { ?> ₱ <?php echo number_format($employees_onPayroll[$i]->cash_advance, 2); } else { echo ""; } ?></td>
                                <td><?php if (is_numeric($employees_onPayroll[$i]->gtech_ca)) { ?> ₱ <?php echo number_format($employees_onPayroll[$i]->gtech_ca, 2); } else { echo ""; } ?></td>
                                <td><?php if (is_numeric($employees_onPayroll[$i]->others)) { ?> ₱ <?php echo number_format($employees_onPayroll[$i]->others, 2); } else { echo ""; } ?></td>
                                <td><?php if (is_numeric($employees_onPayroll[$i]->special_balance)) { ?> ₱ <?php echo number_format($employees_onPayroll[$i]->special_balance, 2); } else { echo ""; } ?></td>
                                <td><?php if ($total_deductions==0) {
                                        echo "";
                                      } else {?>₱ <?php echo number_format($total_deductions, 2); 
                                        }?></td>

                                <td><?php if (is_numeric($net_pay[$i]))
                                          { if ($net_pay[$i]==0) {
                                            echo "";
                                            } else if ($net_pay[$i]<0) {
                                              ?><font color="red">₱ <?php echo number_format($net_pay[$i], 2); ?></font><?php
                                            } else {
                                              ?>₱ <?php echo number_format($net_pay[$i], 2);
                                            }
                                          } else { echo "N/A"; } ?></td>
                                <?php

                                $grand_total += $net_pay[$i];
                                 
                                  ?>
                                  <?php }
                                ?>

                          <div class="modal fade" id="<?php echo $employees_onPayroll[$i]->employee_on_payroll;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                  <div class="modal-header">
                                      <h4 class="modal-title" id="<?php echo $employees_onPayroll[$i]->employee_on_payroll;?>">Payroll Info</h4>
                                  </div>

                                    <?php echo form_open('home/updateEmployeeViapayroll');?>
                                    <input type="hidden" name="employee_on_payroll" value="<?php echo $employees_onPayroll[$i]->employee_on_payroll?>">
                                    <fieldset>
                                      <legend></legend>

                                          <div class="well well-sm">
                                            <p><center>Employee: <Strong><?php echo $employees_onPayroll[$i]->name;?></Strong></center></p>
                                            <input type="hidden" name="name" class="form-control" id="name" value="<?php echo $employees_onPayroll[$i]->name;?>">
                                          </div>

                                          <input name="contact_no" type="hidden" class="form-control" id="contact_no" value="<?php echo $employees_onPayroll[$i]->contact_no;?>">
                                          <input name="id_num" type="hidden" class="form-control" id="id_num" value="<?php echo $employees_onPayroll[$i]->id_num;?>">
                                          <input name="date_employed" type="hidden" class="form-control" id="date_employed" value="<?php echo $employees_onPayroll[$i]->date_employed;?>">
                                          <input name="date_terminated" type="hidden" class="form-control" id="date_terminated" value="<?php echo $employees_onPayroll[$i]->date_terminated;?>">
                                          <input name="address" type="hidden" class="form-control" id="address" value="<?php echo $employees_onPayroll[$i]->address;?>">

                                          <input name="hourly_rate" type="hidden" class="form-control" id="hourly_rate" value="<?php echo $employees_onPayroll[$i]->hourly_rate;?>">
                                          <input name="overtime_rate" type="hidden" class="form-control" id="overtime_rate" value="<?php echo $employees_onPayroll[$i]->overtime_rate;?>">

                                          <div class="form-group">
                                            <label for="days_worked" class="col-lg-3 control-label"><font color="red">Days Worked</font></label>
                                            <div class="col-lg-9">
                                              <input name="days_worked" type="text" class="form-control" id="days_worked" value="<?php echo $employees_onPayroll[$i]->days_worked;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('days_worked');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="overtime_hours" class="col-lg-3 control-label"><font color="red">Overtime Hours</font></label>
                                            <div class="col-lg-9">
                                              <input name="overtime_hours" type="text" class="form-control" id="overtime_hours" value="<?php echo $employees_onPayroll[$i]->overtime_hours;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('overtime_hours');?></font></span>
                                            </div>
                                          </div>

                                              <input name="witholding_tax" type="hidden" class="form-control" id="witholding_tax" value="<?php echo $employees_onPayroll[$i]->witholding_tax;?>">
                                              <input name="pagibig" type="hidden" class="form-control" id="pagibig" value="<?php echo $employees_onPayroll[$i]->pagibig;?>">
                                              <input name="sss" type="hidden" class="form-control" id="sss" value="<?php echo $employees_onPayroll[$i]->sss;?>">
                                              <input name="philhealth" type="hidden" class="form-control" id="philhealth" value="<?php echo $employees_onPayroll[$i]->philhealth;?>">
                                              <input name="insurance" type="hidden" class="form-control" id="insurance" value="<?php echo $employees_onPayroll[$i]->insurance;?>">

                                          <div class="form-group">
                                            <label for="uniforms" class="col-lg-3 control-label">Uniforms</label>
                                            <div class="col-lg-9">
                                              <input name="uniforms" type="text" class="form-control" id="uniforms" value="<?php echo $employees_onPayroll[$i]->uniforms;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('uniforms');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="cash_advance" class="col-lg-3 control-label">Cash Advance</label>
                                            <div class="col-lg-9">
                                              <input name="cash_advance" type="text" class="form-control" id="cash_advance" placeholder="<?php echo $employees_onPayroll[$i]->cash_advance;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('cash_advance');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="gtech_ca" class="col-lg-3 control-label">Gtech (CA)</label>
                                            <div class="col-lg-9">
                                              <input name="gtech_ca" type="text" class="form-control" id="gtech_ca" value="<?php echo $employees_onPayroll[$i]->gtech_ca;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('gtech_ca');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="others" class="col-lg-3 control-label">Others</label>
                                            <div class="col-lg-9">
                                              <input name="others" type="text" class="form-control" id="others" value="<?php echo $employees_onPayroll[$i]->others;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('others');?></font></span>
                                            </div>
                                          </div>

                                          <?php
                                            if ($employees_onPayroll[$i]->special_balance=="") {
                                                $ca_special_balance = $employees_onPayroll[$i]->special_balance;
                                              } else {
                                                $ca_special_balance = $employees_onPayroll[$i]->special_balance - $employees_onPayroll[$i]->cash_advance;
                                              }
                                          ?>

                                          <div class="form-group">
                                            <label for="special_balance" class="col-lg-3 control-label">CA Balance</label>
                                            <div class="col-lg-9">
                                              <input name="special_balance" type="text" class="form-control" id="special_balance" value="<?php echo $ca_special_balance;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('special_balance');?></font></span>
                                            </div>
                                          </div>

                                          <input name="pagibig_no" type="hidden" class="form-control" id="pagibig_no" value="<?php echo $employees_onPayroll[$i]->pagibig_no;?>">
                                          <input name="sss_no" type="hidden" class="form-control" id="sss_no" value="<?php echo $employees_onPayroll[$i]->sss_no;?>">
                                          <input name="philhealth_no" type="hidden" class="form-control" id="philhealth_no" value="<?php echo $employees_onPayroll[$i]->philhealth_no;?>">
                                          <input name="insurance_no" type="hidden" class="form-control" id="insurance_no" value="<?php echo $employees_onPayroll[$i]->insurance_no;?>">
                                          <input name="payroll_id" type="hidden" class="form-control" id="payroll_id" value="<?php echo $payroll[0]->payroll_id;?>">
                                          <input name="pay_period_from" type="hidden" class="form-control" id="pay_period_from" value="<?php echo $employees_onPayroll[$i]->pay_period_from;?>">
                                          <input name="pay_period_to" type="hidden" class="form-control" id="pay_period_to" value="<?php echo $employees_onPayroll[$i]->pay_period_to;?>">
                                       
                                    </fieldset>
                                    <div class="modal-footer">
                                      <?php $id = $employees_onPayroll[$i]->employee_on_payroll;?>
                                      <?php $payroll_id = $payroll[0]->payroll_id;?>
                                      <a style="float: left;" href="<?php echo base_url();?>index.php/home/removeEmployee/<?php echo $id;?>/<?php echo $payroll_id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Remove this Employee from Payroll?')">Remove from Payroll</a>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>

                        <?php }
                        } ?>

                        </tr>

                      </tbody>
                    </table>
                  
                              

                      <?php echo form_open('home/updatePayroll');?>
                         <input name="payroll_id" type="hidden" class="form-control" id="payroll_id" value="<?php echo $payroll[0]->payroll_id;?>">

                            <div class="form-group">
                              <div align="right" class="col-lg-6">
                              </div>
                              <label align="right" for="grand_total" class="col-lg-3 control-label">Grand Total</label>
                              <div align="right" class="col-lg-3">
                                ₱ <?php echo number_format($grand_total, 2); ?>
                                <span class="help-block"><font color="red"><?php echo form_error("grand_total");?></font></span>
                                <input name="pay_period_from" type="hidden" class="form-control" id="pay_period_from" value="<?php echo $payroll[0]->pay_period_from;?>">
                                <input name="pay_period_to" type="hidden" class="form-control" id="pay_period_to" value="<?php echo $payroll[0]->pay_period_to;?>">
                                <input name="grand_total" type="hidden" class="form-control" id="grand_total" value="<?php echo $grand_total;?>">
                              </div>
                            </div>

                            <br><br><br>
                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <?php $id = $payroll[0]->payroll_id;?>
                                <a style="float: left;" href="<?php echo base_url();?>index.php/home/deletePayroll/<?php echo $id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Delete this Payroll?')">Delete</a>
                                <button type="submit" class="btn btn-success">Save Payroll</button>

                                <?php
                                if (($payrolls[0]->pay_period_from==$payroll[0]->pay_period_from) || ($payrolls[0]->pay_period_to==$payroll[0]->pay_period_to)) {
                                  echo '<a href="';
                                  echo base_url();
                                  echo 'index.php/home/updateEmployee" type="button" class="btn btn-danger">Add Employees</a>';
                                }
                                ?>
                                <a href="<?php echo base_url();?>index.php/home/payslip/<?php echo $id;?>" type="button" class="btn btn-info">Create Payslip</a>
                              </div>
                            </div>
                            <br><br>
                        </form>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>

             
            </div>
          </div>
        </div>

    </div>

    <!-- bootstrap -->
    <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>

      <!-- Date picker -->
      <script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
      <script type="text/javascript" src="<?php echo base_url();?>/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

      <script type="text/javascript">
        $('.form_datetime').datetimepicker({
        weekStart: 1,
        todayBtn:1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
        });
        $('.form_date').datetimepicker({
        language:'fr',
        weekStart: 1,
        todayBtn:1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
        });
        $('.form_time').datetimepicker({
        language:'fr',
        weekStart: 1,
        todayBtn:1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
        });
      </script>

</body>
</html>