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
        
        <?php if (form_error('pay_period_from') || form_error('pay_period_to')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Something went wrong while <font color=\"red\">Creating Payroll</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>

      </div>

      <div class="container">

      <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="home">
            <div class="bs-docs-section">
              <div class="row">

                <div class="col-lg-12">
                  <div class="bs-component">
                    <table class="table table-bordered table-hover ">

                      
                      <thead>
                        <tr>
                          <th><small>From</small></th>
                          <th><small>To</small></th>
                          <th><small>Grand Total</small></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <a href="#" data-toggle="modal" data-target="#myModalAddPayroll" type="button" class="btn btn-info">Add Payroll</a>
                              </div>
                            </div>

                      <?php
                          if (count($payrolls)==0) {
                      echo "<center><h4><font color='red'>No Payroll Found</font></h4></center>"; ?>
                        <?php } else {
                      echo "<center><h4><font color='red'>Payroll</font></h4></center>";
                              for($i=0; $i<count($payrolls);$i++) { ?>
                          <tr>
                                <td><?php echo $payrolls[$i]->pay_period_from;?></td>
                                <td><?php echo $payrolls[$i]->pay_period_to;?></td>
                                <td><div class="bs-component"><a href="<?php echo base_url();?>index.php/home/viewPayroll/<?php echo $payrolls[$i]->payroll_id;?>" data-toggle="tooltip" data-placement="top" data-original-title="Click to View Payroll Details"><?php if (is_numeric($payrolls[$i]->grand_total)) { ?> ₱ <?php echo number_format($payrolls[$i]->grand_total, 2); } else { echo ""; } ?></a></div></td>
                        <?php }
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



        <!-- Modal Add payroll-->
        <div class="modal fade" id="myModalAddPayroll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add payroll</h4>
              </div>

            <?php echo form_open('home/createPayroll');?>

              <fieldset>
              <legend></legend>

                <div class="well well-sm">
                  <p><center>Payroll</center></p>
                </div>
              
              <div class="form-group">
                <label for="pay_period_from" class="col-lg-3 control-label">From</label>
                <div class="col-lg-9 controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-dd-mm">
                  <input name="pay_period_from" type="text" class="form-control" id="pay_period_from" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('pay_period_from');?></font></span>
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
              </div>


              <div class="form-group">
                <label for="pay_period_to" class="col-lg-3 control-label">To</label>
                <div class="col-lg-9 controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-dd-mm">
                  <input name="pay_period_to" type="text" class="form-control" id="pay_period_to" placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('pay_period_to');?></font></span>
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
              </div>


                  <input name="grand_total" type="hidden" class="form-control" id="grand_total" value="0">

              </fieldset>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Continue</button>
              </div>

            </form>

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