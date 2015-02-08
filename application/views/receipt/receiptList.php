<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Receipt</title>
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
                <form action="<?php echo base_url();?>index.php/home/viewReceiptList" method="post" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" name="receipt" class="form-control" placeholder="Search">
                </div>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container">
        
        <br><br><br>
        
        <?php if (form_error('offered_by') || form_error('sold_to') || form_error('sold_to_date')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Something went wrong while <font color=\"red\">Creating Receipt</font>. Please try again and provide the Required Information.</p>
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
                          <th class="col-md-5 column"><small>Ordered From</small></th>
                          <th class="col-md-4 column"><small>For</small></th>
                          <th class="col-md-2 column"><small>Date</small></th>
                          <th class="col-md-1 column"><small>Total</small></th>
                        </tr>
                      </thead>
                      
                      <tbody>

                            <div class="form-group">
                              <div align="right" class="col-lg-12">
                                <a href="#" data-toggle="modal" data-target="#myModalAddReceipt" type="button" class="btn btn-info">Add Receipt</a>
                              </div>
                            </div>

                      <?php
                          if (count($receipts)==0) {
                      echo "<center><h4><font color='red'>No Receipt Found</font></h4></center>"; ?>
                        <?php } else {
                      echo "<center><h4><font color='red'>Receipt</font></h4></center>";
                              for($i=0; $i<count($receipts);$i++) { ?>
                          <tr>
                                <td><div class="bs-component"><a href="<?php echo base_url();?>index.php/home/viewReceipt/<?php echo $receipts[$i]->receipt_id;?>" data-toggle="tooltip" data-placement="top" data-original-title="Click to View Receipt"><?php echo $receipts[$i]->offered_by;?></a></div></td>
                                <td><?php echo $receipts[$i]->for_use;?></td>
                                <td><?php echo $receipts[$i]->sold_to_date;?></td>
                                <td><?php if (is_numeric($receipts[$i]->total)) { ?> ₱ <?php echo number_format($receipts[$i]->total, 2); } else { echo ""; } ?></td>
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



        <!-- Modal Add Receipt-->
        <div class="modal fade" id="myModalAddReceipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Receipt</h4>
              </div>

            <?php echo form_open('home/createReceipt');?>

              <fieldset>
              <legend></legend>

                <div class="well well-sm">
                  <p><center>Receipt</center></p>
                </div>
              
              <div class="form-group">
                <label for="sold_to_date" class="col-lg-3 control-label">Date Ordered</label>
                <div class="col-lg-9 controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-dd-mm">
                  <input name="sold_to_date" type="text" class="form-control" id="sold_to_date" placeholder="Click to Select Date">
                  <span class="help-block"><font color="red"><?php echo form_error('sold_to_date');?></font></span>
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
              </div>

              <div class="form-group">
                <label for="offered_by" class="col-lg-3 control-label">Ordered From</label>
                <div class="col-lg-9">
                  <input name="offered_by" type="text" class="form-control" id="offered_by " placeholder="Enterprise">
                  <span class="help-block"><font color="red"><?php echo form_error('offered_by');?></font></span>
                </div>
              </div> 

              <div class="form-group">
                <label for="invoice_no" class="col-lg-3 control-label">Invoce No.</label>
                <div class="col-lg-9">
                  <input name="invoice_no" type="text" class="form-control" id="invoice_no " placeholder="Receipt No">
                  <span class="help-block"><font color="red"><?php echo form_error('invoice_no');?></font></span>
                </div>
              </div>           

              <div class="form-group">
                <label for="sold_to" class="col-lg-3 control-label">Ordered by</label>
                <div class="col-lg-9">
                  <input name="sold_to" type="text" class="form-control" id="sold_to " value="Global Tech. Design Builders, Inc">
                  <span class="help-block"><font color="red"><?php echo form_error('sold_to');?></font></span>
                </div>
              </div>          

              <div class="form-group">
                <label for="address" class="col-lg-3 control-label">Address</label>
                <div class="col-lg-9">
                  <input name="address" type="text" class="form-control" id="address " value="Prk 6A Tambo Highway, Hinaplanon">
                  <span class="help-block"><font color="red"><?php echo form_error('address');?></font></span>
                </div>
              </div>         

              <div class="form-group">
                <label for="quantity" class="col-lg-3 control-label">Quantity</label>
                <div class="col-lg-9">
                  <input name="quantity" type="text" class="form-control" id="quantity " placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('quantity');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="unit" class="col-lg-3 control-label">Unit</label>
                <div class="col-lg-9">
                  <input name="unit" type="text" class="form-control" id="unit " placeholder="m/cm/pcs">
                  <span class="help-block"><font color="red"><?php echo form_error('unit');?></font></span>
                </div>
              </div>   

              <div class="form-group">
                <label for="articles" class="col-lg-3 control-label">Articles</label>
                <div class="col-lg-9">
                  <input name="articles" type="text" class="form-control" id="articles " placeholder="Description">
                  <span class="help-block"><font color="red"><?php echo form_error('articles');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="unit_price" class="col-lg-3 control-label">Unit Price</label>
                <div class="col-lg-9">
                  <input name="unit_price" type="text" class="form-control" id="unit_price " placeholder="Price per unit">
                  <span class="help-block"><font color="red"><?php echo form_error('unit_price');?></font></span>
                </div>
              </div>  

              <div class="form-group">
                <label for="amount" class="col-lg-3 control-label">Amount</label>
                <div class="col-lg-9">
                  <input name="amount" type="text" class="form-control" id="amount " placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('amount');?></font></span>
                </div>
              </div>  

              <div class="form-group">
                <label for="vat" class="col-lg-3 control-label">Vat</label>
                <div class="col-lg-9">
                  <input name="vat" type="text" class="form-control" id="vat " placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('vat');?></font></span>
                </div>
              </div>  

              <div class="form-group">
                <label for="total" class="col-lg-3 control-label">Total</label>
                <div class="col-lg-9">
                  <input name="total" type="text" class="form-control" id="total " placeholder="">
                  <span class="help-block"><font color="red"><?php echo form_error('total');?></font></span>
                </div>
              </div>  
              
              <div class="form-group">
                <label for="for_use" class="col-lg-3 control-label">For</label>
                <div class="col-lg-9">
                  <textarea name="for_use" class="form-control" rows="4" id="textArea"></textarea>
                  <span class="help-block"><font color="red"><?php echo form_error('for_use');?></font></span>
                </div>
              </div>  


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