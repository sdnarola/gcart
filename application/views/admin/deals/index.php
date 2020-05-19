<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('deals');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('deals');?></li>
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
            <a href="<?php echo base_url('admin/deals/add'); ?>" class="btn btn-primary btn-sm"><?php _el('add_new');?><i class="icon-plus-circle2 position-right"></i></a>
            <a href="javascript:delete_selected();" class="btn btn-danger btn-sm" id="delete_selected"><?php _el('delete_selected');?><i class=" icon-trash position-right"></i></a>
          </div>
      </div>
      <!-- /Panel heading -->
    <!-- Listing table -->
    <div class="panel-body table-responsive">
      <table id="deals_table" class="table table-bordered table-striped">
        <thead>
          <tr>
             <th width="2%" class="text-center">
              <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
            </th>
            <th width="15%"><?php _el('product');?></th>
            <th width="15%"><?php _el('type');?></th>
            <th width="10%"><?php _el('amount');?></th>
            <th width="25%"><?php _el('start_date');?></th>
            <th width="25%"><?php _el('end_date');?></th>
            <th width="8%" class="text-center"><?php _el('actions');?></th>
          </tr>
        </thead>
        <tbody>
            <?php

            	if ($deals)
            	{
            		foreach ($deals as $deal)
            		{
            		?>
            <tr id="<?php echo $deal['id']; ?>">
                <td class="text-center">
                  <input type="checkbox" class="checkbox styled"  name="delete"  id="<?php echo $deal['id']; ?>">
                </td>
                <td><?php echo ucwords(get_product($deal['product_id'], 'name')); ?></td>
                <td>
                    <?php

                    			if ($deal['type'] == 0)
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

                    			if ($deal['type'] == 0)
                    			{
                    				echo _l('currency_symbol').'. '.$deal['value'];
                    			}
                    			else
                    			{
                    				echo $deal['value'].' &#37;';
                    			}

                    		?>
                </td>
                <td><?php echo date('jS F Y  h:i:s A', strtotime($deal['start_date'])); ?></td>
                <td><?php echo date('jS F Y  h:i:s A', strtotime($deal['end_date'])); ?></td>
                <td class="text-center"><a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>" href="javascript:delete_record(<?php echo $deal['id']; ?>);" class="text-danger delete" id="<?php echo $deal['id']; ?>"><i class=" icon-trash"></i></a></td>
            </tr>
            <?php }
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

    $('#deals_table').DataTable({
        'columnDefs': [ {
        'targets': [0,6], /* column index */
        'orderable': false, /* disable sorting */
        }],

    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
 });

var BASE_URL = "<?php echo base_url(); ?>";



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
            url:BASE_URL+'admin/deals/delete',
            type: 'POST',
            data: {
                deal_id:id
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('deal'));?>",
                        type: "success",
                    });
                    $("#"+id).closest("tr").remove();
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('deal'));?>",
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
    var deal_ids = [];

    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        deal_ids.push(id);
    });
    if (deal_ids == '')
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
            url:BASE_URL+'admin/deals/delete_selected',
            type: 'POST',
            data: {
              ids:deal_ids
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                  swal({
                        title: "<?php _el('_deleted_successfully', _l('deals'));?>",
                        type: "success",
                    });
                  $(deal_ids).each(function(index, element)
                  {
                      $("#"+element).closest("tr").remove();
                  });
                }
                else
                {
                  swal({
                       title: "<?php _el('access_denied', _l('deal'));?>",
                        type: "error",
                    });
                }
            }
        });
    });
}

</script>
