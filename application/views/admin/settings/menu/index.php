<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('menu_setup');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('menu_setup');?></li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <!-- Panel -->
    <div class="row">
	    <div class="col-md-8 col-md-offset-2">
		    <div class="panel panel-flat">
		        <!-- Listing table -->
		        <div class="panel-body table-responsive">
		        	<table id="categories_table" class="table  table-bordered table-striped">
		        		<thead>
		        			<th width="70%" ><?php _el('category')?> <?php _el('name'); ?></th>
		        			<th width="30%" ><?php _el('display')?></th> 
		        		</thead>
		        		<tbody>
		<?php
			$categories = get_all_categories();
			foreach ($categories as $category) 
			{
				$readonly = ' ';
		?>
		<tr>
			<td><?php echo ucfirst($category['name'])?></td>
			<td>
				<label>
					<input type="checkbox" id="<?php echo $category['id']?>" class="switchery"<?php if($category['is_header'] == 1){echo "checked";} ?><?php echo $readonly; ?> onclick="change_display_status(this);">
				</label>
			</td>
		</tr>
<?php
			}
?>
						</tbody>
					</table>
				</div>		
			</div>
			
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
        'targets': [1], /* column index */
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
function change_display_status(obj)
{
    var checked = 0;     

    if(obj.checked) 
    { 
        checked = 1;
    }  
    $.ajax({
        url:BASE_URL+'admin/menu_setup/update_display_status',
        type: 'POST',
        data: {
            category_id: obj.id,
            is_header:checked
        },
        success: function(msg) 
        {
        	//alert(msg);
            if (msg == 'true')
            {   

                jGrowlAlert("<?php _el('_activated', _l('display')); ?>", 'success');
            }
            else
            {                  
                jGrowlAlert("<?php _el('_deactivated', _l('display')); ?>", 'success');
            }
        }
    }); 
}
 
</script>
