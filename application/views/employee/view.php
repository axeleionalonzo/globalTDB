<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Employee Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

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
          <p>Something went wrong while <font color=\"red\">Updating Employee</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>

      </div>

      <div class="container">

      <?php echo form_open('home/update');?>
          <input type="hidden" name="employee_id" value="<?php echo $employee[0]->employee_id?>">
          <fieldset>
          <br><br><br>
          
        <center><h4><font color='red'>Employee Information</font></h4></center>

        <table class="table table-bordered">
            <tbody>
            <td>

                <div align="center"><p>Basic Information</p></div>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <td class="col-lg-3">Name:
                          </td>
                          <td class="col-lg-3"><strong><?php echo $employee[0]->name;?></strong>
                          </td>
                          <td class="col-lg-3">ID:
                          </td>
                          <td class="col-lg-3"><strong><?php echo $employee[0]->id_num;?></strong>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-lg-3">Date Employed:
                          </td>
                          <td class="col-lg-3"><strong><?php if($employee[0]->date_employed==""){echo "";}else{echo $employee[0]->date_employed;} ?></strong>
                          </td>
                          <td class="col-lg-3">Date Terminated:
                          </td>
                          <td class="col-lg-3"><strong>
                            <?php 
                              if ($employee[0]->date_terminated=='') { 
                                if($employee[0]->date_terminated==""){echo "";}else{echo $employee[0]->date_terminated;} 
                              } else { ?>
                                <font color="red"><?php if($employee[0]->date_terminated==""){echo "";}else{echo $employee[0]->date_terminated;} ?></font>
                                <?php }
                            ?></strong>
                          </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <td class="col-lg-2">Address:
                          </td>
                          <td class="col-lg-6"><strong><?php echo $employee[0]->address;?></strong>
                          </td>
                          <td class="col-lg-2">Contact No:
                          </td>
                          <td class="col-lg-2"><strong><?php echo $employee[0]->contact_no;?></strong>
                          </td>
                        </tr>
                    </tbody>
                </table>

                <div align="center"><p>Rates</p></div>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <td class="col-lg-3">Hourly Rate:
                          </td>
                          <td class="col-lg-3"><strong><?php echo $employee[0]->hourly_rate;?></strong>
                          </td>
                          <td class="col-lg-3">Overtime Rate:
                          </td>
                          <td class="col-lg-3"><strong><?php echo $employee[0]->overtime_rate;?></strong>
                          </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <td class="col-lg-3">Witholding tax:
                          </td>
                          <td class="col-lg-3"><strong>
                            <?php if (is_numeric($employee[0]->witholding_tax)) { ?> ₱<?php echo number_format($employee[0]->witholding_tax, 2); } else { echo ""; } ?></strong>
                          </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row clearfix">
                  <div class="col-md-2 column" align="right"><p>Benefit</p></div>
                  <div class="col-md-4 column" align="right"><p>Number</p></div>
                  <div class="col-md-3 column" align="right"><p>Rate</p></div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <td class="col-lg-2">Pag-ibig:
                          </td>
                          <td class="col-lg-4"><strong><?php echo $employee[0]->pagibig_no;?></strong>
                          </td>
                          <td class="col-lg-3"><strong><?php if (is_numeric($employee[0]->pagibig)) { ?> ₱<?php echo number_format($employee[0]->pagibig, 2); } else { echo ""; } ?></strong>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-lg-2">SSS:
                          </td>
                          <td class="col-lg-4"><strong><?php echo $employee[0]->sss_no;?></strong>
                          </td>
                          <td class="col-lg-3"><strong><?php if (is_numeric($employee[0]->sss)) { ?> ₱<?php echo number_format($employee[0]->sss, 2); } else { echo ""; } ?></strong>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-lg-2">Philhealth:
                          </td>
                          <td class="col-lg-4"><strong><?php echo $employee[0]->philhealth_no;?></strong>
                          </td>
                          <td class="col-lg-3"><strong><?php if (is_numeric($employee[0]->philhealth)) { ?> ₱<?php echo number_format($employee[0]->philhealth, 2); } else { echo ""; } ?></strong>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-lg-2">Insurance:
                          </td>
                          <td class="col-lg-4"><strong><?php echo $employee[0]->insurance_no;?></strong>
                          </td>
                          <td class="col-lg-3"><strong><?php if (is_numeric($employee[0]->insurance)) { ?> ₱<?php echo number_format($employee[0]->insurance, 2); } else { echo ""; } ?></strong>
                          </td>
                        </tr>
                    </tbody>
                </table>

<?php 
$work_progress = 0;
$worked[] = 0;
for ($i=0; $i < count($employees_onPayroll); $i++) { 
  if ($employees_onPayroll[$i]->id_num==$employee[0]->id_num) {
  $worked[$i] = $employees_onPayroll[$i]->days_worked;
  $work_progress += $worked[$i];
  } else {

  }
} 
  $worked_days = count($worked);

  ?>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <td>
                            <h4 id="progress-stacked">Avarage Days Worked in a Week</h4>
                            <div class="bs-component">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" style="width: <?php echo ($work_progress/$worked_days)*10;?>%"></div>
                              </div>
                            </div>
                          </td>
                        </tr>
                    </tbody>
                </table>


<?php
$date = date('M d Y');
?>
<input name="date_terminated" type="hidden" class="form-control" id="date_terminated" value="<?php echo $date;?>">
<input name="id_num" type="hidden" class="form-control" id="id_num" value="<?php echo $employee[0]->id_num;?>">
<input name="name" type="hidden" class="form-control" id="name" value="<?php echo $employee[0]->name;?>">
<input name="contact_no" type="hidden" class="form-control" id="contact_no" value="<?php echo $employee[0]->contact_no;?>">
<input name="date_employed" type="hidden" class="form-control" id="date_employed" value="<?php echo $employee[0]->date_employed;?>">
<input name="address" type="hidden" class="form-control" id="address" value="<?php echo $employee[0]->address;?>">
<input name="hourly_rate" type="hidden" class="form-control" id="hourly_rate" value="<?php echo $employee[0]->hourly_rate;?>">
<input name="overtime_rate" type="hidden" class="form-control" id="overtime_rate" value="<?php echo $employee[0]->overtime_rate;?>">
<input name="witholding_tax" type="hidden" class="form-control" id="witholding_tax" value="<?php echo $employee[0]->witholding_tax;?>">
<input name="days_worked" type="hidden" class="form-control" id="days_worked" value="<?php echo $employee[0]->days_worked;?>">
<input name="overtime_hours" type="hidden" class="form-control" id="overtime_hours" value="<?php echo $employee[0]->overtime_hours;?>">
<input name="uniforms" type="hidden" class="form-control" id="uniforms" value="<?php echo $employee[0]->uniforms;?>">
<input name="cash_advance" type="hidden" class="form-control" id="cash_advance" value="<?php echo $employee[0]->cash_advance;?>">
<input name="gtech_ca" type="hidden" class="form-control" id="gtech_ca" value="<?php echo $employee[0]->gtech_ca;?>">
<input name="others" type="hidden" class="form-control" id="others" value="<?php echo $employee[0]->others;?>">
<input name="special_balance" type="hidden" class="form-control" id="special_balance" value="<?php echo $employee[0]->special_balance;?>">
<input name="pagibig_no" type="hidden" class="form-control" id="pagibig_no" value="<?php echo $employee[0]->pagibig_no;?>">
<input name="pagibig" type="hidden" class="form-control" id="pagibig" value="<?php echo $employee[0]->pagibig;?>">
<input name="sss_no" type="hidden" class="form-control" id="sss_no" value="<?php echo $employee[0]->sss_no;?>">
<input name="sss" type="hidden" class="form-control" id="sss" value="<?php echo $employee[0]->sss;?>">
<input name="philhealth_no" type="hidden" class="form-control" id="philhealth_no" value="<?php echo $employee[0]->philhealth_no;?>">
<input name="philhealth" type="hidden" class="form-control" id="philhealth" value="<?php echo $employee[0]->philhealth;?>">
<input name="insurance_no" type="hidden" class="form-control" id="insurance_no" value="<?php echo $employee[0]->insurance_no;?>">
<input name="insurance" type="hidden" class="form-control" id="insurance" value="<?php echo $employee[0]->insurance;?>">


            </td>
            </tbody>
        </table>

    </fieldset>

    <div class="modal-footer">
      <?php $id = $employee[0]->employee_id;?>
      <a style="float: left;" href="<?php echo base_url();?>index.php/home/delete/<?php echo $id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Delete this Employee?')">Delete</a>
<?php 
if ($employee[0]->date_terminated=='') { ?>
      <button style="float: left;" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to Terminate this Employee?')">Terminate Employee</button>
      <a href="<?php echo base_url();?>index.php/home/edit/<?php echo $id;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaledit">Edit Employee</a>
<?php
}
?>
      
    </div>
</form>

</div>

    <!-- Modal Edit -->
    <div data-focus-on="input:first" class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

        </div>
      </div>
    </div>

    <!-- bootstrap -->
    <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>

</body>
</html>