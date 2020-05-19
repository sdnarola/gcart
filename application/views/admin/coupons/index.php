<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('coupons');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('coupons');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
  <!-- Panel -->
  <div class="panel panel-flat">
      <!-- Panel heading -->
      <div class="panel-heading mt-20">
          <div class="heading-elements">
          	<a href="<?php echo base_url('admin/coupons/add'); ?>" class="btn btn-primary btn-sm"><?php _el('add_new');?><i class="icon-plus-circle2 position-right"></i></a>
            <a href="javascript:delete_selected();" class="btn btn-danger btn-sm" id="delete_selected"><?php _el('delete_selected');?><i class=" icon-trash position-right"></i></a>
          </div>
      </div>
      <!-- /Panel heading -->
    <!-- Listing table -->
    <div class="panel-body table-responsive">
      <table id="coupons_table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="2%" class="text-center">
              <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
            </th>
            <th width="20%"><?php _el('code');?></th>
            <th width="15%"><?php _el('type');?></th>
            <th width="15%"><?php _el('amount');?></th>
            <th width="20%"><?php _el('quantity');?></th>
            <th width="10%"><?php _el('used');?></th>
            <th width="8%" class="text-center"><?php _el('status');?></th>
            <th width="10%" class="text-center"><?php _el('actions');?></th>
          </tr>
        </thead>
        <tbody>
<?php

	if ($coupons)
	{
		foreach ($coupons as $coupon)
		{
		?>
            <tr id="<?php echo $coupon['id']; ?>">
        		<td class="text-center">
                  <input type="checkbox" class="checkbox styled"  name="delete"  id="<?php echo $coupon['id']; ?>">
                </td>
        		<td><?php echo $coupon['code']; ?></td>
        		<td>
        			<?php

        						if ($coupon['type'] == 0)
        						{
        							_el('amount');
        						}
        						else
        						{
        							_el('percentage');
        						}

        					?>
        		</td>
        		<td>
        			<?php

        						if ($coupon['type'] == 0)
        						{
        							echo _l('currency_symbol').'. '.$coupon['amount'];
        						}
        						else
        						{
        							echo $coupon['amount'].' &#37;';
        						}

        					?>
        		</td>
        		<td>
        			<?php

        						if ($coupon['quantity'] == 0)
        						{
        							_el('unlimited');
        						}
        						else
        						{
        							echo $coupon['quantity'];
        						}

        					?>
        		</td>
        		<td><?php echo $coupon['used']; ?></td>
        		<td class="text-center switchery-sm">
                    <input type="checkbox" onchange="change_status(this);" class="switchery"  id="<?php echo $coupon['id']; ?>"
<?php

			if ($coupon['is_active'] == 1)
			{
				echo 'checked';
			}

		?>>
                </td>
        		<td class="text-center">
                    <a data-popup="tooltip" data-placement="top"  title="<?php _el('edit')?>" href="<?php echo site_url('admin/coupons/edit/'.$coupon['id']); ?>" id="<?php echo $coupon['id']; ?>" class="text-info"><i class="icon-pencil7"></i></a>

                    <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>" href="javascript:delete_record(<?php echo $coupon['id']; ?>);" class="text-danger delete" id="<?php echo $coupon['id']; ?>"><i class=" icon-trash"></i></a>
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

    $('#coupons_table').DataTable({
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
        url:BASE_URL+'admin/coupons/update_status',
        type: 'POST',
        data: {
            coupon_id: obj.id,
            is_active:checked
        },
        success: function(msg)
        {
            if (msg=='true')
            {
                jGrowlAlert("<?php _el('_activated', _l('coupon'));?>", 'success');
            }
            else
            {
                jGrowlAlert("<?php _el('_deactivated', _l('coupon'));?>", 'success');
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
            url:BASE_URL+'admin/coupons/delete',
            type: 'POST',
            data: {
                coupon_id:id
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('coupon'));?>",
                        type: "success",
                    });
                    $("#"+id).closest("tr").remove();
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('coupon'));?>",
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
    var coupon_ids = [];

    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        coupon_ids.push(id);
    });
    if (coupon_ids == '')
    {
        jGrowlAlert("<?php _el('select_before_delete_alert')?>", 'danger');
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
            url:BASE_URL+'admin/coupons/delete_selected',
            type: 'POST',
            data: {
              ids:coupon_ids
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                  swal({
                        title: "<?php _el('_deleted_successfully', _l('coupons'));?>",
                        type: "success",
                    });
                  $(coupon_ids).each(function(index, element)
                  {
                      $("#"+element).closest("tr").remove();
                  });
                }
                else
                {
                  swal({
                       title: "<?php _el('access_denied', _l('coupons'));?>",
                        type: "error",
                    });
                }
            }
        });
    });
}

</script>
