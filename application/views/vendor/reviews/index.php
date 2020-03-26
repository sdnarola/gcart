<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold"><?php _el('reviews');?></span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url('vendor/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?></a>
            </li>
            <li class="active"><?php _el('reviews');?></li>
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
            <a href="javascript:delete_selected();" class="btn btn-danger btn-sm" id="delete_selected"><?php _el('delete_selected');?><i class=" icon-trash position-right"></i></a>
          </div>
      </div>
      <!-- /Panel heading -->
    <!-- Listing table -->
    <div class="panel-body table-responsive">
      <table id="reviews_table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="2%">
              <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
            </th>
            <th width="15%"><?php _el('product');?></th>
            <th width="15%"><?php _el('reviewer');?></th>
            <th width="20%"><?php _el('ratings');?></th>
            <th width="40%"><?php _el('review');?></th>
            <th width="8%" class="text-center"><?php _el('actions');?></th>
          </tr>
        </thead>
        <tbody>
<?php

	if ($reviews)
	{
		foreach ($reviews as $review)
		{
		?>
            <tr id="<?php echo $review['id']; ?>">
                <td class="text-center">
                  <input type="checkbox" class="checkbox styled"  name="delete"  id="<?php echo $review['id']; ?>">
                </td>
                <td><?php echo ucwords(get_product($review['product_id'], 'name')); ?></td>
                <td><?php echo ucwords(get_user_info($review['user_id'], 'firstname').' '.get_user_info($review['user_id'], 'lastname')); ?></td>
                <td>
<?php

			if ($review['star_ratings'] >= 1)
			{
				for ($i = 1; $i <= $review['star_ratings']; $i++)
				{
				?>
                    <i class=" icon-star-full2"></i>
<?php
	}
			}

		?>
                </td>
                <td><?php echo ucfirst($review['review']); ?></td>
                <td class="text-center">
                    <a data-popup="tooltip" data-placement="top"  title="<?php _el('delete')?>" href="javascript:delete_record(<?php echo $review['id']; ?>);" class="text-danger delete" id="<?php echo $review['id']; ?>"><i class=" icon-trash"></i></a>
                </td>
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

    $('#reviews_table').DataTable({
        'columnDefs': [ {
        'targets': [0,5], /* column index */
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
            url:BASE_URL+'vendor/reviews/delete',
            type: 'POST',
            data: {
                review_id:id
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                    swal({
                        title: "<?php _el('_deleted_successfully', _l('review'));?>",
                        type: "success",
                    });
                    $("#"+id).closest("tr").remove();
                }
                else
                {
                    swal({
                        title: "<?php _el('access_denied', _l('review'));?>",
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
    var review_ids = [];

    $(".checkbox:checked").each(function()
    {
        var id = $(this).attr('id');
        review_ids.push(id);
    });
    if (review_ids == '')
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
            url:BASE_URL+'vendor/reviews/delete_selected',
            type: 'POST',
            data: {
              ids:review_ids
            },
            success: function(msg)
            {
                if (msg=="true")
                {
                  swal({
                        title: "<?php _el('_deleted_successfully', _l('reviews'));?>",
                        type: "success",
                    });
                  $(review_ids).each(function(index, element)
                  {
                      $("#"+element).closest("tr").remove();
                  });
                }
                else
                {
                  swal({
                       title: "<?php _el('access_denied', _l('review'));?>",
                        type: "error",
                    });
                }
            }
        });
    });
}

</script>
