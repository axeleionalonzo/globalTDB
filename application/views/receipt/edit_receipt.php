<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="utf-8">
      <title>Edit Receipt</title>

</head>

<body>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Edit Receipt</h4>
</div>

    <?php echo form_open('home/updateReceipt');?>
    <input type="hidden" name="receipt_id" value="<?php echo $receipt[0]->receipt_id?>">
    <fieldset>
      <legend></legend>

      
              <div class="form-group">
                <label for="sold_to_date" class="col-lg-3 control-label">Date Ordered</label>
                <div class="col-lg-9 controls input-append date form_date" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-dd-mm">
                  <input name="sold_to_date" type="text" class="form-control" id="sold_to_date" value="<?php echo $receipt[0]->sold_to_date;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('sold_to_date');?></font></span>
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
              </div>

              <div class="form-group">
                <label for="offered_by" class="col-lg-3 control-label">Ordered From</label>
                <div class="col-lg-9">
                  <input name="offered_by" type="text" class="form-control" id="offered_by" value="<?php echo $receipt[0]->offered_by;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('offered_by');?></font></span>
                </div>
              </div> 

              <div class="form-group">
                <label for="invoice_no" class="col-lg-3 control-label">Invoce No.</label>
                <div class="col-lg-9">
                  <input name="invoice_no" type="text" class="form-control" id="invoice_no" value="<?php echo $receipt[0]->invoice_no;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('invoice_no');?></font></span>
                </div>
              </div>           

              <div class="form-group">
                <label for="sold_to" class="col-lg-3 control-label">Ordered by</label>
                <div class="col-lg-9">
                  <input name="sold_to" type="text" class="form-control" id="sold_to" value="<?php echo $receipt[0]->sold_to;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('sold_to');?></font></span>
                </div>
              </div>          

              <div class="form-group">
                <label for="address" class="col-lg-3 control-label">Address</label>
                <div class="col-lg-9">
                  <input name="address" type="text" class="form-control" id="address" value="<?php echo $receipt[0]->address;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('address');?></font></span>
                </div>
              </div>         

              <div class="form-group">
                <label for="quantity" class="col-lg-3 control-label">Quantity</label>
                <div class="col-lg-9">
                  <input name="quantity" type="text" class="form-control" id="quantity" value="<?php echo $receipt[0]->quantity;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('quantity');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="unit" class="col-lg-3 control-label">Unit</label>
                <div class="col-lg-9">
                  <input name="unit" type="text" class="form-control" id="unit" value="<?php echo $receipt[0]->unit;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('unit');?></font></span>
                </div>
              </div>   

              <div class="form-group">
                <label for="articles" class="col-lg-3 control-label">Articles</label>
                <div class="col-lg-9">
                  <input name="articles" type="text" class="form-control" id="articles" value="<?php echo $receipt[0]->articles;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('articles');?></font></span>
                </div>
              </div>

              <div class="form-group">
                <label for="unit_price" class="col-lg-3 control-label">Unit Price</label>
                <div class="col-lg-9">
                  <input name="unit_price" type="text" class="form-control" id="unit_price" value="<?php echo $receipt[0]->unit_price;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('unit_price');?></font></span>
                </div>
              </div>  

              <div class="form-group">
                <label for="amount" class="col-lg-3 control-label">Amount</label>
                <div class="col-lg-9">
                  <input name="amount" type="text" class="form-control" id="amount" value="<?php echo $receipt[0]->amount;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('amount');?></font></span>
                </div>
              </div>  

              <div class="form-group">
                <label for="vat" class="col-lg-3 control-label">Vat</label>
                <div class="col-lg-9">
                  <input name="vat" type="text" class="form-control" id="vat" value="<?php echo $receipt[0]->vat;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('vat');?></font></span>
                </div>
              </div>  

              <div class="form-group">
                <label for="total" class="col-lg-3 control-label">Total</label>
                <div class="col-lg-9">
                  <input name="total" type="text" class="form-control" id="total" value="<?php echo $receipt[0]->total;?>">
                  <span class="help-block"><font color="red"><?php echo form_error('total');?></font></span>
                </div>
              </div>  
              
              <div class="form-group">
                <label for="for_use" class="col-lg-3 control-label">For</label>
                <div class="col-lg-9">
                  <textarea name="for_use" class="form-control" rows="4" id="textArea"><?php echo $receipt[0]->for_use;?></textarea>
                  <span class="help-block"><font color="red"><?php echo form_error('for_use');?></font></span>
                </div>
              </div>  


       
    </fieldset>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success">Save changes</button>
    </div>
</form>
      
      <!-- bootstrap -->
      <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
      <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>
</body>
</html>