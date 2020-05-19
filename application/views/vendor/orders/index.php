<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('orders');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('vendor/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('orders');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
  <!-- Panel -->
  <div class="panel panel-flat">
    <!-- Listing table -->
    <div class="panel-body table-responsive">
      <table id="orders_table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="20%"><?php _el('order_number');?></th>
            <th width="18%"><?php _el('total_products');?></th>
            <th width="20%"><?php _el('total_amount');?></th>
            <th width="20%"><?php _el('payment_method');?></th>
            <th width="20%" class="text-center"><?php _el('status');?></th>
            <th width="2%" class="text-center"><?php _el('actions');?></th>
          </tr>
        </thead>
        <tbody>
<?php

	if ($orders)
	{
		foreach ($orders as $order)
		{
		?>
            <tr id="<?php echo $order['order_id']; ?>">
                <td><?php echo $order['order_number']; ?></td>
                <td><?php echo $order['SUM(order_items.quantity)']; ?></td>
                <td><?php echo _l('currency_symbol').'. '.$order['SUM(order_items.total_amount)']; ?></td>
                <td><?php echo ucwords($order['payment_method']); ?></td>
                <td class="text-center">
                    <select class="select" id="<?php echo $order['order_id']; ?>" onchange="change_status(this);">
                        <option value="0">Pending</option>
                        <option value="1"<?php

                                         			if ($order['vendor_status'] == 1)
                                         			{
                                         				echo ' selected';}

                                         		?>>Processing</option>
                        <option value="2"<?php

                                         			if ($order['vendor_status'] == 2)
                                         			{
                                         				echo ' selected';}

                                         		?>>Completed</option>
                        <option value="3"<?php

                                         			if ($order['vendor_status'] == 3)
                                         			{
                                         				echo ' selected';}

                                         		?>>Declined</option>
                    </select>
                </td>

                <td class="text-center">
                    <a data-popup="tooltip" data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('vendor/orders/details/'.$order['order_id']); ?>" id="<?php echo $order['order_id']; ?>" class="text-slate"><i class="icon-info3"></i></a>
                </td>
            </tr>
<?php
	}
	}

?>
        </tbody>

      </table>
    </div>
    <!-- /Listing table -->
  </div>
  <!-- /Panel -->
</div>
<!-- /Content area -->

<script type="text/javascript">
$(function() {

    $('#orders_table').DataTable({
        'columnDefs': [ {
        'targets': [3,5], /* column index */
        'orderable': false, /* disable sorting */
        }],

    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
 });

var BASE_URL = "<?php echo base_url(); ?>";
/**
 * Change status when clicked on the status
 *
 * @param {obj}  obj  The object
 */
function change_status(obj)
{
    var id = obj.id;
    var status = obj.options[obj.selectedIndex].value;
    var vendor_id="<?php echo $this->session->userdata('vendor_id'); ?>";

    $.ajax({
        url:BASE_URL+'vendor/orders/update_status/'+id,
        type: 'POST',
        data: {
            vendor_status:status,
            vendor_id:vendor_id
        },
        success: function(msg)
        {
            if (msg=='true')
            {
                jGrowlAlert("<?php _el('_updated_successfully', _l('status'));?>", 'success');
            }
            else
            {
                jGrowlAlert("<?php _el('denied', _l('status'));?>", 'danger');
            }
        }
    });

}
</script>