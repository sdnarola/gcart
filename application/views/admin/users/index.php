<!-- Page header -->
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

        <div class="panel-heading mt-20">
          <div class="heading-elements">
            <a href="javascript:delete_selected();" class="btn btn-danger btn-sm" id="delete_selected"><?php _el('delete_selected');?><i class=" icon-trash position-right"></i></a>
          </div>
      </div>
        <!-- /Panel heading -->

        <!-- Listing table -->
        <div class="panel-body table-responsive">
            <table id="users_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                          <th width="2%" class="text-center">
                            <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
                      
                        </th>
                        <th width="20%" ><?php _el('name');?></a></th>
                        <th width="20%" ><?php _el('email');?></th>
                        <th width="20%" ><?php _el('mobile_no');?></th>
                        <th width="10%" class="text-center"><?php _el('status');?></th>
                        <th width="10%" class="text-center"><?php _el('actions');?></th>

                    </tr>
                </thead>
                <tbody>
<?php

if ($users != ' ') {
	foreach ($users as $user) {
		?>
                    <tr>

                         <td>
                            <input type="checkbox" class="checkbox styled"  name="delete"  id="<?php
if ($user->id != get_loggedin_info('user_id')) {
			echo $user->id;}
		?>" >
                        </td>
                        <td>
                            <?php echo ucfirst($user->firstname) . '&nbsp;' . ucfirst($user->lastname); ?>
                        </td>

                        <td>
                            <a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a>
                        </td>
                         <td>
                            <?php echo $user->mobile; ?>
                        </td>

                        <td class="text-center switchery-sm">
                            <input type="checkbox" onchange="change_status(this);" class="switchery"  id="<?php echo $user->id; ?>"<?php
if ($user->is_active == 1) {
			echo 'checked';}
		?>>
                        </td>

                        <td class="text-center">

                            <a data-popup="tooltip"  data-placement="top"  title="<?php _el('details')?>" href="<?php echo site_url('admin/users/details/') . $user->id; ?> " class="text-slate" id="<?php echo $user->id; ?>" ><i class="icon-info3"></i></a>

                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('edit')?>" href="<?php echo site_url('admin/users/edit/') . $user->id; ?>" id="<?php echo $user->id; ?>" class="text-info"><i class="icon-pencil7"></i></a>

                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>" href="javascript:delete_record(<?php echo $user->id; ?>);" class="text-danger" id="<?php echo $user->id; ?>"><i class=" icon-trash"></i></a>

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

    $('#users_table').DataTable({

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
        url:BASE_URL+'admin/users/update_status',
        type: 'POST',
        data: {
            user_id: obj.id,
            is_active:checked
        },
        success: function(msg)
        {
            if (msg=='true')
            {
                jGrowlAlert("<?php _el('_activated', _l('user'));?>", 'success');
            }
            else
            {
                jGrowlAlert("<?php _el('_deactivated', _l('user'));?>", 'success');
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
            url:BASE_URL+'admin/users/delete',
            type: 'POST',
            data: {
                user_id:id
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('user'));?>",
                        type: "success",
                    });
                    $("#"+id).closest("tr").remove();
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('user'));?>",
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
    var user_ids = [];

    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        user_ids.push(id);
    });
    if (user_ids == '')
    {
        jGrowlAlert("<?php _el('select_before_delete_alert', _l('users'))?>", 'danger');
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
            url:BASE_URL+'admin/users/delete_selected',
            type: 'POST',
            data: {
              ids:user_ids
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('user'));?>",
                        type: "success",
                    });
                    $(user_ids).each(function(index, element)
                    {
                        $("#"+element).closest("tr").remove();
                    });
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('user'));?>",
                        type: "error",
                    });
                }
            }
        });
    });
}

</script>
