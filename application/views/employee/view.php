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

      <?php echo form_open('home/update');?>
          <input type="hidden" name="employee_id" value="<?php echo $employee[0]->employee_id?>">
          <fieldset>
          <br><br><br>
        <div class="row clearfix">
          <div class="col-md-12 column">
            <h4 class="text-center">
              <center>Employee Information</center>
            </h4>
          </div>
        </div>

        <table class="table table-bordered">
            <tbody>
            <td>

                <div class="row clearfix">
                  <div class="col-md-3 column">ID:
                  </div>
                  <div class="col-md-3 column"><?php echo $employee[0]->employee_id;?>
                  </div>
                  <div class="col-md-3 column">Date Employed:
                  </div>
                  <div class="col-md-3 column"><?php echo $employee[0]->date_employed;?>
                  </div>
                  <div class="col-md-3 column">Name:
                  </div>
                  <div class="col-md-3 column"><?php echo $employee[0]->name;?>
                  </div>
                  <div class="col-md-3 column">Date Terminated:
                  </div>
                  <div class="col-md-3 column"><?php echo $employee[0]->date_terminated;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-3 column">Address:
                  </div>
                  <div class="col-md-3 column"> asdasd
                  <!-- <?php echo $employee[0]->address;?> -->
                  </div>
                  <div class="col-md-3 column">Contact No:
                  </div>
                  <div class="col-md-3 column"> asdasd
                  <!-- <?php echo $employee[0]->contact_no;?> -->
                  </div>
                </div>

                <br>

                <div class="row clearfix">
                  <div class="col-md-6 column">Hourly Rate:
                  </div>
                  <div class="col-md-6 column"><?php echo $employee[0]->hourly_rate;?>
                  </div>
                </div>

                <br>

                <div class="row clearfix">
                  <div class="col-md-6 column">Overtime Rate:
                  </div>
                  <div class="col-md-6 column"><?php echo $employee[0]->overtime_rate;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-6 column">Witholding Tax:
                  </div>
                  <div class="col-md-6 column"><?php echo $employee[0]->witholding_tax;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-6 column">Pag-ibig:
                  </div>
                  <div class="col-md-6 column"><?php echo $employee[0]->pagibig_no;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-6 column">SSS:
                  </div>
                  <div class="col-md-6 column"><?php echo $employee[0]->sss_no;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-6 column">Philhealth:
                  </div>
                  <div class="col-md-6 column"><?php echo $employee[0]->philhealth_no;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-6 column">Insurance:
                  </div>
                  <div class="col-md-6 column"><?php echo $employee[0]->insurance_no;?>
                  </div>
                </div>

                <br><br>

            </td>
            </tbody>
        </table>

    </fieldset>

    <div class="modal-footer">
      <?php $id = $employee[0]->employee_id;?>
      <a href="<?php echo base_url();?>index.php/home/viewPayroll/<?php echo $id;?>" type="button" class="btn btn-info">Payroll</a>
      <a style="float: left;" href="<?php echo base_url();?>index.php/home/delete/<?php echo $id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Delete this Employee?')">Delete</a>
      <a href="<?php echo base_url();?>index.php/home/edit/<?php echo $id;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaledit">Edit employee</a>
      <a href="<?php echo base_url();?>index.php" type="button" class="btn btn-default">Back</a>
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