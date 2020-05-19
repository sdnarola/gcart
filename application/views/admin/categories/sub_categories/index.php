<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('sub_categories');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('sub_categories');?></li>
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
                <a href="<?php echo base_url('admin/sub_categories/add'); ?>" class="btn btn-primary btn-sm"><?php _el('add_new');?><i class="icon-plus-circle2 position-right"></i></a>

                <a href="javascript:delete_selected();" class="btn btn-danger btn-sm" id="delete_selected"><?php _el('delete_selected');?><i class=" icon-trash position-right"></i></a>
            </div>
        </div>
        <!-- /Panel heading -->
        <!-- Listing table -->
        <div class="panel-body table-responsive">
            <table id="categories_table" class="table  table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="2%">
                            <input type="checkbox" name="select_all" id="select_all" class="styled"  onclick="select_all(this);" >
                        </th>
                        <th width="30%" ><?php _el('category');?></th>
                        <th width="30%" ><?php _el('name');?></th>
                        <th width="20%" ><?php _el('slug');?></th>
                        <th width="10%" class="text-center"><?php _el('status');?></th>
                        <th width="8%" class="text-center"><?php _el('actions')?></th>
                    </tr>
                </thead>
                <tbody>
<?php

	foreach ($sub_categories as $sub_category)
	{
		$category = get_category($sub_category['category_id']);
	?>
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox styled"  name="delete"  id="<?php echo $sub_category['id']; ?>">
                        </td>
                        <td><?php echo ucfirst($category['name']); ?></td>
                        <td ><?php echo ucfirst($sub_category['name']); ?></td>
                        <td >
                            <?php echo $sub_category['slug']; ?>
                        </td>
<?php
	    $status = '';
        if ($category['is_active'] == 0)
        {
            $result='readonly';
        }
        else
        {
            $result = '';
        }
?>
                        <td class="text-center switchery-sm">
                            <input type="checkbox" onchange="change_status(this);" class="switchery"  id="<?php echo $sub_category['id']; ?>"
                        <?php
                    	if ($sub_category['is_active'] == 1)
                    		{
                    		echo 'checked';}else{
                         echo $status;}?> <?php echo $result?>>
                        </td>
                        <td class="text-center">
                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('edit')?>" href="<?php echo site_url('admin/sub_categories/edit/').$sub_category['id']; ?>" id="<?php echo $sub_category['id']; ?>" class="text-info">
                                <i class="icon-pencil7"></i>
                            </a>
                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>" href="javascript:delete_record(<?php echo $sub_category['id']; ?>);" class="text-danger delete" id="<?php echo $sub_category['id']; ?>">
                                <i class=" icon-trash"></i>
                            </a>
                        </td>
                    </tr>
<?php
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

    $('#categories_table').DataTable({
        'columnDefs': [ {
        'targets': [0,4,5], /* column index */
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
        url:BASE_URL+'admin/sub_categories/update_status',
        type: 'POST',
        data: {
            sub_category_id: obj.id,
            is_active:checked
        },
        success: function(msg)
        {
            if (msg=='true')
            {
                jGrowlAlert("<?php _el('_activated', _l('sub_category'));?>", 'success');
            }
            else
            {
                jGrowlAlert("<?php _el('_deactivated', _l('sub_category'));?>", 'success');
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
            url:BASE_URL+'admin/sub_categories/delete',
            type: 'POST',
            data: {
                sub_category_id:id
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('sub_category'));?>",
                        type: "success",
                    });
                    $("#"+id).closest("tr").remove();
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('sub_category'));?>",
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
    var sub_category_ids = [];

    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        sub_category_ids.push(id);
    });
    if (sub_category_ids == '')
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
            url:BASE_URL+'admin/sub_categories/delete_multiple',
            type: 'POST',
            data: {
              ids:sub_category_ids
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                  swal({
                        title: "<?php _el('_deleted_successfully', _l('sub_categories'));?>",
                        type: "success",
                    });
                  $(sub_category_ids).each(function(index, element)
                  {
                      $("#"+element).closest("tr").remove();
                  });
                }
                else
                {
                  swal({
                       title: "<?php _el('access_denied', _l('sub_category'));?>",
                        type: "error",
                    });
                }
            }
        });
    });
}

</script>
