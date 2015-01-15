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
              <li class="active"><a href="#" data-toggle="modal" data-target="#myModalAdd">Add Employee</a></li>
              <li>
                <form action="<?php echo base_url();?>index.php/" method="post" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" name="report" class="form-control" placeholder="Search Anything Here">
                </div>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>


      <div class="container">

        <br><br><br>

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
                          <th><small>ID</small></th>
                          <th><small>Name</small></th>
                          <th><small>Hourly Rate</small></th>
                          <th><small>Overtime Rate</small></th>
                          <th><small>Pag-ibig No.</small></th>
                          <th><small>SSS No.</small></th>
                          <th><small>Philhealth No.</small></th>
                          <th><small>Insurance No.</small></th>
                        </tr>
                      </thead>
                      
                      <tbody>

                      <?php
	                        if (count($employees)==0) {
	                    echo "<center><h4><font color='red'>No Employee Found</font></h4></center>"; ?>
	                     	<?php } else {
	                          	for($i=0; $i<count($employees);$i++) { ?>
                        <tr>
                                <td><?php echo $employees[$i]->employee_id;?></td>
                                <td><div class="bs-component"><a href="<?php echo base_url();?>index.php/home/view/<?php echo $employees[$i]->employee_id;?>" data-toggle="tooltip" data-placement="top" data-original-title="Click to View More"><?php echo $employees[$i]->name;?></a></div></td>
                                <td><?php echo $employees[$i]->hourly_rate;?></td>
                                <td><?php echo $employees[$i]->overtime_rate;?></td>
                                <td><?php echo $employees[$i]->pagibig_no;?></td>
                                <td><?php echo $employees[$i]->sss_no;?></td>
                                <td><?php echo $employees[$i]->philhealth_no;?></td>
                                <td><?php echo $employees[$i]->insurance_no;?></td>
							<?php	}
							} ?>
                        </tr>
                      </tbody>

                    </table>

                    <center><?php echo $this->pagination->create_links(); ?></center>
                    
                  </div>
                </div>

              </div>
            </div>
          </div>
          
        </div>

        <!-- Modal Add Report-->
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
                <label for="name" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                  <input name="name" type="text" class="form-control" id="name" placeholder="Full Name">
                  <span class="help-block"><font color="red"><?php echo form_error('name');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="hourly_rate" class="col-lg-2 control-label">Hourly Rate</label>
                <div class="col-lg-10">
                  <input name="hourly_rate" type="text" class="form-control" id="hourly_rate " placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('hourly_rate');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="overtime_rate" class="col-lg-2 control-label">Overtime Rate</label>
                <div class="col-lg-10">
                  <input name="overtime_rate" type="text" class="form-control" id="overtime_rate" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('overtime_rate');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="witholding_tax" class="col-lg-2 control-label">Witholding Tax</label>
                <div class="col-lg-10">
                  <input name="witholding_tax" type="text" class="form-control" id="witholding_tax" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('witholding_tax');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="pagibig_no" class="col-lg-2 control-label">Pag-ibig No.</label>
                <div class="col-lg-10">
                  <input name="pagibig_no" type="text" class="form-control" id="pagibig_no" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('pagibig_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="sss_no" class="col-lg-2 control-label">SSS No.</label>
                <div class="col-lg-10">
                  <input name="sss_no" type="text" class="form-control" id="sss_no" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('sss_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="philhealth_no" class="col-lg-2 control-label">Philhealth No.</label>
                <div class="col-lg-10">
                  <input name="philhealth_no" type="text" class="form-control" id="philhealth_no" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('philhealth_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="insurance_no" class="col-lg-2 control-label">Insurance No.</label>
                <div class="col-lg-10">
                  <input name="insurance_no" type="text" class="form-control" id="insurance_no" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('insurance_no');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="date_employed" class="col-lg-2 control-label">Date Employed</label>
                <div class="col-lg-10">
                  <input name="date_employed" type="text" class="form-control" id="date_employed" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('date_employed');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="date_terminated" class="col-lg-2 control-label">Date Terminated</label>
                <div class="col-lg-10">
                  <input name="date_terminated" type="text" class="form-control" id="date_terminated" placeholder="" value="">
                  <span class="help-block"><font color="red"><?php echo form_error('date_terminated');?></font></span>
                </div>
              </div>

              </fieldset>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
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