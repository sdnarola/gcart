<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('sliders'); ?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard'); ?></a>
            </li>
            <li class="active"><?php _el('home_page'); ?></li>
            <li class="active"><?php _el('sliders'); ?></li>
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
                <a href="<?php echo base_url('admin/sliders/add'); ?>" class="btn btn-primary btn-sm"><?php _el('add_new'); ?><i class="icon-plus-circle2 position-right"></i></a>

                <a href="javascript:delete_selected();" class="btn btn-danger btn-sm" id="delete_selected"><?php _el('delete_selected'); ?><i class=" icon-trash position-right"></i></a>
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
                         <th width="30%"><?php _el('image'); ?></th>
                        <th width="30%" ><?php _el('title'); ?></th>
                        <th width="30%" ><?php _el('sub_title'); ?></th>
                        <th width="8%" class="text-center"><?php _el('actions') ?></th>
                    </tr>
                </thead>
                <tbody>
<?php 
            foreach ($sliders as $slider)  
            { 
?>
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox styled"  name="delete"  id="<?php echo $slider['id']; ?>">
                        </td>
<?php 
            $file = basename($slider['image']);
?>
                        <td >
                                <image name="icon1" id='icon1' src="<?php echo base_url('assets/uploads/sliders/').$file ?>" width="350" height="150" border=2>
                        </td>
                        <td ><?php echo ucfirst($slider['title']); ?></td>
                        <td ><?php echo ucfirst($slider['sub_title']); ?></td>
                        <td class="text-center">
                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('edit') ?>" href="<?php echo site_url('admin/sliders/edit/').$slider['id']; ?>" id="<?php echo $slider['id']; ?>" class="text-info">
                                <i class="icon-pencil7"></i>
                            </a>
                            <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete') ?>" href="javascript:delete_record(<?php echo $slider['id']; ?>);" class="text-danger delete" id="<?php echo $slider['id']; ?>">
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
        'targets': [0,1,4], /* column index */
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
        title: "<?php _el('single_deletion_alert'); ?>",
        text: "<?php _el('single_recovery_alert'); ?>",
        type: "warning",  
        showCancelButton: true, 
        cancelButtonText:"<?php _el('no_cancel_it'); ?>",
        confirmButtonText: "<?php _el('yes_i_am_sure'); ?>",      
    },
    function()
    {       
        $.ajax({
            url:BASE_URL+'admin/sliders/delete',
            type: 'POST',
            data: {
                slider_id:id
            },
            success: function(msg)
            {
                if (msg=="true")
                {                    
                    swal({                        
                        title: "<?php _el('_deleted_successfully', _l('slider')); ?>",       
                        type: "success",                            
                    });
                    $("#"+id).closest("tr").remove();
                }
                else
                {                        
                    swal({                           
                        title: "<?php _el('access_denied', _l('slider')); ?>",
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
    var slider_ids = [];
    
    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        slider_ids.push(id);
    });
    if (slider_ids == '')
    {
        jGrowlAlert("<?php _el('select_before_delete_alert') ?>", 'danger');
        preventDefault();
    }
    swal({
        title: "<?php _el('multiple_deletion_alert'); ?>",
        text: "<?php _el('multiple_recovery_alert'); ?>",
        type: "warning",
        showCancelButton: true, 
        cancelButtonText:"<?php _el('no_cancel_it'); ?>",
        confirmButtonText: "<?php _el('yes_i_am_sure'); ?>", 
    },
    function()
    {
        $.ajax({
            url:BASE_URL+'admin/sliders/delete_multiple',
            type: 'POST',
            data: {
              ids:slider_ids
            },
            success: function(msg)
            {
                if (msg=="true")
                {                     
                  swal({                           
                        title: "<?php _el('_deleted_successfully', _l('sliders')); ?>",                    
                        type: "success",                            
                    });
                  $(slider_ids).each(function(index, element) 
                  {
                      $("#"+element).closest("tr").remove();
                  });
                }
                else
                {
                  swal({                            
                       title: "<?php _el('access_denied', _l('sliders')); ?>",
                        type: "error",   
                    });
                }
            }
        });
    });
}

</script>
