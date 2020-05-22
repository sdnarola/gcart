<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('vendors');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('vendors');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <!-- Panel -->
    <div class="panel panel-flat ">
        <!-- Panel heading -->
         <div class="panel-heading ">
                <label ><?php echo _el('vendor') ?>&nbsp;<?php echo _el('registration') ?>
                    <input  type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-size="mini"  onchange="register_status(this);"<?php

	if ($registration['value'] == 1)
	{
		echo 'checked';}

?>></input> </label>
                <div class="heading-elements">
                <a href="<?php echo base_url('admin/vendors/pending_list'); ?>" class="btn btn-info btn-sm" id="pending_list"><?php echo _l('pending').' '._l('subscriptions'); ?></a>

                <a href="javascript:delete_selected();" class="btn btn-danger btn-sm" id="delete_selected"><?php _el('delete_selected');?><i class=" icon-trash position-right"></i></a>
                </div>
        </div>
        <!-- /Panel heading -->
        <!-- Listing table -->
        <div class="panel-body table-responsive">
            <table id="vendors_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="2%" class="text-center">
                            <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
                        </th>
                        <th width="15%" ><?php _el('store');?>&nbsp;<?php _el('name');?></th>
                        <th width="15%" ><?php _el('vendor');?></th>
                        <th width="15%" ><?php _el('email');?></th>
                        <th width="15%" ><?php _el('shop');?>&nbsp;<?php _el('number');?></th>
                        <th width="18%" ><?php _el('total_products');?></th>
                        <th width="8%" class="text-center"><?php _el('status');?></th>
                        <th width="12%" class="text-center"><?php _el('actions');?></th>
                    </tr>
                </thead>
                <tbody>
<?php

	if ($vendors)
	{
		foreach ($vendors as $vendor)
		{
		?>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" class="checkbox styled" name="delete" id="<?php echo $vendor['id']; ?>" >
                        </td>
                        <td>
                            <?php echo ucfirst($vendor['shop_name']); ?>
                        </td>
                        <td>
                            <?php echo ucfirst($vendor['firstname']).' '.ucfirst($vendor['lastname']); ?>
                        </td>
                        <td>
                            <a href="mailto:<?php echo $vendor['email']; ?>"><?php echo $vendor['email']; ?></a>
                        </td>
                        <td>
                            <?php echo $vendor['shop_number']; ?>
                        </td>
                        <td>
                            <?php echo $vendor['total_products']; ?>
                        </td>
                        <td class="text-center switchery-sm">
                            <input type="checkbox" onchange="change_status(this);" class="switchery"  id="<?php echo $vendor['id']; ?>"<?php

			if ($vendor['is_active'] == 1)
			{
				echo 'checked';}

		?>>
                        </td>
                        <td class="text-center">
                            <a data-popup="tooltip"  data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/vendors/details/').$vendor['id']; ?> " class=" text-slate" id="<?php echo $vendor['id']; ?>" ><i class="icon-info3"></i></a>
                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('edit')?>" href="<?php echo site_url('admin/vendors/edit/').$vendor['id']; ?>" id="<?php echo $vendor['id']; ?>" class="text-info"><i class="icon-pencil7"></i></a>
                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>" href="javascript:delete_record(<?php echo $vendor['id']; ?>);" class="text-danger" id="<?php echo $vendor['id']; ?>"><i class=" icon-trash"></i></a>
                        </td>
                    </tr>
<?php
	}
	}

?>               </tbody>
            </table>
        </div>
        <!-- /Listing table -->
    </div>
    <!-- /Panel -->
</div>
<!-- /Content area -->

<script type="text/javascript">

// Sets a mini switch
$('#dimension-switch').bootstrapSwitch('setSizeClass', 'switch-mini');

$(function() {

    $('#vendors_table').DataTable({
        'columnDefs': [ {
        'targets': [0,6,7], /* column index */
        'orderable': false, /* disable sorting */
        }],

    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
 });


var BASE_URL = "<?php echo base_url(); ?>";

/**
 * Change status when clicked on the status switch
 *
 * @param {obj}  obj  The object
 */
function change_status(obj)
{
    var checked = 0;

    if(obj.checked)
    {
        checked = 1;
    }

    $.ajax({
        url:BASE_URL+'admin/vendors/update_status',
        type: 'POST',
        data: {
            vendor_id: obj.id,
            is_active:checked
        },
        success: function(msg)
        {
            if (msg=='true')
            {
                jGrowlAlert("<?php _el('_activated', _l('vendor'));?>", 'success');
            }
            else
            {
                jGrowlAlert("<?php _el('_deactivated', _l('vendor'));?>", 'success');
            }
        }
    });
}

/**
 * Deletes a single record when clicked on delete icon
 *
 * @param {int}  id  The identifier
 */
function delete_record(id)
{
    swal({
        title: "<?php _el('single_deletion_alert');?>",
        text: "<?php _el('single_recovery_alert');?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText:"<?php _el('no_cancel_it');?>",
        confirmButtonText: "<?php _el('yes_i_am_sure');?>",
    },
    function()
    {
        $.ajax({
            url:BASE_URL+'admin/vendors/delete',
            type: 'POST',
            data: {
                vendor_id:id
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('vendor'));?>",
                        type: "success",
                    });
                    $("#"+id).closest("tr").remove();
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('vendor'));?>",
                        type: "error",
                    });
                }
            }
        });
    });
}

/**
 * Deletes all the selected records when clicked on DELETE SELECTED button
 */
function delete_selected()
{
    var vendor_ids = [];

    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        vendor_ids.push(id);
    });
    if (vendor_ids == '')
    {
        jGrowlAlert("<?php _el('select_before_delete_alert', _l('vendors'))?>", 'danger');
        preventDefault();
    }
    swal({
        title: "<?php _el('multiple_deletion_alert');?>",
        text: "<?php _el('multiple_recovery_alert');?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText:"<?php _el('no_cancel_it');?>",
        confirmButtonText: "<?php _el('yes_i_am_sure');?>",
    },
    function()
    {
        $.ajax({
            url:BASE_URL+'admin/vendors/delete_multiple',
            type: 'POST',
            data: {
              ids:vendor_ids
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('vendor'));?>",
                        type: "success",
                    });
                    $(vendor_ids).each(function(index, element)
                    {
                        $("#"+element).closest("tr").remove();
                    });
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('vendor'));?>",
                        type: "error",
                    });
                }
            }
        });
    });
}

/**
 * Change status when clicked on the status switch
 *
 * @param {obj}  obj  The object
 */
function register_status(obj)
{
    var checked = 0;

    if(obj.checked)
    {
        checked = 1;
    }
    $.ajax({
        url:BASE_URL+'admin/vendors/registration_status',
        type: 'POST',
        data: {
            value1:checked
        },
         success: function(response)
         {
             if (response=='true')
            {
                jGrowlAlert("<?php _el('_activated', _l('registration'));?>", 'success');
            }
            else
            {
                jGrowlAlert("<?php _el('_deactivated', _l('registration'));?>", 'success');
            }
         }


    });
}

/*for bootstrap switch (here registration)*/
$(".switch").bootstrapSwitch();

</script>
