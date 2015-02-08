<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>receipt Info</title>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1, maximum-scale=1">
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
                <a href="<?php echo base_url();?>index.php/home" id="tdemes">Global Tech. Design Builders, Inc</span></a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="<?php echo base_url();?>index.php/home/viewReceiptList">Receipt List</a>
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
          <p>Sometding went wrong while <font color=\"red\">Creating Receipt</font>. Please try again and provide tde Required Information.</p>
          </div></center>"; ?>
        <?php }?>

      </div>

      <div class="container">

      <?php echo form_open('home/update');?>
          <input type="hidden" name="receipt_id" value="<?php echo $receipt[0]->receipt_id?>">
          <fieldset>
          <br><br><br>
        <div class="row clearfix">
          <div class="col-md-12 column">
            <h4 class="text-center">
              <center><?php echo $receipt[0]->offered_by;?></center>
            </h4>
          </div>
        </div>

        <table class="table table-bordered">
            <tbody>
            <td>

                <div class="row clearfix">
                  <div class="col-md-2 column">Delivered To:
                  </div>
                  <div class="col-md-4 column"><strong><?php echo $receipt[0]->sold_to;?></strong>
                  </div>
                  <div class="col-md-2 column">Date:
                  </div>
                  <div class="col-md-4 column"><strong><?php echo $receipt[0]->sold_to_date;?></strong>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-2 column">Address:
                  </div>
                  <div class="col-md-10 column"><strong><?php echo $receipt[0]->address;?></strong>
                  </div>
                </div>
                
                <br>
                
                <table class="table table-bordered">
                  <tbody>
                        <tr>
                          <td>qty</td>
                          <td>Unit</td>
                          <td>Articles</td>
                          <td>Unit Price</td>
                          <td>Amount</td>
                        </tr>

                        <tr>
                          <td><strong><?php echo $receipt[0]->quantity;?></strong></td>
                          <td><strong><?php echo $receipt[0]->unit;?></strong></td>
                          <td><strong><?php echo $receipt[0]->articles;?></strong></td>
                          <td><strong><?php if (is_numeric($receipt[0]->unit_price)) { ?> ₱ <?php echo number_format($receipt[0]->unit_price, 2); } else { echo ""; } ?></strong></td>
                          <td><strong><?php if (is_numeric($receipt[0]->amount)) { ?> ₱ <?php echo number_format($receipt[0]->amount, 2); } else { echo ""; } ?></strong></td>
                        </tr>

                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Vat</td>
                          <td><strong><?php if (is_numeric($receipt[0]->vat)) { ?> ₱ <?php echo number_format($receipt[0]->vat, 2); } else { echo ""; } ?></strong></td>
                        </tr>

                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total</td>
                          <td><strong><?php if (is_numeric($receipt[0]->total)) { ?> ₱ <?php echo number_format($receipt[0]->total, 2); } else { echo ""; } ?></strong></td>
                        </tr>
                  </tbody>
                </table>


                <div class="row clearfix">
                  <div class="col-md-2 column">For:
                  </div>
                  <div class="col-md-4 column"><strong><?php echo $receipt[0]->for_use;?></strong>
                  </div>
                </div>

                <br>

            </td>
            </tbody>
        </table>

    </fieldset>

    <div class="modal-footer">
      <?php $id = $receipt[0]->receipt_id;?>
      <a style="float: left;" href="<?php echo base_url();?>index.php/home/deleteReceipt/<?php echo $id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Delete this receipt?')">Delete</a>
      <a href="<?php echo base_url();?>index.php/home/editReceipt/<?php echo $id;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaledit">Edit receipt</a>
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