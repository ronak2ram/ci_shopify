
<?php $this->load->view('layout/header'); ?>

<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" >Topic</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="topic" value="<?php echo $webhook['topic'] ?>" disabled>
      <div class="help-text" >
      	carts/create,carts/update,checkouts/create, checkouts/delete, checkouts/update,collections/create, collections/delete, collections/update,collection_listings/add, collection_listings/remove, collection_listings/update,customers/create, customers/delete, customers/disable, customers/enable, customers/update,customer_groups/create, customer_groups/delete, customer_groups/update,draft_orders/create, draft_orders/delete, draft_orders/update,fulfillments/create, fulfillments/update,fulfillment_events/create, fulfillment_events/delete,orders/cancelled, orders/create, orders/delete, orders/fulfilled, orders/paid, orders/partially_fulfilled, orders/updated,order_transactions/create,products/create, products/delete, products/update,product_listings/add, product_listings/remove, product_listings/update,refunds/create,app/uninstalled, shop/update,themes/create, themes/delete, themes/publish, themes/update
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="address" placeholder="http://apple.com/uninstall" value="<?php echo $webhook['address'] ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Format</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="format" value="<?php echo $webhook['format'] ?>" disabled>
    </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
    	<a href="<?= base_url('webhook') ?>" class="btn btn-default">Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<?php $this->load->view('layout/footer'); ?>
