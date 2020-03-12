  <div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('users');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('users');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <!-- Panel -->
    <div class="panel panel-flat">
        <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="panel-title">
                                <strong><?php _el('user_details')?></strong>
                            </h5>
                        </div>
                    </div>
        </div>
        <div class="body-area">
            <div class="row">
                <!-- profile pic display -->
                <div class="col-md-2">
<?php
	$file = basename($path);
?>
                    <div class="user-image">
                    <img src="<?php echo base_url().'Uploads/users/'.$file; ?>" alt="<?php _el('img_alt_msg')?>" height="226" width="226" border="10" class="img-circle"></img>
                </div>
                </div>
                <!-- table shows the user's details -->
                <div class="col-md-5">
                    <div class="table-responsive show-table">
                        <table class="table">
                             <tbody>
<?php

	if ($users)
	{
		foreach ($users as $user)
		{
		?>
                                    <tr>
                                        <th><?php echo _el('name'); ?></th>
                                        <td><?php echo ucfirst($user['firstname']).' '.ucfirst($user['lastname']); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('email'); ?></th>
                                        <td><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email'] ?></a></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('mobile_no'); ?></th>
                                        <td><?php echo $user['mobile'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('last_login'); ?> </th>
                                            <td>
                                                <?php $time = time_to_words($user['last_login']);
                                                		echo $time;?>
                                            </td>
                                    </tr>
                                      <tr>
                                        <th><?php echo _el('email_varified'); ?> </th>
                                            <td>
<?php

			if ($user['is_email_verified'] == 1)
			{
				_el('varified');
			}
			else
			{
				_el('not_varified');
			}

		?>
                                            </td>
                                    </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table shows the user's address details -->
                <div class="col-md-5">
                    <div class="table-responsive show-table">

                        <table class="table">
                            <tbody>
                                    <tr>
                                        <th><?php echo _el('address1'); ?></th>
                                        <td><?php echo ucfirst($user['address_1']) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('address2'); ?></th>
                                        <td><?php echo ucfirst($user['address_2']) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('city'); ?></th>
                                        <td><?php echo ucfirst($user['city']) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('state'); ?></th>
                                        <td><?php echo ucfirst($user['state']) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _el('pincode'); ?></th>
                                        <td><?php echo $user['pincode'] ?></td>
                                    </tr>
<?php
	}
	}

?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="panel-title">
                                <strong><?php _el('products_orders');?></strong>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="panel-body table-responsive">
                 <!-- table shows the user's orders details -->
                    <table id="info_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="2%" class="text-center">
                                    <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
                                </th>
                                <th width="20%" class="text-center"><?php _el('order_number')?></th>
                                <th width="20%" class="text-center"><?php _el('purchase_date')?></th>
                                <th width="20%" class="text-center"><?php _el('amount')?></th>
                                <th width="20%" class="text-center"><?php _el('status')?></th>
                                <th width="8%" class="text-center"><?php _el('actions')?></th>
                            </tr>
                        </thead>
                        <tbody>
<?php

	if ($records)
	{
		foreach ($records as $record)
		{
		?>
                            <tr class="text-center">
                                <td>
                                    <input type="checkbox" class="checkbox styled"  name="delete">
                                </td>
                                <td>
                                    <?php echo $record['order_number'] ?>
                                </td>
                                <td>
                                    <?php echo $record['order_date'] ?>
                                </td>
                                <td>
                                    <?php echo $record['total_amount'] ?>
                                </td>
<?php

			if ($record['order_status'] == 0)
			{
				$status = _l('pending');
			}
			else

			if ($record['order_status'] == 1)
			{
				$status = _l('completed');
			}
			else

			if ($record['order_status'] == 2)
			{
				$status = _l('processing');
			}
			else
			{
				$status = _l('declined');
			}

		?>

                                <td>
                                    <?php echo $status ?>
                                </td>
                                <td>
                                    <a data-popup="tooltip"  data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/orders/details/').$user['id']; ?>" class=" text-success text-teal-400" ><i class="icon-eye"></i></a>
                                </td>
                            </tr>
<?php
	}
	}

?>
                         </tbody>
                    </table>
                </div>
    <!-- /Panel -->
</div>


<script type="text/javascript">
$(function() {

    $('#info_table').DataTable({
        buttons: {
            dom: {
            button: {
                className: 'btn btn-default'
            }
            },
            buttons: [
            'copyHtml5',
            'csvHtml5',
            'pdfHtml5'
            ]
        },
        'columnDefs': [ {
        'targets': [0,5], /* column index */
        'orderable': false, /* disable sorting */
        }],

    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
 });

</script>