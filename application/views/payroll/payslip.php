<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


    <script>
        printDivCSS = new String ('<link href="<?php echo base_url();?>css/print.css" media="all" rel="stylesheet" type="text/css" />')
        function printDiv(divId) {
            window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
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
              <li><a href="<?php echo base_url();?>index.php/home/viewPayrollList">Payroll</a>
              </li>
            </ul>
          </div>
        </div>
      </div>


      <div class="container">
        
        <br><br><br>


      </div>




      <div class="container">

      <div id="div1">
      <!-- Tables
        ================================================== -->
        <?php
        for ($i=0; $i < count($employees_onPayroll); $i++) { ?>
                      
                      <?php if ($employees_onPayroll[$i]->pay_period_from==$payroll[0]->pay_period_from) { ?>

<div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="home">
            <div class="bs-docs-section">
              <div class="column">

                <div class="col-lg-6">
                  <div class="bs-component">
                    <table class="table table-bordered table-hover ">

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
                                        $special_balance=($employees_onPayroll[$i]->special_balance)-$cash_advance; }
                                      else { $special_balance=0; }

                                      if ($special_balance==0) {
                                        $total_deductions = (($pagibig + $sss + $philhealth + $insurance)/4) + $uniforms + $gtech_ca + $others + $cash_advance;
                                      } else {
                                        $total_deductions = (($pagibig + $sss + $philhealth + $insurance)/4) + $uniforms + $gtech_ca + $others;
                                      }

                                      $net_pay[$i] = $grosspay - $total_deductions;
                                ?>

                      <tbody>
                        <tr>
                          <td><small>From<br>To</small></td>
                          <td><small><?php echo $payroll[0]->pay_period_from;?><br><?php echo $payroll[0]->pay_period_to;?></small></td>
                          <td><small>Name</small></td>
                          <td><small><?php echo $employees_onPayroll[$i]->name;?></small></td>
                          <td><small>ID</small></td>
                          <td><small><?php echo $employees_onPayroll[$i]->id_num;?></small></td>
                        </tr>

                        <tr>
                          <td><small>Hourly Rate</small></td>
                          <td><small><?php if (is_numeric($employees_onPayroll[$i]->hourly_rate)) { ?> ₱<?php echo number_format($employees_onPayroll[$i]->hourly_rate, 2); } else { echo "0"; } ?></small></td>
                          <td><small>Cash Advance</small></td>
                          <td><small><?php if (is_numeric($employees_onPayroll[$i]->cash_advance)) { ?> ₱<?php echo number_format($employees_onPayroll[$i]->cash_advance, 2); } else { echo "0"; } ?></small></td>
                          <td><small>Uniforms</small></td>
                          <td><small><?php if (is_numeric($uniforms)) 
                                          { if ($uniforms==0) {
                                            echo "0";
                                            } else { ?> ₱<?php echo number_format($uniforms, 2); ?><?php 
                                              }
                                          } else { echo "N/A"; } ?>
                          </small></td>
                        </tr>

                        <tr>
                          <td><small>Overtime Rate</small></td>
                          <td><small><?php if (is_numeric($employees_onPayroll[$i]->overtime_rate)) { ?> ₱<?php echo number_format($employees_onPayroll[$i]->overtime_rate, 2); } else { echo "0"; } ?></small></td>
                          <td><small>GTech(CA)</small></td>
                          <td><small><?php if (is_numeric($employees_onPayroll[$i]->gtech_ca)) { ?> ₱<?php echo number_format($employees_onPayroll[$i]->gtech_ca, 2); } else { echo "0"; } ?></small></td>
                          <td><small></small></td>
                          <td><small></small></td>
                        </tr>

                        <tr>
                          <td><small>Days Worked</small></td>
                          <td><small><?php if (is_numeric($employees_onPayroll[$i]->days_worked)) { ?><?php echo $employees_onPayroll[$i]->days_worked; } else { echo "0"; } ?></small></td>
                          <td><small>Others</small></td>
                          <td><small><?php if (is_numeric($employees_onPayroll[$i]->others)) { ?><?php echo $employees_onPayroll[$i]->others; } else { echo "0"; } ?></small></td>
                          <td><small></small></td>
                          <td><small></small></td>
                        </tr>

                        <tr>
                          <td><small>Overtime Hours</small></td>
                          <td><small><?php if (is_numeric($employees_onPayroll[$i]->overtime_hours)) { ?><?php echo $employees_onPayroll[$i]->overtime_hours; } else { echo "0"; } ?></small></td>
                          <td><small>CA (special) Balance</small></td>
                          <td><small><?php if (is_numeric($special_balance)) 
                                          { if ($special_balance==0) {
                                            echo "0";
                                            } else { ?> ₱<?php echo number_format($special_balance, 2); ?><?php 
                                              }
                                          } else { echo "N/A"; } ?>
                          </small></td>
                          <td><small></small></td>
                          <td><small></small></td>
                        </tr>

                        <tr>
                          <td><small>Gross Pay</small></td>
                          <td><small>₱<?php echo number_format($grosspay, 2); ?></small></td>
                          <td><small></small></td>
                          <td><small></small></td>
                          <td><small>Total Deductions</small></td>
                          <td><small>₱<?php echo number_format($total_deductions, 2); ?></small></td>
                        </tr>

                        <tr>
                          <td><small></small></td>
                          <td><small></small></td>
                          <td><small></small></td>
                          <td><small></small></td>
                          <td><small>Net Pay</small></td><td><small><?php if (is_numeric($net_pay[$i])) 
                                          { if ($net_pay[$i]==0) {
                                            echo "";
                                            } else if ($net_pay[$i]<0) {
                                              ?><font color="red">₱<?php echo number_format($net_pay[$i], 2); ?></font><?php
                                            } else {
                                              ?>₱<?php echo number_format($net_pay[$i], 2);
                                            }
                                          } else { echo "N/A"; } ?>
                          </small></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div> 
                       <?php }?>
          
        
        <?php
        }?>

      </div>
    </div>
                            <br><br><br>
                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <a type="button" class="btn btn-danger" href="javascript: printDiv('div1')">Print</a>
                                <iframe name="print_frame" width="0" height="0" frameborder="0" src="about: blank"></iframe>
                              </div>
                            </div>
                            <br><br><br>
             

    <!-- bootstrap -->
    <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>

</body>
</html>