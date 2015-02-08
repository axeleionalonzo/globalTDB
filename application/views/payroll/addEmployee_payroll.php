<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Employees</title>
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
              <li><a href="<?php echo base_url();?>index.php/home">Employee</a>
              </li>
              <li><a href="<?php echo base_url();?>index.php/home/updateEmployee">Refresh</a>
              </li>
              <li><a href="<?php echo base_url();?>index.php/home/viewPayrollList">Payroll</a>
              </li>
              <li>
                <form action="<?php echo base_url();?>index.php/home/createPayroll" method="post" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" name="payroll" class="form-control" placeholder="Search">
                </div>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container">
        
        <br><br><br>
        
        <?php if (form_error('name')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>The selected <font color=\"red\">Employee</font> is already on the payroll.</p>
          </div></center>"; ?>
        <?php }?>

      </div>

      <div class="container">


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
                          <th class="col-lg-1"><small>ID</small></th>
                          <th class="col-lg-6"><small>Employee Name</small></th>
                          <th class="col-lg-5"><small>Status</small></th>
                        </tr>
                      </thead>
                      
                      <tbody>

                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <p><b>From: </b><?php echo $payrolls[0]->pay_period_from;?></p>
                                <p><b>to: </b><?php echo $payrolls[0]->pay_period_to;?></p>
                              </div>
                            </div>

                      <?php
                          if (count($employees)==0) {
                      echo "<center><h4><font color='red'>No Employee to add</font></h4></center>"; ?>
                        <?php } else {
                      echo "<center><h4><font color='red'>Add Employees to Payroll</font></h4></center>"; ?>


                      <?php
                              for($i=0; $i<count($employees);$i++) {

                                    for ($j=0; $j < count($employees_withpayroll); $j++) {

                                    if(($payrolls[0]->pay_period_from)==($employees_withpayroll[$j]->pay_period_from) && ($employees[$i]->id_num)==($employees_withpayroll[$j]->id_num)) {
                                      ?>
                                        <tr class="danger">
                                      <?php $show = $employees[$i]->name;
                                            $show2 = '';
                                            $show3 = '';
                                            $show4 = '';
                                            $show5 = '';
                                            $status = 'On Payroll';
                                        break;
                                      } else {
                                      ?>
                                        <tr>
                                      <?php $show = '<a href="#" data-toggle="modal" data-target="#';
                                            $show2 = $employees[$i]->employee_id;
                                            $show3 = '">';
                                            $show4 = $employees[$i]->name;
                                            $show5 = '</a>';
                                            $status = 'Not on Payroll';
                                      }
                                    }

                                    ?>

                          <?php if ($employees[$i]->date_terminated=='') { ?>

                          <td><?php echo $employees[$i]->id_num;?></td>
                          <td><?php echo $show; echo $show2; echo $show3; echo $show4; echo $show5; ?></td>
                          <td><?php echo $status;?></td>
                          
                          <?php }?>


                          <div class="modal fade" id="<?php echo $employees[$i]->employee_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                  <div class="modal-header">
                                      <h4 class="modal-title" id="<?php echo $employees[$i]->employee_id;?>">Payroll Info</h4>
                                  </div>

                                    <?php echo form_open('home/updateEmployee');?>
                                    <input type="hidden" name="employee_id" value="<?php echo $employees[$i]->employee_id?>">
                                    <fieldset>
                                      <legend></legend>

                                          <div class="well well-sm">
                                            <p><center>Employee: <Strong><?php echo $employees[$i]->name;?></Strong></center></p>
                                            <input type="hidden" name="name" class="form-control" id="name" value="<?php echo $employees[$i]->name;?>">
                                          </div>

                                          <input name="contact_no" type="hidden" class="form-control" id="contact_no" value="<?php echo $employees[$i]->contact_no;?>">
                                          <input name="id_num" type="hidden" class="form-control" id="id_num" value="<?php echo $employees[$i]->id_num;?>">
                                          <input name="date_employed" type="hidden" class="form-control" id="date_employed" value="<?php echo $employees[$i]->date_employed;?>">
                                          <input name="date_terminated" type="hidden" class="form-control" id="date_terminated" value="<?php echo $employees[$i]->date_terminated;?>">
                                          <input name="address" type="hidden" class="form-control" id="address" value="<?php echo $employees[$i]->address;?>">

                                          <input name="hourly_rate" type="hidden" class="form-control" id="hourly_rate" value="<?php echo $employees[$i]->hourly_rate;?>">
                                          <input name="overtime_rate" type="hidden" class="form-control" id="overtime_rate" value="<?php echo $employees[$i]->overtime_rate;?>">

                                          <div class="form-group">
                                            <label for="days_worked" class="col-lg-3 control-label"><font color="red">Days Worked</font></label>
                                            <div class="col-lg-9">
                                              <input name="days_worked" type="text" class="form-control" id="days_worked" placeholder="<?php echo $employees[$i]->days_worked;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('days_worked');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="overtime_hours" class="col-lg-3 control-label"><font color="red">Overtime Hours</font></label>
                                            <div class="col-lg-9">
                                              <input name="overtime_hours" type="text" class="form-control" id="overtime_hours" placeholder="<?php echo $employees[$i]->overtime_hours;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('overtime_hours');?></font></span>
                                            </div>
                                          </div>

                                              <input name="witholding_tax" type="hidden" class="form-control" id="witholding_tax" value="<?php echo $employees[$i]->witholding_tax;?>">
                                              <input name="pagibig" type="hidden" class="form-control" id="pagibig" value="<?php echo $employees[$i]->pagibig;?>">
                                              <input name="sss" type="hidden" class="form-control" id="sss" value="<?php echo $employees[$i]->sss;?>">
                                              <input name="philhealth" type="hidden" class="form-control" id="philhealth" value="<?php echo $employees[$i]->philhealth;?>">
                                              <input name="insurance" type="hidden" class="form-control" id="insurance" value="<?php echo $employees[$i]->insurance;?>">

                                          <div class="form-group">
                                            <label for="uniforms" class="col-lg-3 control-label">Uniforms</label>
                                            <div class="col-lg-9">
                                              <input name="uniforms" type="text" class="form-control" id="uniforms" placeholder="<?php echo $employees[$i]->uniforms;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('uniforms');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="cash_advance" class="col-lg-3 control-label">Cash Advance</label>
                                            <div class="col-lg-9">
                                              <input name="cash_advance" type="text" class="form-control" id="cash_advance" placeholder="<?php echo $employees[$i]->cash_advance;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('cash_advance');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="gtech_ca" class="col-lg-3 control-label">Gtech (CA)</label>
                                            <div class="col-lg-9">
                                              <input name="gtech_ca" type="text" class="form-control" id="gtech_ca" placeholder="<?php echo $employees[$i]->gtech_ca;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('gtech_ca');?></font></span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="others" class="col-lg-3 control-label">Others</label>
                                            <div class="col-lg-9">
                                              <input name="others" type="text" class="form-control" id="others" placeholder="<?php echo $employees[$i]->others;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('others');?></font></span>
                                            </div>
                                          </div>

                                          <?php
                                            if ($employees[$i]->special_balance=="") {
                                                $ca_special_balance = $employees[$i]->special_balance;
                                              } else {
                                                $ca_special_balance = $employees[$i]->special_balance - $employees[$i]->cash_advance;
                                              }
                                          ?>

                                          <div class="form-group">
                                            <label for="special_balance" class="col-lg-3 control-label">CA Balance</label>
                                            <div class="col-lg-9">
                                              <input name="special_balance" type="text" class="form-control" id="special_balance" value="<?php echo $ca_special_balance;?>">
                                              <span class="help-block"><font color="red"><?php echo form_error('special_balance');?></font></span>
                                            </div>
                                          </div>

                                          <input name="pagibig_no" type="hidden" class="form-control" id="pagibig_no" value="<?php echo $employees[$i]->pagibig_no;?>">
                                          <input name="sss_no" type="hidden" class="form-control" id="sss_no" value="<?php echo $employees[$i]->sss_no;?>">
                                          <input name="philhealth_no" type="hidden" class="form-control" id="philhealth_no" value="<?php echo $employees[$i]->philhealth_no;?>">
                                          <input name="insurance_no" type="hidden" class="form-control" id="insurance_no" value="<?php echo $employees[$i]->insurance_no;?>">
                                          <input name="pay_period_from" type="hidden" class="form-control" id="pay_period_from" value="<?php echo $payrolls[0]->pay_period_from;?>">
                                          <input name="pay_period_to" type="hidden" class="form-control" id="pay_period_to" value="<?php echo $payrolls[0]->pay_period_to;?>">
                                       
                                    </fieldset>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-success">Add to Payroll</button>
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

                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <a href="<?php echo base_url();?>index.php/home/viewPayroll/<?php echo $payrolls[0]->payroll_id;?>" type="button" class="btn btn-info">Go to Current Payroll</a>
                              </div>
                            </div>

        <!-- Footer with: Back to top -->
          <div class="row">
            <div class="col-lg-12">
              <ul class="list-unstyled">
              <center><br><li>© Gtech 2015</li></center>
              </ul>
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