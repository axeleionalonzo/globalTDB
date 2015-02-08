<!DOCTYPE html>
<html lang="en">
    <head>

      <meta charset="utf-8">
      <title>Gtech</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" />

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
              <li><a href="<?php echo base_url();?>index.php/home/viewPayrollList">Payroll</a></li>
              <li><a href="<?php echo base_url();?>index.php/home/viewReceiptList">Receipt</a></li>
              <li>
                <form action="<?php echo base_url();?>index.php/" method="post" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" name="employee" class="form-control" placeholder="Search">
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
          <p>Something went wrong while <font color=\"red\">Creating Employee</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>
        <?php if (form_error('pay_period') || form_error('id_num') ) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Something went wrong while <font color=\"red\">Creating Payroll</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>

      </div>

      <!-- separates heaven and earth
      <div class="page-header" id="banner">
      </div>
      -->

      <!-- Navbar
      ================================================== -->

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
                          <th class="col-lg-4"><small>Name</small></th>
                          <th class="col-lg-2"><small>Hourly Rate</small></th>
                          <th class="col-lg-2"><small>Overtime Rate</small></th>
                          <th class="col-lg-3"><small>Status</small></th>
                        </tr>
                      </thead>
                      
                      <tbody>

                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <a href="#" data-toggle="modal" data-target="#myModalAdd" type="button" class="btn btn-info">Add Employee</a>
                              </div>
                            </div>

                      <?php
	                        if (count($employees)==0) {
	                    echo "<center><h4><font color='red'>No Employee Found</font></h4></center>"; ?>
	                     	<?php } else {
                      echo "<center><h4><font color='red'>Employee</font></h4></center>";

	                          	for($i=0; $i<count($employees);$i++) { ?>
                              <?php if(($employees[$i]->date_terminated)=='') {
                                  echo "<tr>";
                                } else {
                                  echo "<tr class=\"danger\">";
                                } ?>

                                <td><?php echo $employees[$i]->id_num;?></td>
                                <td><div class="bs-component"><a href="<?php echo base_url();?>index.php/home/view/<?php echo $employees[$i]->employee_id;?>" data-toggle="tooltip" data-placement="top" data-original-title="Click to View Employee"><?php echo $employees[$i]->name;?></a></div></td>
                                <td><?php echo $employees[$i]->hourly_rate;?></td>
                                <td><?php echo $employees[$i]->overtime_rate;?></td>

                              <?php if(($employees[$i]->date_terminated)=='') {
                                  echo "<td>Employed</td>";
                                } else {
                                  echo "<td>Terminated</td>";
                                } ?>

          							<?php	}
          							} ?>

                        </tr>
                      </tbody>

                    </table>

                    <center><?php echo $paginate;?></center>
                    
                  </div>
                </div>

              </div>
            </div>
          </div>
          
        </div>

        <!-- Modal Add Employee-->
        <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
              </div>

            <?php echo form_open('home/insert');?>

              <fieldset>
              <legend></legend>

                <div class="well well-sm">
                  <p><center>Employee</center></p>
                </div>
                            
              <div class="form-group">
                <label for="id_num" class="col-lg-3 control-label">ID Number</label>
                <div class="col-lg-9">
                  <input name="id_num" type="text" class="form-control" id="id_num" value="00<?php echo (count($employees)+1);?>">
                  <span class="help-block"><font color="red"><?php echo form_error('id_num');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">Name</label>
                <div class="col-lg-9">
                  <input name="name" type="text" class="form-control" id="name" placeholder="Employee Name">
                  <span class="help-block"><font color="red"><?php echo form_error('name');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="contact_no" class="col-lg-3 control-label">Contact No.</label>
                <div class="col-lg-9">
                  <input name="contact_no" type="text" class="form-control" id="contact_no " placeholder="Telephone/Cellphone No.">
                  <span class="help-block"><font color="red"><?php echo form_error('contact_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="date_employed" class="col-lg-3 control-label">Date Employed</label>
                <div class="col-lg-9 controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-dd-mm">
                  <input name="date_employed" type="text" class="form-control" id="date_employed" placeholder="Click to Select Date">
                  <span class="help-block"><font color="red"><?php echo form_error('date_employed');?></font></span>
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
              </div>

              <input type="hidden" name="date_terminated" id="date_terminated" value="">

              <div class="form-group">
                <label for="address" class="col-lg-3 control-label">Address</label>
                <div class="col-lg-9">
                  <input name="address" type="text" class="form-control" id="address" placeholder="Complete Address">
                  <span class="help-block"><font color="red"><?php echo form_error('address');?></font></span>
                </div>
              </div>
                  
                  <input type="hidden" name="days_worked" id="days_worked" value="">
                  <input type="hidden" name="overtime_hours" id="overtime_hours" value="">
                  <input type="hidden" name="witholding_tax" id="witholding_tax" value="">
                  <input type="hidden" name="uniforms" id="uniforms" value="">
                  <input type="hidden" name="cash_advance" id="cash_advance" value="">
                  <input type="hidden" name="gtech_ca" id="gtech_ca" value="">
                  <input type="hidden" name="special_balance" id="special_balance" value="">
                  <input type="hidden" name="others" id="others" value="">
                  <input type="hidden" name="pay_period_from" id="pay_period_from" value="">
                  <input type="hidden" name="pay_period_to" id="pay_period_to" value="">

              <div class="form-group">
                <label for="hourly_rate" class="col-lg-3 control-label"><font color="red">Hourly Rate</font></label>
                <div class="col-lg-9">
                  <input name="hourly_rate" type="text" class="form-control" id="hourly_rate" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('hourly_rate');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="overtime_rate" class="col-lg-3 control-label"><font color="red">Overtime Rate</font></font></label>
                <div class="col-lg-9">
                  <input name="overtime_rate" type="text" class="form-control" id="overtime_rate" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('overtime_rate');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="pagibig_no" class="col-lg-3 control-label">Pag-ibig No.</label>
                <div class="col-lg-9">
                  <input name="pagibig_no" type="text" class="form-control" id="pagibig_no" placeholder="">
                  <input type="hidden" name="pagibig" id="pagibig" value="">
                  <span class="help-block"><font color="red"><?php echo form_error('pagibig_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="sss_no" class="col-lg-3 control-label">SSS No.</label>
                <div class="col-lg-9">
                  <input name="sss_no" type="text" class="form-control" id="sss_no" placeholder="">
                  <input type="hidden" name="sss" id="sss" value="">
                  <span class="help-block"><font color="red"><?php echo form_error('sss_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="philhealth_no" class="col-lg-3 control-label">Philhealth No.</label>
                <div class="col-lg-9">
                  <input name="philhealth_no" type="text" class="form-control" id="philhealth_no" placeholder="">
                  <input type="hidden" name="philhealth" id="philhealth" value="">
                  <span class="help-block"><font color="red"><?php echo form_error('philhealth_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="insurance_no" class="col-lg-3 control-label">Insurance No.</label>
                <div class="col-lg-9">
                  <input name="insurance_no" type="text" class="form-control" id="insurance_no" placeholder="">
                  <input type="hidden" name="insurance" id="insurance" value="">
                  <span class="help-block"><font color="red"><?php echo form_error('insurance_no');?></font></span>
                </div>
              </div>

              </fieldset>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
              </div>

            </form>
            </div>
          </div>
        </div>

        <!-- Modal View Report-->
        <div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

            </div>
          </div>
        </div>

        <!-- Footer with: Back to top -->
          <div class="row">
            <div class="col-lg-12">
              <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
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