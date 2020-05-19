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
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
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
            <th width="20%"><?php _el('customer_email');?></th>
            <th width="18%"><?php _el('order_number');?></th>
            <th width="16%"><?php _el('products');?></th>
            <th width="18%"><?php _el('grand_total');?></th>
            <th width="8%" class="text-center"><?php _el('status');?></th>
            <th width="18%" class="text-center"><?php _el('payment_status');?></th>
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
            <tr id="<?php echo $order['id']; ?>">
                <td>
                    <a href="mailto:<?php echo get_user_info($order['user_id'], 'email'); ?>"><?php echo get_user_info($order['user_id'], 'email'); ?></a>
                </td>
                <td><?php echo $order['order_number']; ?></td>
                <td><?php echo $order['total_products']; ?></td>
                <td><?php echo _l('currency_symbol').'. '.' '.$order['grand_total']; ?></td>
                <td class="text-center">
                    <select class="select" id="<?php echo $order['id']; ?>" onchange="change_status(this);">
                        <option value="0">Pending</option>
                        <option value="1"<?php

                                         			if ($order['order_status'] == 1)
                                         			{
                                         				echo ' selected';}

                                         		?>>Processing</option>
                        <option value="2"<?php

                                         			if ($order['order_status'] == 2)
                                         			{
                                         				echo ' selected';}

                                         		?>>Completed</option>
                        <option value="3"<?php

                                         			if ($order['order_status'] == 3)
                                         			{
                                         				echo ' selected';}

                                         		?>>Declined</option>
                    </select>
                </td>
                <td class="text-center">
                    <select class="select" id="<?php echo $order['id']; ?>" onchange="change_payment_status(this);">
                        <option value="0">Unpaid</option>
                        <option value="1"<?php

                                         			if ($order['payment_status'] == 1)
                                         			{
                                         				echo ' selected';}

                                         		?>>Paid</option>
                    </select>
                </td>
                <td class="text-center">
                    <a data-popup="tooltip" data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/orders/details/'.$order['id']); ?>" id="<?php echo $order['id']; ?>" class="text-slate"><i class="icon-info3"></i></a>
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
        'targets': [6], /* column index */
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
    $.ajax({
        url:BASE_URL+'admin/orders/update_status/'+id,
        type: 'POST',
        data: {
            order_status:status
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



/**
 * Change payment status when clicked on the status
 *
 * @param {obj}  obj  The object
 */
function change_payment_status(obj)
{
    var id = obj.id;
    var status = obj.options[obj.selectedIndex].value;
    $.ajax({
        url:BASE_URL+'admin/orders/update_payment_status/'+id,
        type: 'POST',
        data: {
            payment_status:status
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
