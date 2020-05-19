<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('subscribers');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('subscribers');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    <!-- Panel -->
    <div class="panel panel-flat">
        <!-- Listing table -->
        <div class="panel-body table-responsive">
            <table id="users_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50%" ><?php _el('email');?></a></th>
                        <th width="50%" ><?php _el('subscribe_date');?></th>
                    </tr>
                </thead>
                <tbody>
<?php

	if ($subscribers != ' ')
	{
		foreach ($subscribers as $subscriber)
		{
		?>
                    <tr>
                        <td>
                         <a href="mailto:<?php echo $subscriber['email'] ?> ?>"><?php echo $subscriber['email'] ?></a>
                        </td>

                        <td>
                            <?php echo date('jS F Y  h:i:s A', strtotime($subscriber['created_date'])); ?>
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
</div>
</div>
<!-- /Content area -->

<script type="text/javascript">
$(function() {

    $('#users_table').DataTable({

        'columnDefs': [ {
        'orderable': false, /* disable sorting */
        }],
    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
 });

</script>
