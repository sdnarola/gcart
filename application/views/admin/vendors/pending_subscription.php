<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php echo _l('pending').' '._l('subscription_plan');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/vendors'); ?>"><?php _el('vendors');?></a>
            </li>
            <li class="active"><?php echo _l('pending').' '. _l('subscription');?></li>
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
                    <a href="javascript:ask_subscriptions();" class="btn btn-info btn-sm" id="renew"><?php _el('renew');?><i class=" icon-new position-right"></i></a>
                </div>
        </div>
        <!-- Listing table -->
        <div class="panel-body table-responsive">
            <table id="users_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="2%" class="text-center">
                            <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
                        </th>
                        <th width="90%" ><?php _el('name');?></a></th>
                        <th width="10%" class="text-center"><?php _el('actions');?></th>
                    </tr>
                </thead>
                <tbody>
<?php
    if($vendors != " ")
    {
	 foreach($vendors as $vendor)
     {
?>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" class="checkbox styled"  name="ids"  id="<?php echo $vendor['id']; ?>" >
                        </td>
                        <td>
                            <?php echo $vendor['firstname'].' '.$vendor['lastname'] ?>
                        </td>
                        <td class="text-center">
                            <a data-popup="tooltip"  data-placement="top"  title="<?php _el('email')?>" href="mailto:<?php echo $vendor['email']; ?> " class=" text-info"><i class="icon-mail5"></i></a>
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

var BASE_URL = "<?php echo base_url(); ?>";

$(function() {

    $('#users_table').DataTable({

        'columnDefs': [ {
            'targets': [0], /* column index */
        'orderable': false, /* disable sorting */
        }],
    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
 });

/**
 * { send email when click on Ask Re-new Plan Button }
 */
function ask_subscriptions()
{
    var ids = [];

    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        ids.push(id);
    });
    if (ids == '')
    {
        jGrowlAlert("<?php _el('select_before_send', _l('vendors'))?>", 'danger');
        preventDefault();
    }
   
        $.ajax({
            url:BASE_URL+'admin/vendors/mail_renew_subscription',
            type: 'POST',
            data: {
              ids:ids
            },
            success: function(msg)
            {
                if (msg == 'true')
                {
                    jGrowlAlert("<?php _el('send_successfully');?>", 'success');
                }
                else
                {
                     jGrowlAlert("<?php _el('denied')?>", 'danger');
                }
            }
        });
    }

</script>
